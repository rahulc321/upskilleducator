<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItems extends Model
{
    protected $table = 'order_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->with('category');
    }
}
