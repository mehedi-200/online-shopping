<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Toastr;

class SlideController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('manage_slide')){
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'slide';
        $data['slides']     = Slide::orderBy('id', 'desc')->get();
        return view('admin.setting.slide.index', $data);
    }
    public function create()
    {
        if(!Auth::user()->can('manage_slide')){
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'slide';
        return view('admin.setting.slide.create', $data);
    }
    public function store(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            if(!file_exists(public_path('product'))){
                mkdir(public_path('product'), 0777, true);
            }
            $image = $request->image;
            $imageName =str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(1000, null,function($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $slide = Slide::create($data);
        activity()->performedOn($slide)->log('User '.Auth()->user()->name. ' created  '.'[ '.$request->name .' ]'.' Category');
        Toastr::success('Slider information has been added successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('slider.index'));
    }
    public function show($id)
    {
        if(!Auth::user()->can('manage_slide')){
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'slide';
        $data['slide']      = Slide::findOrFail($id);
        return view('admin.setting.slide.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $oldSlide = Slide::find($id)->name;
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            if(!file_exists(public_path('product'))){
                mkdir(public_path('product'), 0777, true);
            }
            $image = $request->image;
            $imageName =str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(1000, null,function($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        Slide::where('id', $id)->update($data);
        $slide = Slide::find($id);
        activity()->performedOn($slide)->log('User ' . Auth()->user()->name . ' has updated '.$slide->id.' no' .' category from - ' . $oldSlide .' to '. $slide->name);
        Toastr::success('The slider information has been updated successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('slider.index'));
    }
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        Slide::where('id', $id)->delete();
        activity()->performedOn($slide)->log('User ' . Auth()->user()->name . ' has deleted '.$slide->id.' no' .'category '.'name'.'['.$slide->name.']');
        Toastr::error('The slider information has been deleted successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
}
