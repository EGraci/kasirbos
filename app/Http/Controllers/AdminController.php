<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
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
        $profile = new Profile();
        return view('admin/restaurant',[
            'resto' => $profile->data_profile()
        ]);
    }
    public function resto_masuk($resto){
        dd($resto);
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
