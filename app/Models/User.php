<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\qusetion;
use App\Models\answer;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function qusetions(){
      return  $this->hasMany(qusetion::class);
    }
    public function answer(){
        return $this->hasMany(answer::class);
    }
    public function like(){
        return $this->hasMany(like::class);
    }
    public function manyaccount(){
        return $this->hasMany(account_socialite::class);
    }
    public function profile(){
        return $this->hasOne(profile::class);
    }
}
