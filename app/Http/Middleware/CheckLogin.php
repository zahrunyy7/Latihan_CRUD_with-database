<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // === LOGIKA PROTEKSI LOGIN ===
        
        // 1. Cek apakah session 'user' (yang dibuat saat login berhasil) tidak ada
        if (!session('user')) {
            // 2. Jika tidak ada, redirect user kembali ke route login
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // 3. Jika session 'user' ada, lanjutkan permintaan ke Controller
        return $next($request);
    }
}