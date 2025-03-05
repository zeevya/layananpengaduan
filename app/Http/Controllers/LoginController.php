<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Sesuaikan dengan nama file Blade login kamu
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah user dengan NIP ini ada di database
        $user = User::where('nip', $request->nip)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/pengaduan'); // Redirect setelah login sukses
        }

        return back()->withErrors(['loginError' => 'NIP atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}