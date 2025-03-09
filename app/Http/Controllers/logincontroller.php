<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;

class logincontroller extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user di tabel admin, guru, atau siswa
        $user = User::where('username', $request->username)->first()
            ?? Guru::where('username', $request->username)->first()
            ?? Siswa::where('username', $request->username)->first();

        // Jika user tidak ditemukan atau password salah
        if (!$user || !password_verify($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Username atau password salah']);
        }

        // Login user
        Auth::login($user);

        // Redirect berdasarkan level
        return match ($user->level) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru'  => redirect()->route('guru.dashboard'),
            'siswa' => redirect()->route('siswa.dashboard'),
            default => back()->withErrors(['login' => 'Akun tidak memiliki akses']),
        };
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
