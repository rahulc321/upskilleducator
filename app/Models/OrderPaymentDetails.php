<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPaymentDetails extends Model
{
    protected $table = 'order_payment_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'user_id', 'fullname', 'mobile_no', 'floor', 'street', 'landmark', 'pincode', 'city', 'state'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];
}
