<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blog';

    protected $primaryKey = 'id';

    protected $fillable = [
        'url_name', 'image', 'title', 'description', 'created_at',
    ];

    protected $hidden = [
        'status', 'updated_at', 'deleted_at'
    ];

    protected function getImageAttribute($value)
    {
        $profile_picture = $this->attributes['image'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }
}
