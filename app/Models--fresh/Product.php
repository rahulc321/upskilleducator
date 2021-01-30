<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'category_id', 'type', 'url_name', 'title', 'speaker_name', 'speaker_picture', 'picture', 'price', 'webinar_date_time', 'duration', 'overview', 'speaker', 'ceus'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    protected function getPictureAttribute($value)
    {
        $profile_picture = $this->attributes['picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }

    protected function getSpeakerPictureAttribute($value)
    {
        $profile_picture = $this->attributes['speaker_picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
