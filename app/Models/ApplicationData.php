<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationData extends Model
{
    protected $table = 'application_data';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type', 'description'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at', 'deleted_at'
    ];
}
