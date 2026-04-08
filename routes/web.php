<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\Controller4::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);


// QUẢN LÝ PHIM - Controller 4
use App\Http\Controllers\MovieController004;
Route::get('/movie/create', [MovieController004::class, 'create']);
Route::post('/movie/store', [MovieController004::class, 'store']);