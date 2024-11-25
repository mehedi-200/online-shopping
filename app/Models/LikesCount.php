<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikesCount extends Model
{
    protected $table = 'likes_counts';
    protected $guarded=[];
    protected  $fillable =['user_ip','product_id','like'];
}
