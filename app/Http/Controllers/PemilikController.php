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
}
