<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBK extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detailbk';
    protected $primaryKey = ['kd_bkeluar','kd_menu'];
    protected $fillable = [
        'qty',
    ];
}
