<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_address';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'address_type', 'street', 'city', 'state', 'landmark', 'pincode'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];
}
