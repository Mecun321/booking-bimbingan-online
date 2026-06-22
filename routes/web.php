<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsMahasiswa;
use App\Http\Middleware\IsDosen;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth'])->group(function () {
    // Mahasiswa routes
    Route::middleware([IsMahasiswa::class])->group(function () {
        Route::get('/dashboard-mahasiswa', [BookingController::class, 'dashboard'])->name('dashboard-mahasiswa');
        Route::get('/mahasiswa/jadwal', [BookingController::class, 'lihatJadwal'])->name('mahasiswa.jadwal');
        Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    });

    // Dosen routes
    Route::middleware([IsDosen::class])->group(function () {
        Route::get('/dashboard-dosen', [JadwalController::class, 'dashboard'])->name('dashboard-dosen');
        Route::get('/atur-jadwal', [JadwalController::class, 'create'])->name('jadwal.form');
        Route::get('/jadwal/bookings', [JadwalController::class, 'daftarBooking'])->name('jadwal.bookings');
        Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('/dosen/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    });
    
});

// Route untuk redirect berdasarkan role
Route::get('/redirect', function () {
    $user = auth()->user();

    return match ($user->role) {
        'mahasiswa' => redirect('/dashboard-mahasiswa'),
        'dosen' => redirect('/dashboard-dosen'),
        default => abort(403)
    };
})->name('redirect');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

