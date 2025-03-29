<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\ortucontroller;

use App\Http\Controllers\sesicontroller;

use App\Http\Controllers\usercontroller;

use App\Http\Controllers\absencontroller;

use App\Http\Controllers\localcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\rekapcontroller;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\jurusancontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\pengajuancontroller;
use App\Http\Controllers\walikelascontroller;



Route::fallback(function () {
    return response()->view('template-admin.eror', [], 404);
});

Route::get('/registrasi', [sesicontroller::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [sesicontroller::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/', [sesicontroller::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [sesicontroller::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [sesicontroller::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboardAdmin', [dashboardcontroller::class, 'dashboardAdmin'])->name('dashboard-admin');

    Route::resource('siswa', siswacontroller::class);
    Route::resource('guru', gurucontroller::class);
    Route::resource('local', localcontroller::class);
    Route::resource('jurusan', jurusancontroller::class);
    Route::resource('walikelas', walikelascontroller::class);
    Route::resource('ortu', ortucontroller::class);
    Route::resource('user', usercontroller::class);
    Route::get('absenSiswa', [AbsenController::class, 'indexSiswa'])->name('absenSiswa.index');
    Route::delete('/absenSiswa/{id}', [AbsenController::class, 'destroy'])->name('absenSiswa.destroy');
    Route::get('/pengajuanAdmin', [PengajuanController::class, 'indexAdmin'])->name('pengajuanAdmin.index');

    Route::get('/dashboardGuru', [dashboardcontroller::class, 'dashboardGuru'])->name('dashboard-guru');

    Route::resource('absen', AbsenController::class);
    Route::post('absen/updateStatus', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');
    Route::get('absen/{id}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
    Route::put('absen/{id}', [AbsenController::class, 'update'])->name('absen.update');

    Route::resource('rekap', rekapcontroller::class);
    Route::resource('pengajuan', pengajuancontroller::class);

    Route::get('/dashboardWalikelas', [dashboardcontroller::class, 'dashboardWalikelas'])->name('dashboard-walikelas');

    Route::get('absenWalikelas', [AbsenController::class, 'indexWalikelas'])->name('absenWalikelas.index');
    Route::get('absenWalikelas/create', [AbsenController::class, 'createWalikelas'])->name('absenWalikelas.create');
    Route::post('absenWalikelas/membuat', [AbsenController::class, 'membuat'])->name('absenWalikelas.membuat');
    Route::get('absenWalikelas/{id}/edit', [AbsenController::class, 'editWalikelas'])->name('absenWalikelas.edit');
    Route::put('absenWalikelas/{id}', [AbsenController::class, 'updateWalikelas'])->name('absenWalikelas.update');

    Route::get('/validasi', [pengajuancontroller::class, 'index3'])->name('validasi.index');
    Route::put('pengajuan/{id}/updateStatus', [pengajuancontroller::class, 'updateStatus'])->name('pengajuan.updateStatus');
});