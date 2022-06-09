<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
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
        
            $input = $request->all();

            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                if (auth()->user()->type == '1') {
                    return redirect('/admin');
                }else if (auth()->user()->type == '2') {
                    return redirect('/restaurant');
                }else{
                    return redirect('/supplier');
                }
            }

        return redirect('login')->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
