<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController;

// Trang thể loại
Route::get('/theloai/{id}', [MovieController::class, 'index'])
->name('movie.genre');

//Trang chủ
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);
