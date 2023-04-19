<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\KostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RecomendationController;


// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return view('home')->name('home');
});

// Page not Auth alias Landing page
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/{id}/edit', [AboutController::class, 'detail']);
Route::get('/rekomendasi', [RecomendationController::class, 'index'])->name('recomendation');

// admin page
Route::prefix('admin')
    ->middleware(['auth', 'verified'])->group(function () {
        Route::view('/dashboard','admin.dashboard')->name('dashboard');
        Route::get('/users', UserController::class)->name('user.index');
        Route::resource('kost', KostController::class);
       
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
