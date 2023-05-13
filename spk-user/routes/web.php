<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\KostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Mitra\KostController as MitraKostController;
use App\Http\Controllers\Mitra\NormalizationController;
use App\Http\Controllers\RecomendationController;


Route::get('/', function () {
    return view('home');
})->name('home');


// Page not Auth alias Landing page
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/{id}/edit', [AboutController::class, 'detail']);
Route::get('/rekomendasi', [RecomendationController::class, 'index'])->name('recomendation');

// admin page
Route::prefix('admin')
    ->middleware(['auth', 'verified', 'role:1'])->group(function () {
        Route::view('/dashboard','admin.dashboard')->name('dashboard');
        Route::get('/users', [UserController::class, 'users'])->name('user.index');
        Route::get('/mitra', [UserController::class, 'mitra'])->name('mitra.index');
        Route::get('kost', [KostController::class, 'index'])->name('admin.kost');
        Route::get('/kost/{id}', [KostController::class, 'show'])->name('admin.kost.show');     
});

// Mitra page
Route::prefix('mitra')
    ->name('mitra.')
    ->middleware(['auth', 'verified', 'role:2'])->group(function () {
        Route::view('/dashboard','mitra.dashboard')->name('mitra.dashboard');
        Route::resource('kost', MitraKostController::class)->only('index','store', 'edit');
        Route::get('/kost/{id}', [MitraKostController::class, 'destroy']);
        Route::get('/normalisasi', [NormalizationController::class, 'index'])->name('normalization.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
