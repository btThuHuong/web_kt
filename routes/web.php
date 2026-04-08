<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);

use App\Http\Controllers\MovieController3; 
Route::get('/movie', [MovieController3::class, 'index'])->name('movie.list');
Route::get('/movie/delete/{id}', [MovieController3::class, 'destroy'])->name('movie.delete');