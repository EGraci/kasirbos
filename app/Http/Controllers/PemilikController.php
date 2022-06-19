<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/home',[
            "restaurant" => ""
        ]);
    }
    public function suppliertoko(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/Supplier');
    }
    public function resto(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/menu_resto');
    }
    public function bahan(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/menu_bahan');
    }
    public function supplier(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }

        return view('pemiliktoko/menu_supplier');
    }
    public function dashboard(){
        if(session()->get('level') == 1){
            return redirect('/admin');
        }else if (session()->get('level') == '3') {
            return redirect('/supplier');
        }else if(session()->get('level') == null){
            return redirect('/');
        }
        
        return view('pemiliktoko/menu_dashboard');
    }
}
