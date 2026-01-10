<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BkashController extends Controller
{
    private $base_url;
    private $app_key;
    private $app_secret;
    private $username;
    private $password;

    public function __construct()
    {
        $this->base_url = config('bkash.base_url');
        $this->app_key = config('bkash.app_key');
        $this->app_secret = config('bkash.app_secret');
        $this->username = config('bkash.username');
        $this->password = config('bkash.password');
    }

    // Step 1: Token Generate
    public function getToken()
    {
        $response = Http::withHeaders([
            'username' => $this->username,
            'password' => $this->password,
        ])->post($this->base_url . '/tokenized/checkout/token/grant', [
            'app_key' => $this->app_key,
            'app_secret' => $this->app_secret,
        ]);

        return $response->json();
    }

    // Step 2: Payment Create
    public function createPayment()
    {
        // আগে token generate করুন
        $tokenResponse = $this->getToken();
        $id_token = $tokenResponse['id_token'] ?? null;

        if (!$id_token) {
            return response()->json(['error' => 'Token not generated']);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $id_token,
            'X-APP-Key' => $this->app_key,
        ])->post($this->base_url . '/tokenized/checkout/create', [
            'amount' => '10', // Test Amount
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => 'INV-001',
            'callbackURL' => route('bkash.callback'),
        ]);

        return $response->json();
    }

    // Step 3: Callback Example
    public function callback(Request $request)
    {
        // Payment response handling
        return $request->all();
    }
}
