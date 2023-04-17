<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RecomendationController;


// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return view('home');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/{id}/edit', [AboutController::class, 'detail']);

Route::get('/rekomendasi', [RecomendationController::class, 'index'])->name('recomendation');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
