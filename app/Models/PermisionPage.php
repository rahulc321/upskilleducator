<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;

class PermisionPage extends Model
{
    protected $table = 'page_permision';

    protected $primaryKey = 'id';

    

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];

    
}
