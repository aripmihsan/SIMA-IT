<?php

use Illuminate\Support\Facades\Route;
// 1. IMPORT SEMUA CONTROLLER DI SINI
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AssetController; // <--- Tambahkan ini di atas

// 2. Halaman Depan -> Login
Route::get('/', function () {
    return view('auth.login');
});

// 3. Grup Route WAJIB LOGIN
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin_dashboard'); 
    })->name('dashboard');

    // === DAFTAR MENU UTAMA ===
    
    Route::resource('categories', CategoryController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('suppliers', SupplierController::class);
    
    // Sekarang penulisannya jadi lebih pendek & seragam:
    Route::resource('assets', AssetController::class); 

});

require __DIR__.'/auth.php';