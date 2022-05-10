<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Berat;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AdminController extends Controller
{
    private $id_profile;

    public function set_idProfile($id) : void{
        $this->id_profile = $id;
    }

    public function index(){
        return view('admin/menu');
    }
    public function akun(){
        $akun = new Profile();
        return view('admin/akun',[
            'akun' => $akun->data_akun()
        ]);
    }
    public function set_akun($username){
        $akun = new Profile();
        return view('admin/up_akun',[
            'akun' => $akun->data_akun(),
            'old' => $akun->data_akun($username)
        ]);
    }
    public function resto(){
        $akun = new Profile();
        return view('admin/restaurant',[
            'resto' => $akun->data_resto()
        ]);
    }
    public function resto_masuk($resto){
        return view('admin/masuk_restaurant',[
            'resto' => $resto,
            'menu' => Menu::where("id_profile","=",$resto)->get(),
            'bahan' => Bahan::where("id_profile","=",$resto)->get()
        ]);
    }
    public function menu($resto){
        return view('admin/resto_set_menu', [
            'resto' => $resto,
            'menu' => Menu::where("id_profile","=",$resto)->get(),
            'bahan' => Bahan::where("id_profile","=",$resto)->get()
        ]);
    }
    public function bahan($resto){
        return view('admin/resto_set_bahan', [
            'resto' => $resto,
            'menu' => Menu::where("id_profile","=",$resto)->get(),
            'bahan' => Bahan::where("id_profile","=",$resto)->get(),
            'berat' => Berat::get()
        ]);
    }
    public function produk($resto){
        dd($resto);
        return view('admin/resto_set_menu', [
            'resto' => $resto,
            'menu' => Menu::where("id_profile","=",$resto)->get(),
            'bahan' => Bahan::where("id_profile","=",$resto)->get()
        ]);
    }
    public function add_menu(Request $request, $resto){
        $request->validate([
            'menu' => 'required',
            'harga' => 'required',
            'gambar'
        ]);

        $menu = new Menu();
        $menu->id_profile = $resto;
        $menu->nama_menu = $request->menu;
        $menu->harga_menu = $request->harga;
        $menu->save();
        return redirect('/admin/restaurant/'.$resto);
    }
    public function add_bahan(Request $request, $resto){
        $request->validate([
            'barang' => 'required',
            'qty' => 'required',
            'berat'
        ]);

        $berat = Berat::find($request->berat);
        $qty = $request->qty * $berat->gram;

        $bahan = new Bahan();
        $bahan->id_profile = $resto;
        $bahan->nama_barang = $request->barang;
        $bahan->qty = $qty;
        $bahan->status = "Ada";
        $bahan->save();

        return redirect('/admin/restaurant/'.$resto);
    }
    public function do_akun(Request $request){
        $request->validate([
            'pemilik' => 'Required',
            'usaha' => 'Required',
            'alamat' => 'Required',
            'telepon' => 'Required',
            'username' => 'Required',
            'password',
            'level',
            'siup',
            'user',
            'profile',
            'submit'
        ]);

        $user = User::find($request->user);
        $user->username = $request->username;
        if(isset($request->password)){
            $user->password = md5($request->password);

        }
        $user->level = $request->level;

        $profile = Profile::find($request->profile);
        $profile->nama_pemilik = $request->pemilik;
        $profile->nama_usaha = $request->usaha;
        $profile->telepon = $request->telepon;
        $profile->alamat_usaha = $request->alamat;

        if($request->submit == "simpan"){
            $user->save();
            $profile->save();
        }elseif($request->submit == "hapus"){
            $user->delete();
            $profile->delete();
        }

        return redirect('/admin/akun');
    }
    public function add_akun(Request $request){
       $request->validate([
            'pemilik' => 'Required',
            'usaha' => 'Required',
            'alamat' => 'Required',
            'telepon' => 'Required',
            'username' => ['Required','unique:User'],
            'password' => 'Required',
            'level',
            'siup'
        ]);

        $id_user = ['table' => 'user', 'length' => 10, 'prefix' => 'U', 'field' => 'id_user'];
        $id_profile = ['table' => 'profile', 'length' => 10, 'prefix' => 'P', 'field' => 'id_profile'];
        $id_user = IdGenerator::generate($id_user);
        $id_profile = IdGenerator::generate($id_profile);

        $user = new User;
        $user->id_user = $id_user;
        $user->id_profile = $id_profile;
        $user->username = $request->username;
        $user->password = md5($request->password);
        $user->level = $request->level;
        $user->save();

        $profile = new Profile;
        $profile->id_profile = $id_profile;
        $profile->nama_pemilik = $request->pemilik;
        $profile->nama_usaha = $request->usaha;
        $profile->telepon = $request->telepon;
        $profile->alamat_usaha = $request->alamat;
        $profile->save();
        
        return redirect('/admin/akun');
    }
}
