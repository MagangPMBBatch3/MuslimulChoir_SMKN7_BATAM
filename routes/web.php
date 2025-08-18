<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\AuthController;


    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

     Route::get('/regis', [AuthController::class, 'showRegis'])->name('register');  


    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard']);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/bagian', [AuthController::class, 'bagian'])->name('bagian.index');

    Route::get('/level', [AuthController::class, 'level'])->name('level.index');

    Route::get('/status', [AuthController::class, 'status'])->name('status.index');

    Route::get('/proyek', [AuthController::class, 'proyek'])->name('proyek.index');

    Route::get('/mode', [AuthController::class, 'mode'])->name('mode.index');

    Route::get('/statusjam', [AuthController::class, 'statusjam'])->name('statusjam.index');

    Route::get('/jenispesan', [AuthController::class, 'jenispesan'])->name('jenispesan.index');

    Route::get('/keterangan', [AuthController::class, 'keterangan'])->name('keterangan.index');

    Route::get('/user', [AuthController::class, 'user'])->name('user.index');

    Route::get('/aktivitas', [AuthController::class, 'aktivitas'])->name('aktivitas.index');

   
});
