<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AdminController extends Controller
{
    public function index(){
        return view('admin/menu');
    }
    public function akun(){
        $akun = new Profile();
        // dd($akun->data_akun());
        return view('admin/akun',[
            'akun' => $akun->data_akun(),
            'jml_akun'=> count($akun->data_akun())
        ]);
    }
    public function add_akun(Request $request){
        $id_user = ['table' => 'user', 'length' => 10, 'prefix' => 'U', 'field' => 'id_user'];
        $id_profile = ['table' => 'profile', 'length' => 10, 'prefix' => 'P', 'field' => 'id_profile'];
        $id_user = IdGenerator::generate($id_user);
        $id_profile = IdGenerator::generate($id_profile);
        // dd($id_user);
        $profile = [
            "id_profile" => $id_profile,
            "nama_pemilik" => $request['pemilik'],
            "nama_usaha" => $request['usaha'],
            "siup" => null,
            "telepon" => $request['telepon'],
        ];
        Profile::create($profile);
        User::create([
            "id_user" => $id_user,
            "id_profile" => $id_profile,
            "username" => $request['username'],
            "password" => md5($request['password']),
            "level" => $request['level'],
        ]);
        
        return redirect('/admin/akun');
    }
}
