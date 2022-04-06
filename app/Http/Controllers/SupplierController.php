<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function __construct(){
        Carbon::setLocale('id_ID');
    }
    public function index(){
        $id_user = 3;   
        return view('supplier/barang', [
            "data_supplier" => Supplier::where('id_user',$id_user)->get(),
            "jml_supplier" => Supplier::where('id_user',$id_user)->count()
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
        $id_user = 3;   
        Supplier::create([
            "id_user" => $id_user,
            "produk" => $request['produk'],
            "total" => $request['max'],
            "qty" => $request['qty'],
            "denda" => $request['denda'],
            "perkiraan" => $request['estimasi']
        ]);
        return redirect('/supplier/barang');
    }
    public function set_supplier(Request $request){
        $id_user = 3;   
        Supplier::where('id_supplier',$request['id'])->update([
            "produk" => $request['produk'],
            "total" => $request['max'],
            "qty" => $request['qty'],
            "denda" => $request['denda'],
            "perkiraan" => $request['estimasi']
        ]);
        return redirect('/supplier/barang');
    }
    public function view_supplier($id){
        $id_user = 3;   
        return view('supplier/editbarang', [
            "data_supplier" => Supplier::where('id_user',$id_user)->get(),
            "jml_supplier" => Supplier::where('id_user',$id_user)->count(),
            "view" => Supplier::where('id_supplier',$id)->first()
        ]);
    }
}
