<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class GoogleAuthController extends Controller
{

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(Request $request)
    {
        $googleData = Socialite::driver('google')->user();

      //  dd($googleData->user['given_name']);


        if (User::where('email', $googleData->email)->exists()) {
            $user = User::where('email',  $googleData->email)->first();
            $user->google_provider_id = $googleData->id;
            $user->save();
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        } else {
            $user = new User();
            $user->name = $googleData->name;
            $user->email = $googleData->email;
            $user->google_provider_id = $googleData->id;
            $user->role_id =  1;
            $user->assignRole('admin');
            $user->save();
            Auth::login($user);
            activity()->performedOn($user)->log('User ' . Auth()->user()->name . ' has created by google account');
            return redirect()->route('admin.dashboard');
        }
    }

}
