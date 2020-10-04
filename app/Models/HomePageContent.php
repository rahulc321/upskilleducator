<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    protected $table = 'homepage_content';

    protected $primaryKey = 'id';

    protected $fillable = [
        'homepage_banner', 'homepage_text1_picture', 'homepage_text1', 'homepage_text2_picture', 'homepage_text2', 'homepage_text3_picture', 'homepage_text3',
        'homepage_secondary_text1', 'homepage_secondary_text2', 'homepage_secondary_text3'
    ];

    protected $hidden = [
        'status', 'created_at', 'updated_at'
    ];

    protected function getHomepageBannerAttribute($value)
    {
        $profile_picture = $this->attributes['homepage_banner'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }

    protected function getHomepageText1PictureAttribute($value)
    {
        $profile_picture = $this->attributes['homepage_text1_picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }

    protected function getHomepageText2PictureAttribute($value)
    {
        $profile_picture = $this->attributes['homepage_text2_picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }

    protected function getHomepageText3PictureAttribute($value)
    {
        $profile_picture = $this->attributes['homepage_text3_picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }
}
