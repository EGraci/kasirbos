<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'menu';
    protected $primaryKey = 'kd_menu';
    protected $fillable = [
        'id_profile',
        'nama_menu',
        'harga_menu',
        'gambar',
    ];
}
