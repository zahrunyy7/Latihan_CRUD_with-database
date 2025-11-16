<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;     // Mengimpor AuthController
use App\Http\Controllers\ParfumController;  // Mengimpor ParfumController

// =========================================================
// ROUTE PUBLIK (Tidak memerlukan login)
// =========================================================
Route::get('/', [AuthController::class, 'showLogin'])->name('login');      
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');  

// =========================================================
// ROUTE PROTECTED (Memerlukan login, menggunakan Middleware 'auth.session')
// =========================================================
// routes/web.php

// ROUTE PROTECTED (Memerlukan login, menggunakan Middleware 'auth.session')
Route::middleware(['auth.session'])->group(function () {
    
    // Route Dashboard (Setelah login)
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // URUTAN PENTING: Pindahkan route CREATE ke sini (sebelum resource)
    Route::get('/parfums/create', [ParfumController::class, 'create'])->name('parfums.create');

    // Route Detail Produk (Didefinisikan secara eksplisit)
    // Ini harus di atas resource agar tidak tertimpa
    Route::get('/parfums/{parfum}', [ParfumController::class, 'show'])->name('parfums.show');

    // Route CRUD Parfum (Resource)
    // Kita hapus metode 'create' dan 'show' karena sudah didefinisikan secara eksplisit di atas.
    Route::resource('parfums', ParfumController::class)->except(['create', 'show']); 
});