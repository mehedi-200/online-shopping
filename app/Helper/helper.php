<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use App\Models\LikesCount;
use App\Models\Profile;
use App\Models\User;


function category()
{
    return Category::where('display','yes')->orderBy('id','desc')->take(5)->get();
}
function allCategory()
{
    return Category::orderBy('created_at','desc')->get();
}
function addToCart ()
{
    return AddToCart::where('user_ip',request()->ip())->orderBy('id','desc')->get();
}

function totalCartAmount ()
{
    return AddToCart::where('user_ip',request()->ip())->sum('total_price');
}
function add_to_card_product($product_id)
{
    if(AddToCart::where('user_ip',request()->ip())->where('product_id',$product_id)->exists())
    {
        return 'yes';
    } else{
        return 'no';
    }
}
function checkLike($product_id): string
{
    if(LikesCount::where('user_ip',request()->ip())->where('product_id',$product_id)->exists()){
        return 'yes';

    } else{
        return 'no';
    }
}
function profile_picture()
{
    return Profile::orderBy('id','desc')->get();
}
function profile_picture_check($user_id): string
{
  if(!Profile::where('user_id',$user_id)->exists()){
      return 'yes';
  }
  else {
      return 'no';
  }
}



?>
