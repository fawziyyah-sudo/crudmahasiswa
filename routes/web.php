<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cv', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/cv', function () {
    return view('cv');
});

Route::get('/cvziy', function () {
    return view('cvziy');
});

Route::get('/latihan', [LatihanController::class, 'index']);
Route::get('/latihan/{id}', [LatihanController::class, 'detail']);

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa/search/cari', [MahasiswaController::class, 'search'])->name('mahasiswa.search');