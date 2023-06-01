<?php

use App\Http\Controllers\Api\RangkingController;
use App\Http\Controllers\RecomendationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/rangking', [RangkingController::class, 'get'])
// ->middleware([
//     'auth', 'role:3'
// ])->name('rangking.index');