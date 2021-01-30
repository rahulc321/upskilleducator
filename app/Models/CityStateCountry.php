<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityStateCountry extends Model
{
    protected $table = 'city_state_country';

    protected $fillable = [
        'city', 'state', 'country'
    ];
}
