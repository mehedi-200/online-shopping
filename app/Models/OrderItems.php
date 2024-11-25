<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{

    protected $table = 'order_items';
    protected $guarded = [];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Orders::class,'order_id');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
