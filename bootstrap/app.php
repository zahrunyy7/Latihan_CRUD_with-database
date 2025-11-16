<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckLogin; // <-- 1. IMPORT MIDDLEWARE ANDA DI SINI

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // 2. TAMBAHKAN BLOK ALIAS DI SINI
        $middleware->alias([
            'auth.session' => CheckLogin::class, // <-- Alias untuk proteksi login
        ]);
        
        // (Semua konfigurasi middleware lain di bawahnya, jika ada)
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();