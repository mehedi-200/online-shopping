<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Toastr;

class ProductController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'product';
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('admin.product.index', $data);
    }
    public function create()
    {
        $data['activeMenu'] = 'product';
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('admin.product.create', $data);
    }
    public function store(Request $request)
    {
        $data  = Arr::except($request->all(),['_token']);
        if($request->image){
            $image  = $request->image;
            $imageName = strtolower(str_replace(' ','-',$request->name)).'-'.time().'-'.'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(1000,null,function ($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $product =  Product::create($data);
        $slug = Str::slug($request->title);
        if(Product::where('slug', $slug)->exists()){
            $slug = $slug.'-'.time();
        }
        $product->slug = $slug;
        $product->save();

        activity()->performedOn($product)->log('User '.Auth()->user()->name. ' created  '.'[ '.$request->name .' ]'.' Product');
        $productImage = $request->image2;
        if($productImage && is_array($productImage)){
            foreach ($productImage as $image2){

                $imageName = str_replace(' ','-',$request->name).'-'.time().'-'.'.'.$image2->getClientOriginalExtension();
                $imageUrl = public_path('product/'.$imageName);
                Image::make($image2)->resize(1000,null,function ($sharp){
                $sharp->aspectRatio();
                })->save($imageUrl);

            $productData = new ProductImage();
            $productData->image= $imageName;
            $productData->product_id = $product->id;
            $productData->save();
        }}
        Toastr::success('Product has been added successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('product.index'));

    }
    public function edit($id)
    {
        if (!Product::where('id', $id)->exists()) {
            abort(404);
        }
        $data['activeMenu'] = 'product';
        $data['categories'] = Category::all();
        $data['products']   = Product::find($id);
        return view('admin.product.edit', $data);
    }
    public function update(Request $request, $id)
    {
        if (!Product::where('id', $id)->exists()) {
            abort(404);
        }

        $data  = Arr::except($request->all(),['_token','image2']);
        if($request->image){
            $image  = $request->image;
            $imageName = str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('product/'.$imageName);
            Image::make($image)->resize(1000,null,function ($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        if(!$request->featured and !$request->new_arrival){
            $data['featured'] = null;
            $data['new_arrival'] = null;
        }
        Product::where('id',$id)->update($data);
        $product = Product::find($id);
        $slug = Str::slug($request->title);
        if(Product::where('slug', $slug)->exists()){
            $slug = $slug.'-'.time();
        }
        $product->slug = $slug;
        $product->save();
        activity()->performedOn($product)->log('User '.Auth()->user()->name. ' has been edited'.'[ '.$product->name .' ]'.' Product');
        $productImage = $request->image2;
        if($productImage && is_array($productImage)){
            foreach ($productImage as $image2){

                $imageName = str_replace(' ','-',$request->name).'-'.time().'-'.'.'.$image2->getClientOriginalExtension();
                $imageUrl = public_path('product/'.$imageName);
                Image::make($image2)->resize(1000,null,function ($sharp){
                    $sharp->aspectRatio();
                })->save($imageUrl);

                $productData = new ProductImage();
                $productData->image= $imageName;
                $productData->product_id = $product->id;
                $productData->save();
            }}
        Toastr::success('Product has been edited successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect(route('product.index'));

    }
    public function delete($id)
    {
        if (!Product::where('id', $id)->exists()) {
            abort(404);
        }
        $product = Product::find($id);
        Product::where('id',$id)->delete();
        activity()->performedOn($product)->log('User ' . Auth()->user()->name . ' has deleted '.$product->id.' no ' .'product '.'name'.'['.$product->name.']');
        Toastr::error('The product information has been deleted successfully', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->back();

    }
    public function getSubcategory($id)
    {
        if (!SubCategory::where('category_id', $id)->exists()) {
            abort(404);
        }
        return Subcategory::where('category_id', $id)->orderBy('id','desc')->get();
    }
    public function editSubcategory($id)
    {
        if (!SubCategory::where('id', $id)->exists()) {
        abort(404);
          }

        return Subcategory::where('category_id', $id)->orderBy('id','desc')->get();
    }
}
