<?php

use App\Http\Controllers\admin\AdvertisementController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\FrontProductController;
use App\Http\Controllers\user\PayPalPaymentController;

Route::get('/', function () {
    $data['slides'] = Slide::all();
    $data['adds'] = Advertisement::orderBy('id','desc')->select('id','image')->take(2)->get()->reverse();
    $data['categories'] = Category::has('subCategory')->get();
    $data['products'] = Product::orderBy('id','desc')->get();
    $data['featured'] = Product::where('featured','featured')->orderBy('id','desc')->get();
    $data['arrival'] = Product::where('new_arrival','arrival')->orderBy('id','desc')->get();
    $data['views']  = Product::orderBy('number_of_view','desc')->take(5)->get();
    return view('welcome',$data);
});
    Route::get('/sub-category/{slug}',[FrontProductController::class,'productBySubcategory'])->name('products.index');
    Route::get('/details/{slug}',[FrontProductController::class,'productDetails'])->name('productDetails');
    Route::get('/products',[FrontProductController::class,'productByProduct'])->name('productsByProduct');
    Route::get('/category/{slug}',[FrontProductController::class,'productByCategory'])->name('productByCategory');
    Route::get('/add-to-card/{slug}/{qty}',[FrontProductController::class,'addToCard']);
    Route::get('/destroy-add-to-card/{id}',[FrontProductController::class,'destroyAddToCard']);
    Route::get('/product-like-unlike/{product_id}',[FrontProductController::class,'productLikeUnlike']);
    Route::get('/card',[FrontProductController::class,'ViewCartProduct'])->name('ViewCartProduct');
    Route::get('/update-card-sub-total-for-shopping-card/{id}/{qty}',[FrontProductController::class,'update_CartSub_Total']);
    Route::get('/checkout',[FrontProductController::class,'checkout_card'])->name('checkout_card');
    Route::post('/guest-place-order',[FrontProductController::class,'placeOrder'])->name('placeOrder');
//    Route::get('/member-place-order',[FrontProductController::class,'placeOrderByLogin'])->name('placeOrderByLogin');
    Route::get('/order_success/{id}',[FrontProductController::class,'orderSuccess'])->name('orderSuccess');

    Route::get('pay-with-paypal/{order_id}', [PayPalPaymentController::class, 'payWithPaypal'])->name('payWithPaypal');
    Route::any('paypal-payment-success', [PayPalPaymentController::class, 'paypalPaymentSuccess'])->name('paypalPaymentSuccess');
    Route::any('paypal-payment-cancel', [PayPalPaymentController::class, 'paypalPaymentCancel'])->name('paypalPaymentCancel');


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::group(['prefix' => 'product'], function () {
            Route::get('index',[ProductController::class,'index'])->name('product.index');
            Route::get('create',[ProductController::class,'create'])->name('product.create');
            Route::post('store',[ProductController::class,'store'])->name('product.store');
            Route::get('edit/{id}',[ProductController::class,'edit'])->name('product.edit');
            Route::post('update/{id}',[ProductController::class,'update'])->name('product.update');
            Route::get('delete/{id}',[ProductController::class,'delete'])->name('product.delete');
            Route::get('get-subcategory-by-category/{id}',[ProductController::class,'getSubcategory']);
            Route::get('edit-subcategory-by-category/{id}',[ProductController::class,'editSubcategory']);

        Route::group(['prefix' => 'category'], function () {
            Route::get('index',[CategoryController::class,'index'])->name('category.index');
            Route::get('create',[CategoryController::class,'create'])->name('category.create');
            Route::post('store',[CategoryController::class,'store'])->name('category.store');
            Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
            Route::post('update/{id}',[CategoryController::class,'update'])->name('category.update');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
        });
        Route::group(['prefix' => 'sub-category'], function () {
            Route::get('index',[SubCategoryController::class,'index'])->name('sub-category.index');
            Route::get('create',[SubCategoryController::class,'create'])->name('sub-category.create');
            Route::post('store',[SubCategoryController::class,'store'])->name('sub-category.store');
            Route::get('show/{id}',[SubCategoryController::class,'show'])->name('sub-category.show');
            Route::post('update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
            Route::get('destroy/{id}',[SubCategoryController::class,'destroy'])->name('sub-category.destroy');
        });
        });  //--->product end bracket<---//
        Route::group(['prefix' => 'order'], function () {
            Route::get('pending',[OrderController::class,'pending'])->name('order.pending');
            Route::get('processing',[OrderController::class,'processing'])->name('order.processing');
            Route::get('completed',[OrderController::class,'completed'])->name('order.completed');
            Route::get('cancelled',[OrderController::class,'cancelled'])->name('order.cancelled');
            Route::get('view/{id}',[OrderController::class,'view'])->name('order.view');
            Route::get('/order-cancel-or-completed/{id}/{status}',[OrderController::class,'cancelOrCompleted']);
            Route::get('cancel-order/{id}',[OrderController::class,'cancelOrder'])->name('order.cancel');
            Route::get('delete/{id}',[OrderController::class,'deleteOrder'])->name('order.delete');
        });
        Route::group(['prefix' => 'setting'], function () {

            Route::get('index',[SettingController::class,'index'])->name('security.index');
            Route::group(['prefix' => 'slider'], function () {
                Route::get('index',[SlideController::class,'index'])->name('slider.index');
                Route::get('create',[SlideController::class,'create'])->name('slider.create');
                Route::post('store',[SlideController::class,'store'])->name('slider.store');
                Route::get('show/{id}',[SlideController::class,'show'])->name('slider.show');
                Route::post('update/{id}',[SlideController::class,'update'])->name('slider.update');
                Route::get('destroy/{id}',[SlideController::class,'destroy'])->name('slider.destroy');
            });
            Route::group(['prefix' => 'user'], function () {
             Route::get('index',[UserController::class,'index'])->name('user.index');
             Route::get('view/{id}',[UserController::class,'view'])->name('user.view');
            });
            Route::group(['prefix' => 'advertisement'], function () {
                Route::get('index',[AdvertisementController::class,'index'])->name('advertisement.index');
                Route::get('create',[AdvertisementController::class,'create'])->name('advertisement.create');
                Route::post('store',[AdvertisementController::class,'store'])->name('advertisement.store');
                Route::get('edit/{id}',[AdvertisementController::class,'edit'])->name('advertisement.edit');
                Route::post('update/{id}',[AdvertisementController::class,'update'])->name('advertisement.update');
                Route::get('delete/{id}',[AdvertisementController::class,'delete'])->name('advertisement.delete');

            });
            Route::group(['prefix' => 'security'], function () {
                Route::get('index', [SettingController::class, 'index'])->name('security.index');
                Route::get('create', [SettingController::class, 'show'])->name('security.password');
                Route::post('change-password/{id}', [SettingController::class, 'changePass'])->name('security.change_password');
                Route::get('edit-email', [SettingController::class, 'email'])->name('security.email');
                Route::post('update-email/{id}', [SettingController::class, 'updateEmail'])->name('security.updateEmail');
            });

        }); //--->setting end bracket<---//
        Route::group(['prefix' => 'profile'], function () {
            Route::get('index/{id}', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('/profile-upload/{id}', [ProfileController::class, 'profilePicture'])->name('profile.picture');
            Route::post('/cover-upload/{id}', [ProfileController::class, 'coverPicture'])->name('profile.cover');
            Route::get('/cover-reposition/{id}/{image_id}/{top_position}', [ProfileController::class, 'coverPictureReposition'])->name('profile.coverReposition');
        });




    });//--->admin end bracket<---//

});

