<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DetailBK extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detailbk';
    protected $primaryKey = ['kd_bkeluar','kd_menu'];
    protected $fillable = [
        'qty',
    ];
    public function findById($kd_nota){
        return DB::table('detailbk')
        ->join('menu','menu.kd_menu','=','detailbk.kd_menu')
        ->where([
            ['detailbk.kd_bkeluar','=',$kd_nota],
            ])
            ->get(array(
                'detailbk.kd_menu',
                'detailbk.kd_bkeluar',
                'detailbk.qty',
                'menu.nama_menu',
                'menu.harga_menu',

            ));
    }
    public function pesan($kd_nota, $kd_menu, $qty = 0){
        $data = DB::table('detailbk')
        ->where([
            ['kd_bkeluar','=',$kd_nota],
            ['kd_menu','=',$kd_menu],
            ])
            ->count();
            if($data == 0){
                DB::table('detailbk')
                ->insert([
                    'kd_bkeluar' => $kd_nota,
                    'kd_menu' => $kd_menu,
                    'qty' => $qty
                ]);
            }else{
                DB::table('detailbk')
                ->where([
                    ['kd_bkeluar','=',$kd_nota],
                    ['kd_menu','=',$kd_menu],
                    ])
                ->update(['qty' => $qty]);
            }
    }
}
