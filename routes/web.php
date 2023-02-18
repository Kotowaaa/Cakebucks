<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Home;

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


// Route Login
Route::get('/', [C_Login::class,'halamanlogin'])->name('login');
Route::post('/masuklogin', [C_Login::class,'proseslogin'])->name('masuklogin');
Route::post('/logout', [C_Login::class,'logout'])->name('logout')->middleware('auth');

// Route Dashboard
Route::get('/dashboard', [C_Home::class,'dashboard'])->name('dashboard')->middleware('auth');

// Route Form
route::group(['middleware' => ['auth']], function(){
    Route::get('/cake', [C_Home::class,'cake'])->name('cake');
    Route::post('/prosescake', [C_Home::class,'prosescake'])->name('prosescake');
    Route::get('/data-penjualan', [C_Home::class,'penjualan'])->name('data-penjualan');
    Route::post('/proses-data-penjualan', [C_Home::class,'prosesPenjualan'])->name('proses-data-penjualan');
});

// Route CRUD
route::group(['middleware' => ['auth']], function(){
    // Route Show Table Kue
    Route::get('/tablecake', [C_Home::class,'tablekue'])->name('tablecake');
    // Route Edit Kue
    Route::get('/cakes/{id}/edit', [C_Home::class,'edit'])->name('editkue');
    Route::post('/prosesedit/{id}', [C_Home::class,'prosesedit'])->name('update-cake');
    // Route Hapus Kue
    Route::get('/cakes/{id}', [C_Home::class,'destroy'])->name('delete-cake');
    // Route Show Table Data Penjualan
    Route::get('/table-penjualan', [C_Home::class,'tablePenjualan'])->name('table-penjualan');
    // Route Edit Data Penjualan
    Route::get('/penjualans/{id}/edit', [C_Home::class,'editPenjualan'])->name('editpenjualan');
    Route::post('/update-data-penjualan', [C_Home::class,'updateDataPenjualan'])->name('update-data-penjualan');
    // Route Hapus Data Penjualan
    Route::post('/penjualans/{id}/delete', [C_Home::class,'destroyDataPenjualan'])->name('delete-data-penjualan');
});

// Route App
Route::group(['middleware' => ['auth']], function(){
    Route::get('/cetak-data-penjualan', [C_home::class,'cetakDataPenjualan'])->name('cetak-data-penjualan');
    Route::post('/cetak-data-pertanggal', [C_home::class,'cetakPertanggal'])->name('cetak-data-pertanggal');
    Route::get('/about', [C_Home::class,'about'])->name('about');
});
