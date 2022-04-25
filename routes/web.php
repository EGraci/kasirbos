<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PemilikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'proses_login']);
// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['do_login:1']], function () {
//         Route::resource('admin', AdminController::class);
//     });
//     Route::group(['middleware' => ['do_login:2']], function () {
//         Route::resource('editor', AdminController::class);
//     });
Route::get('/pemiliktoko', [PemilikController::class, 'index']);
Route::get('/pemiliktoko/home',  function () {
    return view('pemiliktoko/home',[
        "restaurant" => 1
    ]);
});
Route::get('/pemiliktoko/supplier', [PemilikController::class, 'index']);
Route::get('/supplier/barang', [SupplierController::class, 'index']);
Route::post('/supplier/barang', [SupplierController::class, 'add_supplier']);
Route::get('/supplier/barang/{id}', [SupplierController::class, 'view_supplier']);
Route::post('/supplier/barang/{id}', [SupplierController::class, 'set_supplier']);
Route::get('/supplier/barang/delete/{id}', [SupplierController::class, 'delete_supplier']);
Route::get('/supplier/toko',  [SupplierController::class, 'history']);
Route::get('/supplier/pemberitahuan', [SupplierController::class, 'pemberitahu']);

Route::get('/supplierprofil',  [SupplierController::class, 'profile']);


