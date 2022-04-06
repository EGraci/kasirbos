<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
        'id_user',
        'produk',
        'total',
        'qty',
        'denda',
        'perkiraan',
    ];
}
