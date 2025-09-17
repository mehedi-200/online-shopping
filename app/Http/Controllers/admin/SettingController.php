<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\PasswordChangeEmailJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChangeEmail;

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
        if(!Hash::check($request->oldPassword, $user->password)){
            return redirect()->back()->withInput()->with('error','Your current password is incorrect');

        }

        if($request->newPassword !== $request->confirmPassword){
            return redirect()->back()->withInput()->with('error','New password and confirm password are not match');
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
    public function changeEmail(Request $request ,$id)
    {
        $user = User::findOrFail($id);
        if(User::where('email',$request->current_email)->exists()){
            return redirect()->back()->with('error','Email already exists');
        }
        if(User::where('id',$id)->where('email',$request->old_email)->doesntExist())
        {
            return redirect()->back()->with('error','Your old email did not match');

        }
        $code = rand(100000,999999);
        $to = $user->email;
        $msg = $code;
        $subject = "Verify your email address";
        PasswordChangeEmailJobs::dispatch($to,$subject,$msg);
        $user->verify_code = $code;
        $user->save();
        return redirect()->back()->with([
            'success' => 'We sent a verification code to your email address',
            'model' => 1
        ]);

    }
    public function verifyEmail(Request $request ,$id)
    {
        $user = User::findOrFail($id);
        if($user->verify_code != $request->verify_code)
        {
            return redirect()->back()->withInput()->with(['error_verify' => 'Wrong verification code', 'model' => 1]);
        }
        $user->verify_status = 'yes';
        $user->save();

        return redirect()->back()->with(['new_email'=>'New Email Address','success'=>'Your email address has been verified','url'=>1]);

    }
    public function updateEmail(Request $request ,$id)
    {
        $user = User::find($id);

        if($user->verify_status != 'yes')
        {
            return redirect()->back()->withInput()->with(['error' => 'Your account is not verified']);
        }
        if($user->where('email',$request->current_email)->exists())
        {
            return redirect()->back()->with(['new_email'=>'New Email Address','error'=>'This email already exists.Use new email Address .','url'=>1]);
        }

        $user->email = $request->current_email;
        $user->verify_status = 'no';
        $user->save();
        activity()->performedOn($user)->log('User '.Auth()->user()->name.' changed his own email address');
        Toastr::success('Email has been updated Successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('security.index'));
    }

}
