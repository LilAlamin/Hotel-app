<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController; // <--- Import ini

// Halaman Publik
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/hotels/{id}', [FrontController::class, 'show'])->name('hotels.show');
Route::get('/destinations', [FrontController::class, 'destinations'])->name('destinations');

// --- Routes Autentikasi (Tambahkan Ini) ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
// ------------------------------------------

// Middleware Auth untuk Checkout & History
Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', [FrontController::class, 'checkout'])->name('checkout.process');
    Route::post('/booking/store', [FrontController::class, 'storeBooking'])->name('booking.store');
    Route::get('/my-bookings', [FrontController::class, 'history'])->name('booking.history');
    Route::get('/booking/{id}', [FrontController::class, 'bookingShow'])->name('booking.show');
});