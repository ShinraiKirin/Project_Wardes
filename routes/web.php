<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

// Rute utama sekarang langsung memanggil MenuController.
// Ini lebih efisien karena tidak memerlukan pengalihan.
Route::get('/', [MenuController::class, 'index'])->name('menu');
// Jika Anda masih ingin URL /menu dapat diakses, Anda bisa menambahkan rute ini.
// Route::get('/menu', [MenuController::class, 'index']);
