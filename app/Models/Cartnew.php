<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;

class Cartnew extends Model
{
    protected $table = 'cart_new';

    protected $primaryKey = 'id';

    

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];

    
}
