<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartProduct extends Model
{
    protected $table = 'cart_product';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'product_id', 'quantity'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->with('category');
    }
}
