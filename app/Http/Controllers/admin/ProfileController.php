<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CoverPicture;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Toastr;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
public function index($id)
{
    $data['activeMenu'] = 'profile';
    $profile = Profile::where('user_id',$id)->orderBy('created_at','desc')->get();
    $cover = CoverPicture::where('user_id',$id)->orderBy('created_at','desc')->get();
    $data['allData'] = $profile->concat($cover)->sortByDesc('created_at');
    $data['profile'] = Profile::where('user_id', $id)->orderBy('created_at', 'desc')->first();
    $data['cover'] = CoverPicture::where('user_id',$id)->latest()->first();
    return view('admin.profile.index',$data);
}
public function profilePicture(Request $request)
{
//    $keepImage = Arr::except($request->all(),['_token','profile_lost']);
    $user = User::find($request->id);
    $file = new Profile;
    if(!file_exists(public_path('profile'))){
        mkdir(public_path('profile'), 0755, true);
    }

        $image = Image::make($request->profile);
        $image->resize(1000,null,function($sharpness){
            $sharpness->aspectRatio();
            $sharpness->upsize();
        });
        $image->brightness(5);
        $image->sharpen(10);
//        $image->crop(300, 300);
        $imageName = 'pf-p'.time().$request->profile->getClientOriginalName();
        $imageUrl = public_path('profile/'.$imageName);
        $image->save($imageUrl,100);
        $file->image = $imageName;
        $file->user_id  = $user->id;
        $file->save();
        activity()->performedOn($file)->log('User ' . Auth()->user()->name . ' has uploaded his profile picture.');
        return Toastr::success('Profile picture upload successfully', '', ['closeButton' => true, 'progressBar' => true]);

}
    public function coverPicture(Request $request,$id)
    {
        $user = User::find($id);
        $data['activeMenu'] = 'profile';
        $file = new CoverPicture();
        if(!file_exists(public_path('profile'))){
            mkdir(public_path('profile'), 0755, true);
        }

        $image = Image::make($request->cover);
        $image->resize(1600, null,function($sharpness){
            $sharpness->aspectRatio();
            $sharpness->upsize();
        });
        $image->brightness(5);
        $image->contrast(0);
        $image->sharpen(10);
        $imageName = 'pf-p'.time().$request->cover->getClientOriginalName();
        $imageUrl = public_path('profile/'.$imageName);
        $image->save($imageUrl,100);
        $file->image = $imageName;
        $file->user_id  = $user->id;
        $file->save();
        activity()->performedOn($file)->log('User ' . Auth()->user()->name . ' has uploaded his cover picture.');
        return Toastr::success('Cover picture upload successfully', '', ['closeButton' => true, 'progressBar' => true]);

    }
    public function coverPictureReposition($id,$image_id,$top_position)
    {
        $cover  = CoverPicture::where('user_id',$id)->where('id',$image_id)->first();
        $cover->top_position = $top_position;
        $cover->save();
        activity()->performedOn($cover)->log('User ' . Auth()->user()->name . ' has changed his cover picture position.');
        return Toastr::success('Image position change successfully', '', ['closeButton' => true, 'progressBar' => true]);


    }

//    public function ajaxCheck(Request $request)
//    {
//        $userId = $request->input('id');
//        $imageData = $request->input('image');
//        dd($request->all());
//
//
//        // ইমেজ ডেটা থেকে ফাইল তৈরি
//        $image = str_replace('data:image/png;base64,', '', $imageData);
//        $image = str_replace(' ', '+', $image);
//        $imageName = 'profile_' . $userId . '.png';
//
//        // ইমেজ ফাইল সংরক্ষণ
//        \File::put(public_path('uploads/profile_images/' . $imageName), base64_decode($image));
//
//        return response()->json(['success' => 'Image uploaded successfully']);
//    }




}
