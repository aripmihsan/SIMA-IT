<?php

use Illuminate\Support\Facades\Route;
// Import Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\ReportController; // Jangan lupa import ini

Route::get('/', function () { return view('auth.login'); });

Route::middleware(['auth', 'verified'])->group(function () {

    // 1. DASHBOARD
    Route::get('/dashboard', function () { return view('admin_dashboard'); })->name('dashboard');

    // 2. AREA KHUSUS ADMIN (TARUH DI ATAS AGAR RUTE 'CREATE' DIBACA DULUAN)
    Route::middleware(['role:admin'])->group(function () {
        
        // Data Master
        Route::resource('categories', CategoryController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('users', UserController::class);

        // ASET: CREATE & EDIT (Spesifik)
        Route::get('/assets/create', [AssetController::class, 'create'])->name('assets.create');
        Route::post('/assets', [AssetController::class, 'store'])->name('assets.store');
        Route::get('/assets/{asset}/edit', [AssetController::class, 'edit'])->name('assets.edit');
        Route::put('/assets/{asset}', [AssetController::class, 'update'])->name('assets.update');
        Route::delete('/assets/{asset}', [AssetController::class, 'destroy'])->name('assets.destroy');
        
        // Laporan PDF
        Route::get('/report/assets', [ReportController::class, 'exportAssets'])->name('report.assets');

    });

    // 3. AREA UMUM (TARUH DI BAWAH)
    Route::resource('allocations', AllocationController::class);

    // Daftar Aset (Index)
    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
    
    // Detail Aset (Show) -> INI YANG PALING BERBAHAYA, WAJIB PALING BAWAH
    // Karena {asset} bisa menangkap kata apa saja termasuk 'create'
    Route::get('/assets/{asset}', [AssetController::class, 'show'])->name('assets.show'); 

});

require __DIR__.'/auth.php';