<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Dashboard hanya untuk admin login
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Secret Login admin (mengganti login default)
Route::get('/auth-secret', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login'); // tetap name login agar breeze tetap jalan tapi halaman kita

Route::post('/auth-secret', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
