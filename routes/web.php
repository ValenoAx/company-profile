<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SandalController as AdminSandalController;
use App\Http\Controllers\Web\VisitorController as Vcon;

// ===== ADMIN ROUTES =====
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('sandal')->as('sandal.')->group(function () {
        Route::get('/', [AdminSandalController::class, 'index'])->name('index');
        Route::get('/create', [AdminSandalController::class, 'create'])->name('create');
        Route::post('/create', [AdminSandalController::class, 'store'])->name('store');
        Route::get('/update/{id}', [AdminSandalController::class, 'edit'])->name('edit');
        Route::put('/update/{sandal}', [AdminSandalController::class, 'update'])->name('update');
        Route::delete('/delete/{sandal}', [AdminSandalController::class, 'destroy'])->name('delete');
    });
});

// ===== PUBLIC / VISITOR ROUTES (Company Profile) =====
Route::prefix('web')->as('web.')->group(function () {
   Route::get('/', [Vcon::class, 'index'])->name('dashboard');

   Route::prefix('sandal')->as('sandal.')->group(function () {
        Route::get('/', [Vcon::class, 'index'])->name('index');
    });

});
