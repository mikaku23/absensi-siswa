<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Mengabsen;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua daftar kelas dari tabel locals
        $kelasList = Local::all();

        // Query awal untuk mengambil data siswa dengan relasi ke local
        $query = Siswa::with('local');

        // Jika ada filter kelas, tambahkan kondisi penyaringan
        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('id_local', $request->kelas);
        }

        // Eksekusi query dengan paginasi
        $siswa = $query->paginate(10);

        return view('guru.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'siswa' => $siswa,
            'kelasList' => $kelasList
        ]);
    }

    public function store(Request $request)
    {
        // Menyimpan absensi dengan data siswa dan guru yang login
        Mengabsen::create([
            'id_siswa' => $request->id_siswa,
            'id_guru' => Auth::id() // Menggunakan ID guru yang login
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil dilakukan!');
    }
}
