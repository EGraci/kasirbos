<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'id_profile',
        'username',
        'password',
        'level',
    ];
    protected $hidden = [
        'password',
    ];

    protected function level(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["1", "2", "3"][$value],
        );
    }
}