<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login'); // Pastikan ada file login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah user dengan NIP ini ada di database
        $user = User::where('nip', $request->nip)->first();

        // Jika user ditemukan dan password benar
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate(); // Regenerate session untuk keamanan

            return redirect()->intended('/pengaduan'); // Redirect setelah login sukses
        }

        // Jika gagal, kembali ke login dengan pesan error
        return back()->withErrors(['loginError' => 'NIP atau password salah']);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}