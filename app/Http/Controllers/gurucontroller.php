<?php
// filepath: /c:/xampp/htdocs/absensi-siswa/app/Http/Controllers/gurucontroller.php


namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class gurucontroller extends Controller
{
    public function index()
    {
        $dataguru = Guru::all();
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data Guru',
            'dataguru' => $dataguru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data Guru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nohp' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_user' => 'nullable',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nip.required' => 'NIP Harus Diisi',
            'nohp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        $guru = new Guru;
        $guru->nama = $validasi['nama'];
        $guru->nip = $validasi['nip'];
        $guru->nohp = $validasi['nohp'];
        $guru->jk = $validasi['jk'];
        $guru->tanggal_lahir = $validasi['tanggal_lahir'];
        $guru->username = $validasi['username'];
        $guru->password = $validasi['password'];
        $guru->id_user = $validasi['id_user'];
        $guru->save();
        return redirect(route('guru.index'));
    }

    public function show($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.view', [
            'menu' => 'guru',
            'title' => 'Detail Data Guru',
            'guru' => $guru
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data Guru',
            'guru' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'nip' => 'nullable',
            'nohp' => 'nullable',
            'jk' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'id_user' => 'nullable',
        ]);

        $guru = Guru::find($id);
        $guru->nama = $validasi['nama'] ?? $guru->nama;
        $guru->nip = $validasi['nip'] ?? $guru->nip;
        $guru->nohp = $validasi['nohp'] ?? $guru->nohp;
        $guru->jk = $validasi['jk'] ?? $guru->jk;
        $guru->tanggal_lahir = $validasi['tanggal_lahir'] ?? $guru->tanggal_lahir;
        $guru->username = $validasi['username'] ?? $guru->username;
        if ($request->filled('password')) {
            $guru->password = $validasi['password'];
        }
        $guru->id_user = $validasi['id_user'] ?? $guru->id_user;
        $guru->save();
        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();
        return redirect(route('guru.index'));
    }
}