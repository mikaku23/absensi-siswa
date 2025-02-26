<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswacontroller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('index');
});
Route::fallback(function () {
    return response()->view('eror', [], 404);
});

Route::resource('siswa', siswacontroller::class);
