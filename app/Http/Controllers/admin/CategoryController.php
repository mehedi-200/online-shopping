<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Toastr;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class CategoryController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('manage_category')){
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'category';
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        $data['display']   = Category::where('display','yes')->orderBy('id', 'desc')->get();
        return view('admin.product.category.index', $data);
    }
    public function create()
    {
        if(!Auth::user()->can('manage_category')){
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        $data['activeMenu'] = 'category';
        return view('admin.product.category.create', $data);
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
            Image::make($image)->resize(300, 300,function($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($request->name);

        if (Category::where('slug',$data['slug'])->exists())
        {
            $data['slug'] = Str::slug($data['slug'].'-'.time());
        }
        $category = Category::create($data);
        activity()->performedOn($category)->log('User '.Auth()->user()->name. ' created  '.'[ '.$request->name .' ]'.' Category');
        Toastr::success('Category has been added successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('category.index'));

    }
    public function edit($id)
    {
        if(!Auth::user()->can('manage_category')){
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
        if(!Category::where('id',$id)->exists()){
             abort(404);
        }
        $data['activeMenu'] = 'category';
        $data['category']   = Category::find($id);
        return view('admin.product.category.edit', $data);
    }
    public function update(Request $request, $id)
    {
        if (!Category::where('id',$id)->exists())
        {
            abort(404);
        }
        $oldCategory = Category::find($id)->name;
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            if(!file_exists(public_path('product'))){
                mkdir(public_path('product'), 0777, true);
            }
            $image = $request->image;
            $imageName =str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(300, 300,function($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($request->name);
        if (Category::where('slug',$data['slug'])->exists())
        {
            $data['slug'] = Str::slug($data['slug'].'-'.time());
        }
        Category::where('id', $id)->update($data);
        $category = Category::find($id);
        activity()->performedOn($category)->log('User ' . Auth()->user()->name . ' has updated '.$category->id.' no ' .' category from - ' . $oldCategory .' to '. $category->name);
        Toastr::success('The category information has been updated successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('category.index'));

    }
    public function delete($id)
    {
        if (!Category::where('id',$id)->exists())
        {
            abort(404);
        }
        $category = Category::find($id);
        Category::where('id', $id)->delete();
        activity()->performedOn($category)->log('User ' . Auth()->user()->name . ' has deleted '.$category->id.' no ' .'category '.'name'.'['.$category->name.']');
        Toastr::error('The category information has been deleted successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();

    }


    public function invoice()
    {
        $pdf =  PDF::loadView('admin.invoice',['name'=>'mehedi hasan','game'=>'FOOTBALL'])->setPaper('a4','portrait');
        return $pdf->stream('mehedi.pdf');
    }



}
