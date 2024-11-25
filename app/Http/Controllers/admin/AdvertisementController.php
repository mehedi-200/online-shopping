<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Toastr;

class AdvertisementController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'advertisement';
        $data['advertisements'] = Advertisement::all();
        return view('admin.setting.advertisement.index', $data);
    }
    public function create()
    {
        $data['activeMenu'] = 'advertisement';
        return view('admin.setting.advertisement.create', $data);
    }
    public function store(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            $image = $request->image;
            $imageName = str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageURl = public_path('product/'.$imageName);
            Image::make($image)->save($imageURl);
            $data['image'] = $imageName;
        }
         $add = Advertisement::create($data);
        activity()->performedOn($add)->log('User '.Auth()->user()->name. ' created  '.'[ '.$request->name .' ]'.' Advertisement');
        Toastr::success('Added successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('advertisement.index'));

    }
    public function edit(Request $request, $id)
    {
        $data['activeMenu'] = 'advertisement';
        $data['add']        = Advertisement::find($id);
        return view('admin.setting.advertisement.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $oldName = Advertisement::find($id)->name;
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            $image = $request->image;
            $imageName = str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageURl = public_path('product/'.$imageName);
            Image::make($image)->save($imageURl);
            $data['image'] = $imageName;
        }
         Advertisement::where('id',$id)->update($data);
        $add = Advertisement::find($id);
        activity()->performedOn($add)->log('User ' . Auth()->user()->name . ' has updated '.$add->id.' no ' .' advertisement from - ' . $oldName .' to '. $add->name);
        Toastr::success('This information has been updated successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('advertisement.index'));
    }
    public function delete($id)
    {
        $add = Advertisement::find($id);
        Advertisement::where('id',$id)->delete();
        activity()->performedOn($add)->log('User ' . Auth()->user()->name . ' has deleted '.$add->id.' no ' .'advertisement '.'name'.'['.$add->name.']');
        Toastr::error('The Advertisement information has been deleted successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
}
