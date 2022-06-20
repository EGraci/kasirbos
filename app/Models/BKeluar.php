<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKeluar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bkeluar';
    protected $primaryKey = 'kd_bkeluar';
    protected $fillable = [
        'total',
        'bayar',
        'tanggal',
    ];
}