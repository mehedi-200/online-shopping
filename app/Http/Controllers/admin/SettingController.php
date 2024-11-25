<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'security';
        return view('admin.setting.security.PasswordChange.index', $data);
    }
    public function show(){
        $data['activeMenu'] = 'security';
        return view('admin.setting.security.PasswordChange.edit', $data);
    }
    public function changePass(Request $request ,$id)
    {
        $user = User::find($id);
        if($request->newPassword !== $request->confirmPassword){
            return redirect()->back()->with('error','New password and confirm password are not match');
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        activity()->performedOn($user)->log('User '. Auth()->user()->name.' changed his own password');
        Toastr::success('Password Changed Successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('security.index'));

    }
    public function email()
    {
        $data['activeMenu'] = 'security';
        return view('admin.setting.security.update-email.create', $data);
    }
    public function updateEmail(Request $request ,$id)
    {
        if (!User::where('id', $id)->exists()) {
            abort(404);
        }
        if(User::where('email',$request->current_email)->exists()){
            return redirect()->back()->with('error','Email already exists');
        }
        if(User::where('id',$id)->where('email',$request->old_email)->doesntExist())
        {
            return redirect()->back()->with('not-match','Your old email did not match');

        }
        $user = User::find($id);
        $user->email = $request->current_email;
        $user->save();
        activity()->performedOn($user)->log('User '.Auth()->user()->name.' changed his own email address');
        Toastr::success('Email has been updated Successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('security.index'));
    }

}
