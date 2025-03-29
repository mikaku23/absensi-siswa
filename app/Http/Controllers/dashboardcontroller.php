<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\local;
use App\Models\siswa;
use App\Models\jurusan;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboardAdmin()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('admin.index', [
            'menu' => 'dashboard',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan
        ]);
    }
    public function dashboardGuru()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('guru.index', [
            'menu' => 'dashboard',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan
        ]);
    }
    public function dashboardWalikelas()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('walikelas.index', [
            'menu' => 'dashboard',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan
        ]);
    }
}
