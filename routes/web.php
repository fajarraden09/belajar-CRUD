<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController; // import controller

Route::get('/', function () {
    return view('welcome');
});

// menambahkan baris route controller
Route::resource('mahasiswa', MahasiswaController::class);
