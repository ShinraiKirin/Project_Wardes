<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController; // Import CartController

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/kontak', function () {
    return view('customer.kontak.index');
})->name('kontak.index');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{item}', [CartController::class, 'add'])->name('cart.add');