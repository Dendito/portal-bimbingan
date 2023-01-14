<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
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
    return view('auth.login');
});

Route::get('/index',[DashboardController::class,'index'])->name('dashboard.index');


Auth::routes();
Route::get('/profil', function () {
    return view('dashboard.profil');
});



Route::resource('bimbingan', BimbinganController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('laporan', LaporanController::class);