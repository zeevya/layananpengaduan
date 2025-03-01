<?php

use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke halaman pengaduan
Route::get('/', function () {
    return redirect()->route('pengaduan.create');
});

// Formulir pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');

// Simpan data pengaduan
Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');