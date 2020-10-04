<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurSpeaker extends Model
{
    protected $table = 'our_speaker';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'image', 'description'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
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
