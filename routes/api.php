<?php

use App\Http\Controllers\Api\RangkingController;
use App\Http\Controllers\RecomendationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rangking', [RangkingController::class, 'get'])->name('rangking.index');
Route::get('/gender/{Kost:jenis_kost}', [RecomendationController::class, 'getGender']);