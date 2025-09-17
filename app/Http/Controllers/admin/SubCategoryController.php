<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Console\View\Components\Warn;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Toastr;

class SubCategoryController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('manage_subcategory')) {
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'sub-category';
        $data['subCategories'] = SubCategory::orderBy('id', 'desc')->get();
        return view('admin.product.subCategory.index', $data);
    }
    public function create()
    {
        if(!Auth::user()->can('manage_subcategory')) {
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'sub-category';
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        return view('admin.product.subCategory.create', $data);
    }
    public function store(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            $image = $request->image;
            $imageName = str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(500,null,function($constraint){
                $constraint->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($request->name);
        if (SubCategory::where('slug', $data['slug'])->exists()) {
            $data['slug'] = Str::slug($data['slug'].'-'.$data['name']);
        }
       $subCategory =  SubCategory::create($data);
        activity()->performedOn($subCategory)->log('User'.Auth()->user()->name.'has been created '.'['.$subCategory->name.']'.' sub category');
        Toastr::success('Category has been added successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('sub-category.index'));
    }
    public function show($id)
    {
        if(!Auth::user()->can('manage_subcategory')) {
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        if (!SubCategory::where('id', $id)->exists()) {
            abort(404);
        }
        $data['activeMenu'] = 'sub-category';
        $data['subCat'] = SubCategory::find($id);
        return view('admin.product.subCategory.edit', $data);
    }
    public function update(Request $request, $id)
    {
        if (!SubCategory::where('id', $id)->exists()) {
            abort(404);
        }
        $oldSubCategory = SubCategory::find($id)->name;
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            $image = $request->image;
            $imageName = str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(500,null,function($constraint){
                $constraint->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($request->name);
        if (SubCategory::where('slug', $data['slug'])->exists()) {
            $data['slug'] = Str::slug($data['slug'].'-'.$data['name']);
        }
        SubCategory::where('id', $id)->update($data);
        $subCategory = SubCategory::find($id);
        activity()->performedOn($subCategory)->log('User ' . Auth()->user()->name . ' has updated '.$subCategory->id.' no ' .' category from - ' . $oldSubCategory .' to '. $subCategory->name);
        Toastr::success('The category information has been updated successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('sub-category.index'));

    }
    public function destroy($id)
    {
        if (!SubCategory::where('id', $id)->exists()) {
            abort(404);
        }
        $subCategory = SubCategory::find($id);
        SubCategory::where('id', $id)->delete();
        activity()->performedOn($subCategory)->log('User ' . Auth()->user()->name . ' has deleted '.$subCategory->id.' no ' .'category '.'name'.'['.$subCategory->name.']');
        Toastr::error('The sub-category information has been deleted successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();
    }
}
