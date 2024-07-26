<?php

use App\Http\Controllers\Api\Aktorcontroller;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Genrecontroller;
use App\Http\Controllers\Api\Kategoricontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware((['auth:sanctum']))->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('aktor', AktorController::class);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
