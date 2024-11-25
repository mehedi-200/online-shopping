<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{

    protected $table = 'orders';
    protected $guarded = [];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }
}
