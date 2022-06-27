<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function kembali($kd_nota){
        $data = DB::table('bkeluar')
        ->where([
            ['kd_bkeluar','=',$kd_nota],
            ])
            ->first();
        return $data->bayar - $data->total;
    }
    
}
