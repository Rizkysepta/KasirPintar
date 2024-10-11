<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login.login');
    }

    public function login(Request $request)
{
    // Validasi input login jika diperlukan
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    // Misalnya jika username dan password sesuai dengan kondisi tertentu
    if ($request->username === 'admin' && $request->password === 'admin') {
        // Redirect ke dashboard setelah login sukses
        return redirect()->route('dashboard');
    } else {
        // Kembali ke halaman login dengan error jika gagal
        return redirect()->back()->withErrors([
            'loginError' => 'Username atau password salah!',
        ]);
    }
}

}
