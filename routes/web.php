<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/kontak', function () {
    return view('kontak.index');
})->name('kontak.index');