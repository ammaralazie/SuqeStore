<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password',
    ];//end of fillable

    protected $hidden = [
        'password', 'remember_token',
    ];//end of hidden

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];//end of casts


    //this functions for jwt
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
