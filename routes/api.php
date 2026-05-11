<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Pastikan dua baris di bawah ini ada!
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

Route::apiResource('genres', GenreController::class);
Route::apiResource('books', BookController::class);