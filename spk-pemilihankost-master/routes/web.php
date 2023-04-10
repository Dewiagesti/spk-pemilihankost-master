<?php

use App\Http\Controllers\Backoffice\Master\AdminController;
use App\Http\Controllers\Backoffice\Master\MitraController;
use App\Http\Controllers\Backoffice\Master\KosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('admin', AdminController::class);
    Route::resource('mitra', MitraController::class);
    Route::resource('kos', KosController::class);
    Route::get('/morris', function () {
        return view('mitra/index',);
    })->name('morris');
});
require __DIR__.'/auth.php';
