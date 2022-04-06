<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunRestaurant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'akun_restaurant';
    protected $primaryKey = 'id_akun';
    protected $fillable = [
        'id_akun',
        'id_user',
        'id_restaurant',
    ];
}
