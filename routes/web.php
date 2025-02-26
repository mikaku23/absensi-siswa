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
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::resource('siswa', siswacontroller::class);
