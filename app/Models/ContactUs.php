<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $primaryKey = 'id';

    protected $fillable = [
        'steet', 'city', 'state', 'landmark', 'pincode', 'country', 'latitide', 'longitude'
    ];

    protected $hidden = [
        'password', 'status', 'remember_token', 'created_at', 'updated_at'
    ];
}
