<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk';
    protected $primaryKey = ['kd_bahan','kd_menu'];
    protected $fillable = [
        'qty',
    ];
    public function vw_menu_bahan($profile, $menu){
        $data = DB::table('produk')
            ->join('menu', 'menu.kd_menu', '=', 'produk.kd_menu')
            ->join('bahan', 'bahan.kd_bahan', '=', 'produk.kd_bahan')
            ->where([
                ['produk.kd_menu','=',$menu],
                ['menu.id_profile','=',$profile],
                ['bahan.id_profile','=',$profile],
                ])
            ->get(array(
                'menu.kd_menu',
                'menu.nama_menu',
                'bahan.kd_bahan',
                'bahan.nama_barang',
                'produk.qty',
            ));
    }
}
