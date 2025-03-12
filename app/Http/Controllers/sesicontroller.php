<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sesiController extends Controller
{


    function tampilRegistrasi()
    {
        return view('utama.register', [
            'menu' => 'registrasi',
            'title' => 'Registrasi Pengguna'
        ]);
    }

    function submitRegistrasi(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = 'guru';
        $user->save();

        $guru = new guru;
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->username = $request->username;
        $guru->password = bcrypt($request->password);
        $guru->jk = $request->jk;
        $guru->nohp = $request->nohp;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->id_user = $user->id;
        $guru->save();

        return redirect()->route('login');
    }

    function tampilLogin()
    {
        return view('utama.login', [
            'menu' => 'login',
            'title' => 'Login Pengguna'
        ]);
    }

    function submitLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah user ini adalah guru
            $guru = Guru::where('username', $user->username)->first();
            if ($guru) {
                return redirect()->route('welcome');
            }

            // Cek apakah user ini adalah siswa
            $siswa = Siswa::where('username', $user->username)->first();
            if ($siswa) {
                return redirect()->route('hello');
            }

            // Jika user adalah admin
            if ($user->level === 'admin') {
                return redirect()->route('home');
            }

        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}



