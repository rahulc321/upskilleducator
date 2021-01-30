<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribe';

    protected $primaryKey = 'id';

    protected $fillable = [
        'email'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at', 'deleted_at'
    ];
}
