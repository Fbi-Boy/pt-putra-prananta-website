<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, PropertyController};

Route::get('/', [HomeController::class, 'index'])->name('home');

// ================================
// NAVBAR PAGE
// ================================


Route::get('/properti', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/beli',     [PropertyController::class, 'index'])->name('properties.sale');
Route::get('/sewa',     [PropertyController::class, 'index'])->name('properties.rent');
Route::get('/kpr',      [PropertyController::class, 'index'])->name('kpr.index');
// Route::get('/jual', [CompanyProfileController::class, 'jual'])
//     ->name('company.jual');

// Route::get('/cari-agent', [CompanyProfileController::class, 'cariAgent'])
//     ->name('company.cari-agent');

// Route::get('/kpr', [CompanyProfileController::class, 'kpr'])
//     ->name('company.kpr');

// Route::get('/panduan', [CompanyProfileController::class, 'panduan'])
//     ->name('company.panduan');

// Route::get('/lainnya', [CompanyProfileController::class, 'lainnya'])
//     ->name('company.lainnya');
