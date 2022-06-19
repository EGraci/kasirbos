<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index()
    {
        if (session()->get('level') == '1') {
            return redirect('/admin');
        }else if (session()->get('level') == '2') {
            return redirect('/restaurant');
        }else if(session()->get('level') == '3'){
            return redirect('/supplier');
        }

        return view('login');
    }
    public function proses_login(Request $request)
    {
        // dd("do login");
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);
            $cek = User::where([
                ['email','=',$request->username],
                ['password','=',md5($request->password)],
            ])
            ->count();
            $akun = User::where([
                ['email','=',$request->username],
                ['password','=',md5($request->password)],
            ])
            ->first();
            session(['id_profile'=> $akun->id_profile, 'level'=> $akun->level]);
        if ($cek > 0) {
            if ($akun->level == '1') {
                return redirect('/admin');
            }else if ($akun->level == '2') {
                return redirect('/restaurant');
            }else if($akun->level == '3'){
                return redirect('/supplier');
            }
        }
        return redirect('/')->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function keluar()
    {
        session()->remove('level');
        session()->remove('id_profile');
       return redirect('/');
    }
}
