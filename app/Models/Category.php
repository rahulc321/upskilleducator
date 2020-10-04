<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'id';

    protected $fillable = [
        'url_name', 'name'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];
}
