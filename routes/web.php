<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('index');
Route::post('daftar', 'DaftarController@daftar')->name('daftar');

Route::get('peserta', 'PesertaController@index');

Route::get('nilai','NilaiController@index');
Route::post('nilai/format', 'NilaiController@simpan')->name('nilai-format');

Route::get('absen', 'AbsenController@index');
Route::post('absen/simpan', 'AbsenController@simpan')->name('absen-simpan');



