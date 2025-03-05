<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk halaman pengaduan (Hanya bisa diakses setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
});