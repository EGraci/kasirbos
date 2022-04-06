<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmasuk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bmasuk';
    protected $primaryKey = 'id_bm';
    protected $fillable = [
        'id_bm',
        'id_bahan',
        'id_supplier',
        'total',
        'qty',
        'denda',
        'tgl_masuk',
        'tgl_pesan  ',

    ];
}
