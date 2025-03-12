<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\ortucontroller;

use App\Http\Controllers\usercontroller;

use App\Http\Controllers\absencontroller;

use App\Http\Controllers\localcontroller;

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\jurusancontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\sesicontroller;
use App\Http\Controllers\walikelascontroller;

Route::get('/', [sesicontroller::class, 'index']);
Route::post('/', [sesicontroller::class, 'login']);

Route::fallback(function () {
    return response()->view('template-admin.eror', [], 404);
});

Route::get('/registrasi', [sesicontroller::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [sesicontroller::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/login', [sesicontroller::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [sesicontroller::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [sesicontroller::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [dashboardcontroller::class, 'dashboard'])->name('home');

    Route::resource('siswa', siswacontroller::class);
    Route::resource('guru', gurucontroller::class);
    Route::resource('local', localcontroller::class);
    Route::resource('jurusan', jurusancontroller::class);
    Route::resource('walikelas', walikelascontroller::class);
    Route::resource('ortu', ortucontroller::class);

    Route::get('/welcome', function () {
    return view('guru.index', 
    ['menu' => 'welcome']);
})->name('welcome');

Route::resource('absen', absencontroller::class);
Route::resource('user', usercontroller::class);

Route::get('/hello', function () {
    return view(
        'siswa.index',
        ['menu' => 'hello']
    );
})->name('hello');
});

