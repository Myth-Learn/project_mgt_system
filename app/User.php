<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_role', 'name', 'email', 'phone_number', 'country_code', 'city', 'password', 'verify_token', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialProviders() {
        return $this->hasMany(SocialProvider::class);
    }

    function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
