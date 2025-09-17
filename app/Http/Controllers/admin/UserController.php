<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Toastr;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'activity_log';
        $data['user']       = User::orderBy('id', 'desc')->get();
        return view('admin.setting.activity_log.index', $data);

    }
    public function view($id)
    {
        $data['activeMenu'] = 'activity_log';
        $data['users']      = User::find($id);
        $data['activity']   = ActivityLog::where('causer_id',$id)->orderBy('id','desc')->get();
        return view('admin.setting.activity_log.view', $data);
    }
    public function userIndex()
    {
        $data['activeMenu'] = 'user';
        $data['users'] = User::all();
        return view('admin.setting.user_info.index', $data);
    }
    public function userCreate()
    {
        $data['activeMenu'] = 'user';
        $data['roles'] = Role::all();
        return view('admin.setting.user_info.create', $data);
    }
    public function userStore(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('warning', 'User already exists with this email address!');
        }

        $role = Role::find($request->role_id);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        if($request->image){
            $image = Image::make($request->image);
            $image->resize(1000,null,function($sharpness){
                $sharpness->aspectRatio();
                $sharpness->upsize();
            });
            $image->brightness(5);
            $image->sharpen(10);
            $imageName = 'pf'.time().'.'.$request->image->getClientOriginalExtension();
            $imageUrl = public_path('profile/'.$imageName);
            $image->save($imageUrl,100);
            $user->image = $imageName;
        }
        $user->role_id = $request->role_id;
        $user->assignRole($role->name);
        $user->save();
        activity()->performedOn($user)->log('User ' . Auth()->user()->name . ' has created '.' this user ' .'['.$request->name.'] '.' account');
        Toastr::success('The user account has been created successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('user.index'));
    }
    public function userEdit($id)
    {
        $data['activeMenu'] = 'user';
        $data['roles'] = Role::all();
        $data['user'] = User::where('id', $id)->first();
        return view('admin.setting.user_info.edit', $data);

    }
    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);


        if (User::where('email', $request->email)->where('id','!=',$id)->exists()) {
            return redirect()->back()->with('warning', 'User already exists with this email address!');
        }

            $role = Role::find($request->role_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if (!is_null($request->password))
            {
                $user->password = Hash::make($request->password);
            }

            $user->role_id = $request->role_id;
            $user->assignRole($role->name);
            if($request->image){
                $image = Image::make($request->image);
                $image->resize(1000,null,function($sharpness){
                    $sharpness->aspectRatio();
                    $sharpness->upsize();
                });
                $image->brightness(5);
                $image->sharpen(10);
                $imageName = 'pf'.time().'.'.$request->image->getClientOriginalExtension();
                $imageUrl = public_path('profile/'.$imageName);
                $image->save($imageUrl,100);
                $user->image = $imageName;
            }

        $user->save();


        activity()->performedOn($user)->log('User ' . Auth()->user()->name . ' has updated '.' this user ' .'['.$request->name.'] '.' account');
        Toastr::success('The user account has been updated successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('user.index'));
    }

    public function userDelete($id)
    {
        $user = User::find($id);
         User::where('id', $id)->delete();
        activity()->performedOn($user)->log('User ' . Auth()->user()->name . ' has deleted '.' this user ' .'['.$user->name.']'.' account');
        Toastr::error('The user account has been created successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
    public function updateLastSeen(Request $request)
    {
        $user = Auth::user();
        $user->last_seen = now();
        if ($user->activity_check !== 'active')
        {
            $user->activity_check = 'active';
        }
        $user->save();
        return response()->json();
    }
    public function logOutLastUpdate(Request $request)
    {
       $user = Auth::user();
       $user->activity_check = 'inactive';
       $user->save();
       return response()->json();
    }

}
