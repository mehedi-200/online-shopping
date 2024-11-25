<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Toastr;
class OrderController extends Controller
{

    public function pending()
    {
        $data['activeMenu'] = "pending";
        $data['orders'] = Orders::has('customer')->where('status', 'pending')->orderBy('id', 'DESC')->get();
        activity()->log(auth()->user()->name.' visited pending orders list');
        return view('admin.order.pending', $data);
    }
    public function processing()
    {
        $data['activeMenu'] = "processing";
        $data['orders'] = Orders::has('customer')->where('status', 'processing')->orderBy('id', 'DESC')->get();
        activity()->log(auth()->user()->name.' visited processing orders list');

        return view('admin.order.processing', $data);
    }
    public function completed()
    {
        $data['activeMenu'] = "completed";
        $data['orders'] = Orders::has('customer')->where('status', 'completed')->orderBy('id', 'DESC')->get();
        activity()->log(auth()->user()->name.' visited completed orders list');
        return view('admin.order.complete', $data);
    }
    public function cancelled()
    {
        $data['activeMenu'] = "cancelled";
        $data['orders'] = Orders::where('status', 'cancelled')->orderBy('id', 'DESC')->get();
        activity()->log(auth()->user()->name.' visited cancelled orders list');
        return view('admin.order.cancel', $data);
    }
    public function view($id)
    {
        if (!Orders::where('id', $id)->exists()) {
            abort(404);
        }
        if(Orders::where('id', $id)->where('status','pending')->exists()){
            $data['activeMenu'] = "pending";
        }if(Orders::where('id', $id)->where('status','processing')->exists()){
            $data['activeMenu'] = "processing";
        }
        if(Orders::where('id', $id)->where('status','completed')->exists()){
            $data['activeMenu'] = "completed";
        }
        if(Orders::where('id', $id)->where('status','cancelled')->exists()){
            $data['activeMenu'] = "cancelled";
        }
        $data['order'] = Orders::where('id', $id)->first();
        return view('admin.order.view', $data);
    }
    public function cancelOrCompleted($id,$status)
    {
        $old = Orders::where('id', $id)->first();
        $order = Orders::find($id);
        $order->status = $status;
        $order->save();
        activity()->performedOn($order)->log(auth()->user()->name.' change this '.$id.' no status '.$old->status.'  to '.$status);
        Toastr::success('The ordered information has been updated successfully', '', ['closeButton' => true, 'progressBar' => true]);

    }
    public function cancelOrder($id)
    {
        $order = Orders::find($id);
        $order->status = 'cancelled';
        $order->save();
        activity()->performedOn($order)->log(auth()->user()->name.' cancelled this '.$id.'no : ordered');
        Toastr::error('The ordered  cancelled successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
    public function deleteOrder($id)
    {
        if (!Orders::where('id', $id)->exists()) {
            abort(404);
        }
        $old_id = Orders::find($id);
       $order = Orders::where('id', $id)->delete();
        activity()->performedOn($old_id)->log(auth()->user()->name.' cancelled this '.$id.' ordered');
        Toastr::error('The ordered  has been deleted successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
}
