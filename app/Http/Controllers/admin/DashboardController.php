<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['activeMenu'] = 'dashboard';
        $data['customer'] = Customers::all()->count();
        $data['order'] = Orders::all()->count();
        $data['completed']  = Orders::where('status','completed')->count();
        $data['cancelled']  =Orders::where('status','cancelled')->count();
        return view('admin.dashboard', $data);

    }
}
