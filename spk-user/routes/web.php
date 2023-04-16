<?php

use App\Http\Controllers\RecomendationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/rekomendasi', [RecomendationController::class, 'index'])->name('recomendation');
