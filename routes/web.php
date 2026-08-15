<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest)
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    // Amankan saat tabel belum dimigrasi (mis. fresh install / lingkungan test)
    $totalLabs = 0;
    $laboratoriums = collect();

    if (Schema::hasTable('laboratorium')) {
        $laboratoriums = \App\Models\Laboratorium::latest()->take(4)->get();
        $totalLabs = \App\Models\Laboratorium::count();
    }

    return view('landing', compact('totalLabs', 'laboratoriums'));
})->name('landing');

// Panduan penggunaan (publik)
Route::view('/panduan', 'panduan')->name('panduan');

// Daftar peminjaman — BISA DI AKSES SEMUA ORANG (termasuk tamu)
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');

// Otentikasi untuk tamu
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Authenticated Users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // === Profil Pengguna ===
    // Penting: route statis "/profile/edit" HARUS di atas "/profile/{user}",
    // agar tidak tertangkap oleh parameter {user} (menyebabkan 404).

    // Edit profil sendiri
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    // Profil publik sendiri (lihat profil)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    // Profil publik orang lain
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.other');

    // Dashboard: arahkan ke view sesuai role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // === Kelola Peminjaman ===
    // Hanya aksi yang butuh login (index sudah publik)
    Route::resource('peminjaman', PeminjamanController::class)
        ->except(['index', 'show']);

    // === Kelola Laboratorium (Admin & Dosen) ===
    Route::middleware(['role:admin_labkom|dosen'])->group(function () {
        Route::resource('laboratorium', LaboratoriumController::class)->except(['show']);
    });

    // === Kelola Pengguna (Hanya Admin) ===
    Route::middleware(['role:admin_labkom'])->group(function () {
        Route::resource('users', UsersController::class)->except(['show']);
    });
});
