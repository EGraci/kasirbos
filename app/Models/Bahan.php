<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Bahan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bahan';
    protected $primaryKey = 'kd_bahan';
    protected $fillable = [
        'id_profile',
        'nama_barang',
        'qty',
        'status'
    ];
}
