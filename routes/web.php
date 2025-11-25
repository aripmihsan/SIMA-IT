<?php

use Illuminate\Support\Facades\Route;

// 1. Halaman Depan diarahkan ke Login Area
Route::get('/', function () {
    return view('auth.login');
});

// 2. Grup Route yang WAJIB LOGIN
Route::middleware(['auth', 'verified'])->group(function () {

    // Saat akses /dashboard, tampilkan file 'admin_dashboard' (yang mewah tadi)
    Route::get('/dashboard', function () {
        return view('admin_dashboard'); 
    })->name('dashboard');

});

// Load rute auth bawaan Breeze
require __DIR__.'/auth.php';