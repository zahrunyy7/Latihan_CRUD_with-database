<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLogin()
    {
        // Jika user sudah login (ada session 'user'), langsung arahkan ke dashboard
        if (session('user')) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    /**
     * Memproses form login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek kredensial (menggunakan hardcoded: admin/123)
        if ($username === 'admin' && $password === '123') {
            // Jika sukses, simpan user ke session
            Session::put('user', $username);

            // Arahkan ke halaman dashboard
            return redirect()->route('dashboard');
        } else {
            // Jika gagal, kembali ke halaman login dengan pesan error
            return back()->with('error', 'Username atau Password salah!');
        }
    }

    /**
     * Menampilkan halaman dashboard setelah user login.
     * Tidak perlu pengecekan Session di sini karena sudah diproteksi oleh Middleware.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Memproses logout (menghapus session).
     */
    public function logout()
    {
        // Hapus semua session
        Session::flush();
        
        // Arahkan kembali ke halaman login
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}