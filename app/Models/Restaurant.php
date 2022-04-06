<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'restaurant';
    protected $primaryKey = 'id_restaurant';
    protected $fillable = [
        'id_restaurant',
        'nama_restaurant',
        'almt_restaurant',
        'no_telp',

    ];
}
