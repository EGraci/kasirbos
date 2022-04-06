<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bahan';
    protected $primaryKey = 'id_bahan';
    protected $fillable = [
        'id_bahan',
        'id_restaurant',
        'nama_barang',
        'qty',
    ];
}
