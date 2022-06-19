<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Berat;

class SupplierController extends Controller
{
    private $id_profile;
    private $level;
    function __construct() {
        $this->id_profile = "P000000002";
        $this->level = 3;
    }
    public function index(){
        return view('supplier/dashboard',[
            'transaksi' => ''
        ]);
    }
    public function barang(){
        return view('supplier/barang', [
            "data_supplier" => Supplier::where('id_profile',$this->id_profile)->get(),
            "jml_supplier" => Supplier::where('id_profile',$this->id_profile)->count(),
            "berat" => Berat::get()
        ]);
    }
    public function pemberitahu(){
        return view('supplier/pemberitahuan');
    }
    public function profile(){
        return view('supplier/profil');
    }
    public function history(){
        return view('supplier/toko');
    }
    public function add_supplier(Request $request){
        $berat = Berat::find($request->berat);
        $qty = $request->qty * $berat->gram;

        Supplier::create([
            "id_profile" => $this->id_profile,
            "produk" => $request['produk'],
            "total" => $request['max'],
            "qty" => $qty,
            "denda" => $request['denda'],
            "perkiraan" => $request['estimasi'],
            "gambar" => null,
        ]);
        return redirect('/supplier/barang');
    }
    public function set_supplier(Request $request){
        Supplier::where('id_supplier',$request['id'])->update([
            "produk" => $request['produk'],
            "total" => $request['max'],
            "qty" => $request['qty'],
            "denda" => $request['denda'],
            "perkiraan" => $request['estimasi'],
            "gambar" => null,
        ]);
        return redirect('/supplier/barang');
    }
    public function view_supplier($id){  
        return view('supplier/editbarang', [
            "data_supplier" => Supplier::where('id_profile',$this->id_profile)->get(),
            "jml_supplier" => Supplier::where('id_profile',$this->id_profile)->count(),
            "view" => Supplier::where('id_supplier',$id)->first(),
            "berat" => Berat::get()
        ]);
    }
}
