<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'user';
        $data['user']       = User::orderBy('id', 'desc')->get();
        return view('admin.setting.user.index', $data);

    }
    public function view($id)
    {
        $data['activeMenu'] = 'user';
        $data['users']      = User::find($id);
        $data['activity']   = ActivityLog::where('causer_id',$id)->orderBy('id','desc')->get();
        return view('admin.setting.user.view', $data);
    }
}
