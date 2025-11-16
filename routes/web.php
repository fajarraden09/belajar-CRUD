<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController; // import controller

Route::get('/', [MahasiswaController::class, 'index'])->name('home');

// menambahkan baris route controller
Route::resource('mahasiswa', MahasiswaController::class);
