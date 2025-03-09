<?php

use App\Models\jurusan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\localcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\jurusancontroller;

Route::get('/', function () {
    return view('utama.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('index', [
        "menu" => "home",
    ]);
})->name('home');

Route::get('/latihan', [siswacontroller::class, 'index'])->name('latihan');

Route::fallback(function () {
    return response()->view('template.eror', [], 404);
});

Route::get('/register', function () {
    return view('utama.register');
});

Route::resource('siswa', siswacontroller::class);
Route::resource('guru', gurucontroller::class);
Route::resource('local', localcontroller::class);
Route::resource('jurusan', jurusancontroller::class);