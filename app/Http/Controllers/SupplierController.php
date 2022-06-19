<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Berat;

class SupplierController extends Controller
{   
    public function index(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }
        return view('supplier/dashboard',[
            'transaksi' => ''
        ]);
    }
    public function barang(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('supplier/barang', [
            "data_supplier" => Supplier::where('id_profile',session()->get('id_profile') )->get(),
            "jml_supplier" => Supplier::where('id_profile',session()->get('id_profile') )->count(),
            "berat" => Berat::get()
        ]);
    }
    public function pemberitahu(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('supplier/pemberitahuan');
    }
    public function profile(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('supplier/profil');
    }
    public function history(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('supplier/toko');
    }
    public function add_supplier(Request $request){
        $berat = Berat::find($request->berat);
        $qty = $request->qty * $berat->gram;

        Supplier::create([
            "id_profile" => session()->get('id_profile'),
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
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

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
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == null){
            return redirect('/');
        }
          
        return view('supplier/editbarang', [
            "data_supplier" => Supplier::where('id_profile',session()->get('id_profile'))->get(),
            "jml_supplier" => Supplier::where('id_profile',session()->get('id_profile'))->count(),
            "view" => Supplier::where('id_supplier',$id)->first(),
            "berat" => Berat::get()
        ]);
    }
}
