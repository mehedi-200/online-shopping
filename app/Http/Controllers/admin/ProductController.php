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
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (!Auth::user()->can('manage_product')) {
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        } // end permission checking

        $data['activeMenu'] = 'product';
        $data['products'] = Product::orderBy('id','desc')->paginate(5);
        return view('admin.product.index', $data);
    }
    public function create()
    {
        if(!Auth::user()->can('manage_product')) {
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        };
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
        if(!Auth::user()->can('manage_product')) {
            Toastr::warning('Access denied.', '', ['closeButton' => true, 'progressBar' => true]);
            return redirect(route('admin.dashboard'));
        } ;
        Product::findOrFail($id);
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
        $product = Product::findOrFail($id);
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
    public function csvDownload()
    {
       $product = Product::orderBy('id','desc')->get();
       $callback = function () use ($product) {
           $file = fopen('php://output','w');
           fputcsv($file,['ID','Category','Sub Category','Product Title','Price']); //header of csv table;
           for($i = 0; $i < count($product); $i++){
               fputcsv($file,[
                   $i + 1,
                   $product[$i]->category->name,
                   $product[$i]->subCategory->name,
                   $product[$i]->title,
                   $product[$i]->price
               ]);
           };
           fclose($file);
       };
       return response()->stream($callback, 200, headers());
    }
//    public function csvDownload()
//    {
//        $headers = [
//            'Content-Type' => 'text/csv',
//            'Content-Disposition' => 'attachment; filename=products.csv',
//            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
//            'Pragma' => 'no-cache',
//            'Expires' => '0'
//        ];
//
//        $products = Product::with(['category', 'subCategory'])
//            ->orderBy('id', 'desc')
//            ->get();
//
//        $callback = function () use ($products) {
//            $file = fopen('php://output', 'w');
//
//            // CSV Header
//            fputcsv($file, ['ID', 'Category', 'Sub Category', 'Product Title', 'Price']);
//
//            foreach ($products as $index => $product) {
//                fputcsv($file, [
//                    $index + 1,
//                    optional($product->category)->name,
//                    optional($product->subCategory)->name,
//                    $product->title,
//                    $product->price
//                ]);
//
//                // ✅ Flush output buffer after each line (or after few lines in real case)
//                if (ob_get_level()) {
//                    ob_flush(); // flush buffer
//                }
//                flush(); // send to browser
//            }
//
//            fclose($file);
//        };
//
//        return response()->stream($callback, 200, $headers);
//    }

}
