<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\http\Controllers\AuthController@index')->name('login');
Route::post('user_login', 'App\http\Controllers\AuthController@user_login')->name('user_login');
Route::get('logout', 'App\http\Controllers\AuthController@logout')->name('logout');

//Route Role Login
Route::group(['middleware' => ['auth']], function()
{
    Route::group(['middleware' => ['Role_login:pegawai']], function() {
        Route::get('/pegawai/beranda', 'App\http\Controllers\PegawaiController@index')->name('pegawai');

    });

    Route::group(['middleware' => ['Role_login:dokter']], function() {
        Route::get('/dokter/beranda', 'App\http\Controllers\DokterController@index')->name('dokter');

    });
    
});

//Route CRUD Obat
Route::group(['middleware' => ['auth']], function()
{
    Route::group(['middleware' => ['Role_login:dokter']], function()
    {
        Route::get('/dokter/obat',[ObatController::class,'index']);

    });

    Route::group(['middleware' => ['Role_login:pegawai']], function() {
        Route::get('/pegawai/obat',[ObatController::class,'index']);
        Route::get('/pegawai/obat/add',[ObatController::class,'AddObat']);
        Route::post('/pegawai/obat/add',[ObatController::class,'store']);
        Route::get('/pegawai/obat/edit/{id}',[ObatController::class,'edit']);
        Route::post('/pegawai/obat/edit',[ObatController::class,'update']);
        Route::get('/pegawai/obat/delete/{id}',[ObatController::class,'delete']);

    });

});

// Route CRUD Pasien
Route::group(['middleware' => ['auth']], function()
{
    Route::group(['middleware' => ['Role_login:dokter']], function()
    {
        Route::get('/dokter/pasien',[PasienController::class,'index']);

    });

    Route::group(['middleware' => ['Role_login:pegawai']], function() {
        Route::get('/pegawai/pasien',[PasienController::class,'index']);
        Route::get('/pegawai/pasien/add',[PasienController::class,'AddPasien']);
        Route::post('/pegawai/pasien/add',[PasienController::class,'store']);
        Route::get('/pegawai/pasien/edit/{id}',[PasienController::class,'edit']);
        Route::post('/pegawai/pasien/edit',[PasienController::class,'update']);
        Route::get('/pegawai/pasien/delete/{id}',[PasienController::class,'delete']);

    });

});

