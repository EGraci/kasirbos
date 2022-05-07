<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_profile',
        'username',
        'password',
        'level',
    ];
    protected $hidden = [
        'password',
        // 'remember_token',
    ];
}
