<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;

class Orders extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'user_id', 'order_number', 'first_name', 'middle_name', 'last_name', 'email', 'mobile_no',
        'company_name', 'company_title', 'mobile_no_2', 'billing_address_1', 'billing_address_2', 'city', 'state',
        'country', 'pincode', 'puchase_for_self', 'attendee_name', 'attendee_email', 'attendee_title', 'attendee_no',
        'webinar_link'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id')->with('product');
    }

    /**
     * @return HasOne
     */
    public function payment_details(): HasOne
    {
        return $this->hasOne(OrderPaymentDetails::class, 'order_id', 'id');
    }
    
    public function coupon_detail(): HasOne
    {
        return $this->hasOne(CouponDetail::class, 'order_id', 'id');
    }
}
