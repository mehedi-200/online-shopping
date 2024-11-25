<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Config;
use Exception;

class PayPalPaymentController extends Controller
{
    public function payWithPaypal($order_id)
    {
        $order = Orders::find($order_id);
        $amount = $order->sub_total;


        session()->put('order_id', $order_id);


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());


        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount
                    ]
                ]
            ],
            "application_context" => [
                "cancel_url" => route('paypalPaymentCancel'),
                "return_url" => route('paypalPaymentSuccess')
            ]
        ]);

        if (isset($response['id'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('paypalPaymentCancel');

    }

    public function paypalPaymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());

        $response = $provider->capturePaymentOrder($request->query('token'));

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order_id = session()->get('order_id');
            $order = Orders::find($order_id);
            $order->payment_status = 'PAID';
            $order->save();
            return redirect()->route('orderSuccess',['id'=>$order_id])->with('success', 'Payment successful!');
        }

        return redirect()->back()->withInput()->with('payment_failed', 'Payment failed.');
    }
    public function paypalPaymentCancel()
    {
        $order_id = session()->get('order_id');
        return redirect()->route('orderSuccess',['id'=>$order_id])->with('cancel', 'Payment cancel!');

    }


}
