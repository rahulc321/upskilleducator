<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    protected $guard = 'admin';

    protected $fillable = [
        'uuid', 'name', 'username', 'email', 'profile_picture', 'forgot_password_code'
    ];

    protected $hidden = [
        'password', 'remember_token', 'status', 'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public function getProfilePictureAttribute($value)
    {
        $profile_picture = $this->attributes['profile_picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }
}
