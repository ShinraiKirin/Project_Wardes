<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Login admin (disembunyikan)
|--------------------------------------------------------------------------
*/
Route::get('/auth-secret', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login'); 

Route::post('/auth-secret', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');


/*
|--------------------------------------------------------------------------
| Logout admin
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

