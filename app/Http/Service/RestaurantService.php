<?php
namespace App\Http\Service;
use App\Models\Produk;

class RestaurantService{
    private $produk;
    function __construct() {
        $this->produk = new Produk();
    }
    public function set_produk($kd_bahan, $kd_menu, $qty){
        return $this->produk->set($kd_bahan, $kd_menu, $qty);
    }
}