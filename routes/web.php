<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\siswacontroller;

Route::get('/', function () {
    return view('utama.login');
});
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
Route::resource('kelas', siswacontroller::class);
