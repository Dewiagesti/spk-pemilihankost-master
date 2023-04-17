<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\RecomendationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/{id}/edit', [AboutController::class, 'detail']);

Route::get('/rekomendasi', [RecomendationController::class, 'index'])->name('recomendation');
