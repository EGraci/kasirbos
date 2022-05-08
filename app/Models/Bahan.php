<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bahan';
    protected $primaryKey = 'kd_bahan';
    protected $fillable = [
        'id_profile',
        'kd_berat',
        'nama_barang',
        'qty',
        'status'
    ];
}
