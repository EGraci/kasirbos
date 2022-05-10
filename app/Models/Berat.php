<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'berat';
    protected $primaryKey = 'kd_berat';
    protected $fillable = [
        'berat',
        'gram',
    ];
}
