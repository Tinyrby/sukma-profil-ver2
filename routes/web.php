<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PendudukController as AdminPendudukController;
use App\Http\Controllers\Admin\MutasiController;
use App\Http\Controllers\Admin\KkController;
use App\Http\Controllers\Admin\DusunController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PublicManagementController;

// Halaman utama dengan berita
Route::get('/', [BeritaController::class, 'index']);

// Berita routes untuk pengunjung
Route::get('/berita', [BeritaController::class, 'all'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// API Route untuk berita (untuk modal)
Route::get('/api/berita/{id}', [BeritaController::class, 'apiShow'])->name('berita.api.show');

Route::resource('/dashboard', PendudukController::class);

// Public Management Routes (Tanpa Login)
Route::prefix('public-management')->name('public.management.')->group(function () {
    // News Management
    Route::get('/news', [PublicManagementController::class, 'newsIndex'])->name('news.index');
    Route::get('/news/create', [PublicManagementController::class, 'newsCreate'])->name('news.create');
    Route::post('/news', [PublicManagementController::class, 'newsStore'])->name('news.store');
    Route::get('/news/{id}/edit', [PublicManagementController::class, 'newsEdit'])->name('news.edit');
    Route::put('/news/{id}', [PublicManagementController::class, 'newsUpdate'])->name('news.update');
    Route::delete('/news/{id}', [PublicManagementController::class, 'newsDestroy'])->name('news.destroy');

    // Struktur Organisasi Management
    Route::get('/struktur', [PublicManagementController::class, 'strukturIndex'])->name('struktur.index');
    Route::get('/struktur/create', [PublicManagementController::class, 'strukturCreate'])->name('struktur.create');
    Route::post('/struktur', [PublicManagementController::class, 'strukturStore'])->name('struktur.store');
    Route::get('/struktur/{id}/edit', [PublicManagementController::class, 'strukturEdit'])->name('struktur.edit');
    Route::put('/struktur/{id}', [PublicManagementController::class, 'strukturUpdate'])->name('struktur.update');
    Route::delete('/struktur/{id}', [PublicManagementController::class, 'strukturDestroy'])->name('struktur.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Middleware group for authenticated admin
    Route::middleware(['admin.auth'])->group(function () {
        // Penduduk CRUD
        Route::resource('/penduduk', AdminPendudukController::class);

        // Mutasi CRUD
        Route::resource('/mutasi', MutasiController::class);

        // Kartu Keluarga CRUD
        Route::resource('/kk', KkController::class);

        // Dusun CRUD
        Route::resource('/dusun', DusunController::class);

        // Berita CRUD
        Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('berita.admin.index');
        Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.admin.create');
        Route::post('/berita', [BeritaController::class, 'store'])->name('berita.admin.store');
        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.admin.edit');
        Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.admin.update');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.admin.destroy');
        Route::post('/berita/{id}/toggle-status', [BeritaController::class, 'toggleStatus'])->name('berita.admin.toggle-status');
    });
});


// Middleware for admin authentication
Route::middleware(['web'])->group(function () {
    // Create a simple middleware for admin authentication
    Route::bind('admin_auth', function () {
        return function ($request, $next) {
            if (!session('admin_logged_in')) {
                return redirect()->route('admin.login');
            }
            return $next($request);
        };
    });
});
