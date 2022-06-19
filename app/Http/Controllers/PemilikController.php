<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function index(){
        $id_restaurant = 1;
        return view('pemiliktoko/home',[
            "restaurant" => $id_restaurant
        ]);
    }
    public function suppliertoko(){
        return view('pemiliktoko/Supplier');
    }
    public function resto(){
        return view('pemiliktoko/menu_resto');
    }
    public function bahan(){
        return view('pemiliktoko/menu_bahan');
    }
    public function supplier(){
        return view('pemiliktoko/menu_supplier');
    }
    public function dashboard(){
        return view('pemiliktoko/menu_dashboard');
    }
}
