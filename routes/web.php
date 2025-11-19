<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/mahasiswa');
});

// Mahasiswa 
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');
Route::get('/input_mhs', [MahasiswaController::class, 'input']);
Route::post('/simpan_mhs', [MahasiswaController::class, 'simpan']);
Route::get('/edit_mhs/{NIM}', [MahasiswaController::class, 'edit']);
Route::post('/update_mhs', [MahasiswaController::class, 'update']);
Route::get('/hapus_mhs/{NIM}', [MahasiswaController::class, 'hapus']);

// Prodi 
Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/input_prodi', [ProdiController::class, 'input']);
Route::post('/simpan_prodi', [ProdiController::class, 'simpan']);
Route::get('/edit_prodi/{id}', [ProdiController::class, 'edit']);
Route::post('/update_prodi/{id}', [ProdiController::class, 'update']);
Route::get('/hapus_prodi/{id}', [ProdiController::class, 'hapus']);


// Dosen 
Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/input_dsn', [DosenController::class, 'input']);
Route::post('/simpan_dsn', [DosenController::class, 'simpan']);
Route::get('/edit_dsn/{id}', [DosenController::class, 'edit']);
Route::post('/update_dsn/{id}', [DosenController::class, 'update']);
Route::get('/hapus_dsn/{id}', [DosenController::class, 'hapus']);


// MataKuliah 
Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/input_matakuliah', [MataKuliahController::class, 'input']);
Route::post('/simpan_matakuliah', [MataKuliahController::class, 'simpan']);
Route::get('/edit_matakuliah/{id}', [MataKuliahController::class, 'edit']);
Route::post('/update_matakuliah/{id}', [MataKuliahController::class, 'update']);
Route::get('/hapus_matakuliah/{id}', [MataKuliahController::class, 'hapus']);


// Nilai 
Route::get('/nilai', [NilaiController::class, 'index']);
Route::get('/input_nilai', [NilaiController::class, 'input']);
Route::post('/simpan_nilai', [NilaiController::class, 'simpan']);
Route::get('/edit_nilai/{id}', [NilaiController::class, 'edit']);
Route::post('/update_nilai/{id}', [NilaiController::class, 'update']);
Route::get('/hapus_nilai/{id}', [NilaiController::class, 'hapus']);

Route::get('/viewLogin', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);