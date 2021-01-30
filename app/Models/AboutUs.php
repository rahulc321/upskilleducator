<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes;

    protected $table = 'about_us';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'image', 'description'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at', 'deleted_at'
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
