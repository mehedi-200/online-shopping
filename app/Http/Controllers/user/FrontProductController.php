<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
use App\Models\Customers;
use App\Models\LikesCount;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Views;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;


class FrontProductController extends Controller
{
    public function productDetails($slug)
    {
        $data['product'] = Product::where('slug', $slug)->orderBy('id','desc')->first();
        $data['subCategories'] = SubCategory::where('category_id', $data['product']->category_id)->orderBy('id','asc')->get();
        $data['allProducts'] = Product::all();
        $data['page_title'] = $data['product']->name;
        $data['page_details'] = $data['product']->name;
        if (Product::where('slug', $slug)->exists()) {
            $data['product'] = Product::where('slug', $slug)->orderBy('id','desc')->first();
            if (!$data['product']) {
                return redirect()->back()->with('error', 'Product not found');
            }
            $data['product']->number_of_view +=1;
            $data['product']->save();
            return view('user-panel.details',$data);
        } else{
            abort(404);
        }

    }
    public function productBySubcategory($slug)
    {
        if (SubCategory::where('slug', $slug)->exists()) {
            $data['categories'] = Category::orderBy('id','desc')->get();
            $data['subCategories'] = SubCategory::where('slug',$slug)->orderBy('id','desc')->get();
            $subCat = SubCategory::where('slug',$slug)->first();
            $data['product'] =Product::where('subCategory_id',$subCat->id)->orderBy('id','desc')->get();
            $data['page_title'] = 'Products';
            $data['page_details'] = 'Products';
            return view('user-panel.products', $data);
        } else{
           abort(404);
        }
    }
    public function productByProduct()
    {
        if (Product::all())
        {
            $data['page_title'] = 'Products';
            $data['page_details'] = 'Products';
            $data['products']     = Product::orderBy('id','desc')->get();
            $data['addToCard'] = AddToCart::select('user_ip','product_id')->get();
            return view('user-panel.all_products', $data);
        } else{
            abort(404);
        }




    }
    public function productByCategory($slug)
    {
        if (Category::where('slug', $slug)->exists())
        {
            $data['page_title'] = 'Categories';
            $data['page_details'] = 'Categories';
            $data['active_product'] = 'Categories';

            $data['categories']  = Category::where('slug',$slug)->orderBy('id','desc')->get();
            $product_count = category::where('slug',$slug)->first();
            $data['products'] = Product::where('category_id',$product_count->id)->orderBy('id','desc')->count();
            return view('user-panel.category_product', $data);
        } else {
            abort(404);
        }

    }

 public function addToCard(Request $request,$slug,$qty)
    {
        $product_id = Product::where('slug', $slug)->first();

        if (AddToCart::where('user_ip',$request->ip())->where('product_id',$product_id->id)->exists()) {
            return 404;
        } else{
            $product = Product::where('slug', $slug)->first();
            $id = $product->id;
            $AddToCart = new AddToCart();
            $AddToCart->product_id = $product->id;
            $AddToCart->quantity	 = $qty;
            $AddToCart->unit_price	 = $product->price;
            $AddToCart->total_price	 = $product->price*$qty;
            $AddToCart->user_ip	 = $request->ip();
            $AddToCart->save();
            $addToCartTotal_price = AddToCart::where('user_ip',$request->ip())->sum('total_price');
            $addToCartTotal_count = AddToCart::where('user_ip',$request->ip())->count();
            $filterAddToCard = AddToCart::with('product')->where('user_ip', $request->ip())->orderBy('created_at', 'desc')->get();
            return response()->json(['status'=>200,'total_price' => $addToCartTotal_price ,'total_count' => $addToCartTotal_count,'addToCard' =>$filterAddToCard,'id'=>$id]);

        }

    }


    public function destroyAddToCard(Request $request, $id)
    {
        if(AddToCart::where('user_ip',$request->ip())->where('product_id',$id)->exists())
        {
            AddToCart::where('user_ip',$request->ip())->where('product_id',$id)->delete();
            $addToCartTotal_price = AddToCart::where('user_ip',$request->ip())->sum('total_price');
            $addToCartTotal_count = AddToCart::where('user_ip',$request->ip())->count();
            $filterAddToCard = AddToCart::with('product')->where('user_ip', $request->ip())->orderBy('created_at', 'desc')->get();
            return response()->json(['status'=>200,'total_price' => $addToCartTotal_price ,'total_count' => $addToCartTotal_count,'addToCard' =>$filterAddToCard]);

        } else{
            return Response()->json(
                ['status'=>404, 'message'=>'Product not found',]);
        }

    }
    public function productLikeUnlike(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        if(!$product){
             return response()->json([
                 'status' => 404,
                 'result' => 'failed',
                 'message' => 'Product not found'
             ]);
        }

        if (LikesCount::where('user_ip', $request->ip())->where('product_id', $product->id)->exists()) {
            LikesCount::where('user_ip', $request->ip())->where('product_id', $product->id)->delete();
            $product->likes -= 1;
            $product->save();
            return response()->json([
                'status' => 200,
                'result' => 'unlike',
                'message' => 'Unlike successfully'
            ]);
        } else{
            $likeCount = new LikesCount();
            $likeCount->product_id = $product->id;
            $likeCount->user_ip = $request->ip();
            $likeCount->save();

            $product->likes += 1;
            $product->save();
            return response()->json([
                'status' => 200,
                'result' => 'like',
                'message' => 'Like successfully'
            ]);
        }

    }

    public function ViewCartProduct(Request $request)
    {
        $data['addToCart'] = AddToCart::has('product')->where('user_ip',$request->ip())->orderBy('id','desc')->get();
        $data['page_title'] = 'View Cart';
        $data['page_details'] = 'View Cart';
        return view('user-panel.shopping_card', $data);
    }
    public function update_CartSub_Total(Request $request ,$id,$qty)
    {
        $product = AddToCart::where('id', $id)->first();
        if (AddToCart::where('user_ip', $request->ip())->where('product_id', $product->product_id)->exists()) {
            $addToCard = AddToCart::find($id);
            $addToCard->quantity = $qty;
            $addToCard->total_price = $addToCard->unit_price*$addToCard->quantity;
            $addToCard->save();
            $all_total_price = AddToCart::where('user_ip',$request->ip())->sum('total_price');
            return response()->json(['status' => 200, 'total' => $addToCard->total_price, 'all_total' => $all_total_price]);

        } else {
            return response()->json(['status' => 404, 'result' => 'product not found','quantity'=>$qty,'id'=>$id]);

        }
    }
    public function checkout_card()
    {
        $data['page_title'] = 'Checkout';
        $data['page_details'] = 'Checkout';
        return view('user-panel.checkout', $data);
    }
    public function placeOrder(Request $request)
    {
        if(!$request->payment)
        {
            $previous = url()->previous();
            return redirect()->to($previous.'#get_back')->withInput()->with('select_payment', 'You do not select any payment method !');

        }
        $previous = url()->previous();
        if(!AddToCart::where('user_ip',$request->ip())->exists()){
            return redirect()->to($previous.'#get_back')->withInput()->with('no_product_added_to_CARD', 'You do not purchase any product sir !');
        }
        $data['page_title'] = 'Place Order';
        $data['page_details'] = 'Place Order';

        if($request->password != $request->confirm_password){
            return redirect()->to($previous.'#get_back')->withInput()->with('pwd_not_matched', 'Password and Confirm password not matched');
        }
        if(User::where('email',$request->email)->exists()){
            return redirect()->to($previous.'#get_back')->withInput()->with('email_exists', 'Email already exists');
        }
        if (User::where('phone',$request->phone)->exists()){
            return redirect()->to($previous.'#get_back')->withInput()->with('phone_exists', 'Phone already exists');
        }
        $userData = Arr::except($request->all(),array('first_name','last_name','confirm_password','postal_code','city','payment'));
        $userData['password'] = Hash::make($request->password);
        $userData['name'] = $request->first_name.' '.$request->last_name;
        $user = User::create($userData);

        $customerData = Arr::except($request->all(),array('confirm_password','password','email','phone','payment'));
        $customerData['user_id'] = $user->id;
        $customer = new Customers();
        $newCustomer = Customers::create($customerData);
        $order = new Orders();
        $order->customer_id = $newCustomer->id;
        $order->total_price = AddToCart::where('user_ip',$request->ip())->sum('total_price');
        $order->sub_total = $order->total_price;
        $order->payment_type = $request->payment;
        $order->save();


        $addToCart = AddToCart::has('product')->where('user_ip',$request->ip())->get();
        foreach($addToCart as $card)
        {
            $order_item = new OrderItems();
            $order_item->order_id = $order->id;
            $order_item->product_id = $card->product_id;
            $order_item->product_name = $card->product->name;
            $order_item->unit_price = $card->product->price;
            $order_item->quantity = $card->quantity;
            $order_item->unit_total = $card->total_price;
            $order_item->save();
            $card->delete();
        }
        if ($request->payment === 'cod')
        {
            return redirect(route('orderSuccess',['data'=>$data ,'id'=>$order->id]));

        } else if ($request->payment === 'paypal')
        {
            return redirect(route('payWithPaypal',['order_id'=>$order->id]));

        }

    }
    public function placeOrderByLogin(Request $request)
    {
        if(!AddToCart::where('user_ip',$request->ip())->exists()){
            return redirect()->back()->withInput()->with('no_product_added', 'You do not purchase any product sir !');
        }
        $data['page_title'] = 'Place Order';
        $data['page_details'] = 'Place Order';
        if(!User::where('email',$request->email)->exists()){
            return redirect()->back()->withInput()->with('email_not_exists', 'Email does not already exists');
        }
        $userMail = User::where('email',$request->email)->first();
        if(!Hash::check($request->password,$userMail->password)){
            return redirect()->back()->withInput()->with('pwd_not_matched_log_in', 'password not matched');
        }
        $customer = Customers::where('user_id',$userMail->id)->first();
        $customer->activity_count = $customer->activity_count+1;
        $customer->save();
        $order = new Orders();
        $order->customer_id = $customer->id;
        $order->total_price = AddToCart::where('user_ip',$request->ip())->sum('total_price');
        $order->sub_total = $order->total_price;
        $order->save();
        $addToCart = AddToCart::has('product')->where('user_ip',$request->ip())->get();
        foreach($addToCart as $card)
        {
            $order_item = new OrderItems();
            $order_item->order_id = $order->id;
            $order_item->product_id = $card->product_id;
            $order_item->product_name = $card->product->name;
            $order_item->unit_price = $card->product->price;
            $order_item->quantity = $card->quantity;
            $order_item->unit_total = $card->total_price;
            $order_item->save();
            $card->delete();
        }

        return redirect(route('orderSuccess',['data'=>$data ,'id'=>$order->id]));

    }
    public function orderSuccess($id)
    {
        $data['page_title'] = 'Order Success';
        $data['page_details'] = 'Order Success';
        $data['order']  = Orders::where('id',$id)->first();
        return view('user-panel.order_success',$data);
    }






}

