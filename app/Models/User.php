<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends  Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    protected $fillable = ['email', 'password','firstname','lastname','remember_token','id'];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * A user can have many messages
     *
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }



}
