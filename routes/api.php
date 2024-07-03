<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\PetugasController;
use App\Http\Controllers\API\PinjamController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('buku', [BukuController::class, 'index']);
Route::middleware('auth:sanctum')->get('anggota',[AnggotaController::class, 'index']);
Route::middleware('auth:sanctum')->get('petugas',[PetugasController::class, 'index']);
Route::middleware('auth:sanctum')->get('pinjam',[PinjamController::class, 'index']);

Route::post('buku', [BukuController::class, 'store']);
Route::post('anggota', [AnggotaController::class, 'store']);
Route::post('petugas', [PetugasController::class, 'store']);
Route::post('pinjam', [PinjamController::class, 'store']);

Route::put('buku/{id}', [BukuController::class, 'update']);
Route::put('anggota/{id}', [AnggotaController::class, 'update']);
Route::put('petugas/{id}', [PetugasController::class, 'update']);
Route::put('pinjam/{id}', [PinjamController::class, 'update']);

Route::delete('buku/{id}', [BukuController::class, 'destroy']);
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy']);
Route::delete('petugas/{id}', [PetugasController::class, 'destroy']);
Route::delete('pinjam/{id}', [PinjamController::class, 'destroy']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
