<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, PropertyController};
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\KprController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PropertyRequestController;
use App\Http\Controllers\SubmissionController;

use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// ================================
// NAVBAR PAGE
// ================================


Route::get('/properti', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/beli',     [PropertyController::class, 'index'])->name('properties.sale');
Route::get('/sewa',     [PropertyController::class, 'index'])->name('properties.rent');



Route::get('/jual-properti', [SubmissionController::class, 'create'])->name('submissions.create');
Route::post('/jual-properti', [SubmissionController::class, 'store'])->name('submissions.store');
Route::get('/submission/{code}', [SubmissionController::class, 'success'])->name('submissions.success');

// KPR
Route::get('/kpr', [KprController::class, 'index'])->name('kpr.index');

// comapny profile
Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company.profile');
Route::get('/tim-kami', [CompanyProfileController::class, 'team'])->name('company.team');
Route::get('/karier', [CompanyProfileController::class, 'career'])->name('company.career');

// BANTUAN
Route::get('/faq', [PageController::class, 'faq'])->name('static.faq');Route::get('/faq', [PageController::class, 'faq'])->name('static.faq');
Route::get('/pusat-bantuan', [PageController::class, 'helpCenter'])->name('static.help');
Route::get('/hubungi-kami', [PageController::class, 'contact'])->name('static.contact');


Route::post('/property-requests', [PropertyRequestController::class, 'store'])->name('property-requests.store');

Route::get('/panduan', [GuideController::class, 'index'])->name('static.guide');

Route::get('/properti/{slug}', [PropertyController::class, 'show'])->name('properties.show');


// Route cari agent
Route::get('/cari-agen', [AgentController::class, 'index'])->name('agents.index');

// Route untuk semua halaman yang belum selesai
Route::get('/coming-soon/{slug?}', [PageController::class, 'comingSoon'])->name('page.coming-soon');





// ==========================================
// ADMIN / CRM ROUTES
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route admin lainnya menyusul (properties, submissions, agents, dll)
});

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
