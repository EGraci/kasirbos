<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\AdminController;

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

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/akun/{username}',[AdminController::class, 'set_akun']);
Route::get('/admin/akun', [AdminController::class, 'akun']);
Route::post('/admin/akun',[AdminController::class, 'add_akun']);
Route::post('/admin/akun/do',[AdminController::class, 'do_akun']);
Route::get('/admin/restaurant',[AdminController::class, 'resto']);
Route::get('/admin/restaurant/{resto}',[AdminController::class, 'resto_masuk']);
Route::get('/admin/restaurant/{resto}/menu',[AdminController::class, 'menu']);
Route::post('/admin/restaurant/{resto}/menu',[AdminController::class, 'add_menu']);
Route::get('/admin/restaurant/{resto}/menu/{menu}',[AdminController::class, 'set_menu']);
Route::post('/admin/restaurant/{resto}/menu/{menu}',[AdminController::class, 'do_menu']);
Route::get('/admin/restaurant/{resto}/bahan',[AdminController::class, 'bahan']);
Route::post('/admin/restaurant/{resto}/bahan',[AdminController::class, 'add_bahan']);
Route::get('/admin/restaurant/{resto}/bahan/{bahan}',[AdminController::class, 'set_bahan']);
Route::post('/admin/restaurant/{resto}/bahan/{bahan}',[AdminController::class, 'do_bahan']);
Route::get('/admin/restaurant/{resto}/produk',[AdminController::class, 'produk']);
Route::post('/admin/restaurant/{resto}/produk/',[AdminController::class, 'add_produk']);


Route::get('/pemiliktoko', [PemilikController::class, 'index']);
Route::get('/pemiliktoko/supplier', [PemilikController::class, 'suppliertoko']);

Route::get('/supplier/barang', [SupplierController::class, 'index']);
Route::post('/supplier/barang', [SupplierController::class, 'add_supplier']);
Route::get('/supplier/barang/{id}', [SupplierController::class, 'view_supplier']);
Route::post('/supplier/barang/{id}', [SupplierController::class, 'set_supplier']);
Route::get('/supplier/barang/delete/{id}', [SupplierController::class, 'delete_supplier']);
Route::get('/supplier/toko',  [SupplierController::class, 'history']);
Route::get('/supplier/pemberitahuan', [SupplierController::class, 'pemberitahu']);
Route::get('/supplierprofil',  [SupplierController::class, 'profile']);


