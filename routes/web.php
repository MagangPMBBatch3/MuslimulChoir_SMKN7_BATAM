<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\AuthController;


    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard']);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/bagian', [AuthController::class, 'bagian'])->name('bagian.index');

    Route::get('/level', [AuthController::class, 'level'])->name('level.index');
});
