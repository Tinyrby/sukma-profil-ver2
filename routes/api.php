<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

// API Routes untuk Berita
Route::prefix('berita')->group(function () {
    // GET /api/berita - Mengambil semua berita aktif untuk frontend
    Route::get('/', [BeritaController::class, 'apiIndex']);

    // GET /api/berita/{id} - Mengambil detail berita tertentu
    Route::get('/{id}', [BeritaController::class, 'apiShow']);
});