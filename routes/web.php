<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;

// =======================
// AUTH ROUTES
// =======================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/regis', [AuthController::class, 'showRegis'])->name('register');

// =======================
// PROTECTED ROUTES
// =======================
Route::middleware(['auth'])->group(function () {

    // Dashboard & Logout
   
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Master Data
    Route::get('/bagian', [AuthController::class, 'bagian'])->name('bagian.index');
    Route::get('/level', [AuthController::class, 'level'])->name('level.index');
    Route::get('/status', [AuthController::class, 'status'])->name('status.index');
    Route::get('/proyek', [AuthController::class, 'proyek'])->name('proyek.index');
    Route::get('/mode', [AuthController::class, 'mode'])->name('mode.index');
    Route::get('/statusjam', [AuthController::class, 'statusjam'])->name('statusjam.index');
    Route::get('/jenispesan', [AuthController::class, 'jenispesan'])->name('jenispesan.index');
    Route::get('/keterangan', [AuthController::class, 'keterangan'])->name('keterangan.index');

    // Aktivitas
    Route::get('/aktivitas', [AuthController::class, 'aktivitas'])->name('aktivitas.index');
    Route::get('/proyekuser', [AuthController::class, 'proyekuser'])->name('proyekuser.index');
    Route::get('/jamkerja', [AuthController::class, 'jamkerja'])->name('jamkerja.index');
    Route::get('/jamkerjapertanggal', [AuthController::class, 'jamkerjapertanggal'])->name('jamkerjapertanggal.index');
    Route::get('/lembur', [AuthController::class, 'lembur'])->name('lembur.index');
    Route::get('/pesan', [AuthController::class, 'pesan'])->name('pesan.index');

    // User
    Route::get('/user', [AuthController::class, 'user'])->name('user.index');
    Route::get('/userprofile', [AuthController::class, 'userprofile'])->name('userprofile.index');

    // Profile
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile.index'); // profil sendiri
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show'); // profil user lain

    Route::post('/profile/upload', [AuthController::class, 'updateProfile'])->name('profile.upload');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
});

// =======================
// Upload file (umum, tidak pakai auth)
// =======================
Route::post('/upload', [UploadController::class, 'store']);
