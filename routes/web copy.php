<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PetugasController;
// use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('home', function () {
    return view('view_home');
});


Route::resource('anggota', AnggotaController::class);
Route::resource('buku', BukuController::class);
// Route::resource('detailPeminjaman', DetailPeminjamanController::class);
Route::resource('petugas', PetugasController::class);
Route::resource('pinjam', PinjamController::class);
Route::get('dashboard',[DashboardController::class,'index']);

