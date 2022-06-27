<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Berat;
use App\Models\Produk;
use App\Models\BKeluar;
use App\Models\DetailBK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Profile;

class PemilikController extends Controller
{
    private $produk;
    private $bkeluar;
    private $detailbk;
    function __construct() {
        $this->produk = new Produk();
        $this->bkeluar = new BKeluar();
        $this->detailbk = new DetailBK();
    }
    public function suppliertoko(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/Supplier',[
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first()
        ]);
    }
    public function menu(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/menu_resto',[
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first(),
            "menu" => Menu::where("id_profile","=",session()->get('id_profile'))->get()
        ]);
    }
    public function set_menu($menu){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/up_menu', [
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first(),
            'kd' => $menu,
            'old' => Menu::find($menu),
            'menu' => Menu::where("id_profile","=",session()->get('id_profile'))->get()
        ]);
    }
    public function produk($menu){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/set_produk', [
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first(),
            'bahan' => Bahan::where("id_profile","=",session()->get('id_profile'))->get(),
            'menu' => Menu::find($menu)
        ]);
    }
    public function do_produk(Request $request){        
        $request->validate([
            'menu' => 'required',
            'bahan' => 'required',
            'qty' => 'required'
        ]);
       $this->produk->set($request->bahan,$request->menu,$request->qty);
        return redirect('/restaurant/produk/'.$request->menu);
    }
    
    public function bahan(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/menu_bahan',[
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first(),
            "berat" => Berat::get(),
            "bahan" => Bahan::where("id_profile","=",session()->get('id_profile'))->get()
        ]);
    }
    public function set_bahan($bahan){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/up_bahan', [
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first(),
            'kd' => $bahan,
            'old' => Bahan::find($bahan),
            'bahan' => Bahan::where("id_profile","=",session()->get('id_profile'))->get(),
            'berat' => Berat::get()
        ]);
    }
    public function supplier(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/menu_supplier',[
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first()
        ]);
    }
    public function dashboard(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }
        
        return view('pemiliktoko/menu_dashboard',[
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first()
        ]);
    }
    public function kasir(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        if(session()->get('nota') == null){
            $nota = ['table' => 'bkeluar', 'length' => 10, 'prefix' => '0', 'field' => 'kd_bkeluar'];
            $nota = IdGenerator::generate($nota);
            session(['nota' => $nota]);
            $bk = new BKeluar();
            $bk->kd_bkeluar = $nota;
            $bk->total = 0;
            $bk->bayar = 0;
            $bk->tanggal_bk = date('Y-m-d');
            $bk->save();
            $kembali = "";
        }else{
            $nota = session()->get('nota');
            if($this->bkeluar->kembali($nota) == 0){
                $kembali = "";
            }else{
                $kembali = $this->bkeluar->kembali($nota);
            }
        }
        $d = BKeluar::where('kd_bkeluar',$nota)->first();
        if(BKeluar::where('kd_bkeluar',$nota)->count() == 0){
            $bayar = "";
        }else{
            $bayar = $d->bayar;
        }
       
        return view('pemiliktoko/menu_kasir',[
            "profile" => Profile::where('id_profile', session()->get('id_profile'))->first(),
            "id" => $nota,
            "menu" => Menu::where("id_profile","=",session()->get('id_profile'))->get(),
            "nota" => $this->detailbk->findById($nota),
            "bayar" => $bayar,
            "kembali" => $kembali

        ]);
    }
    public function do_kasir(Request $request){
        if($request->aksi == "tambah"){
            $this->detailbk->pesan(session()->get('nota'),$request->kd_menu);
        }else if($request->aksi == "pesan"){
            $this->detailbk->pesan(session()->get('nota'),$request->kd_menu, $request->qty);
        }else if($request->aksi == "bayar"){
            $nota = BKeluar::find(session()->get('nota'));
            $nota->bayar = $request->bayar;
            $nota->total = $request->total;
            $nota->save();
        }
        return redirect('/restaurant/kasir');
    }
    public function delete_kasir($menu){
        $nota = DetailBK::where([
            ['kd_bkeluar','=',session()->get('nota')],
            ['kd_menu','=',$menu],
        ])->delete();
        return redirect('/restaurant/kasir');
    }
    public function reset_kasir(){
        $pesan = DetailBK::where([['kd_bkeluar','=',session()->get('nota')]])->get();
        foreach($pesan as $d){

        }
        return redirect('/restaurant/kasir');
    }
    public function cari_menu($nama){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }
        
        return view('pemiliktoko/json',[
            "data" => Menu::where([
                ["id_profile","=",session()->get('id_profile')],
                ["nama_menu","LIKE","%".$nama."%"],
            ])->get()
        ]);
    }
    public function add_menu(Request $request){
        $request->validate([
            'menu' => 'required',
            'harga' => 'required',
            'gambar'
        ]);

        $menu = new Menu();
        $menu->id_profile = session()->get('id_profile');
        $menu->nama_menu = $request->menu;
        $menu->harga_menu = $request->harga;
        $menu->save();
        return redirect('/restaurant/menu');
    }
    public function do_menu(Request $request, $menu){
        $request->validate([
            'menu' => 'required',
            'harga' => 'required',
            'gambar'
        ]);
        $menu = Menu::find($menu);
        $menu->nama_menu = $request->menu;
        $menu->harga_menu = $request->harga;

        if($request->submit == "simpan"){
            $menu->save();
        }elseif($request->submit == "hapus"){
            $menu->delete();
        }
        return redirect('/restaurant/menu');
    }
    public function add_bahan(Request $request){
        $request->validate([
            'barang' => 'required',
            'qty' => 'required',
            'berat'
        ]);

        $berat = Berat::find($request->berat);
        $qty = $request->qty * $berat->gram;

        $bahan = new Bahan();
        $bahan->id_profile = session()->get('id_profile');
        $bahan->nama_barang = $request->barang;
        $bahan->qty = $qty;
        $bahan->status = "Ada";
        $bahan->save();
        return redirect('/restaurant/bahan');
    }
    public function do_bahan(Request $request, $bahan){
        $request->validate([
            'barang' => 'required',
            'qty' => 'required',
            'berat'
        ]);

        $berat = Berat::find($request->berat);
        $qty = $request->qty * $berat->gram;

        $bahan = Bahan::find($bahan);
        $bahan->nama_barang = $request->barang;
        $bahan->qty = $qty;
        if($request->submit == "simpan"){
            $bahan->save();
        }elseif($request->submit == "hapus"){
            $bahan->delete();
        }
        return redirect('/restaurant/bahan');
    }
}
