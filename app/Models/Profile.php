<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $fillable = [
        'nama_pemilik',
        'nama_usaha',
        'siu',
        'alamat_usaha',
        'telepon',
    ];
}
