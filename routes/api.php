<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\ApiCategoryController;

// Rutas para películas
Route::get('/movies', [PostController::class, 'index'])->name('api.movies.index');
Route::get('/movies/{id}', [PostController::class, 'show'])->name('api.movies.show');
Route::post('/movies', [PostController::class, 'store'])->name('api.movies.store');
Route::put('/movies/{id}', [PostController::class, 'update'])->name('api.movies.update');
Route::delete('/movies/{id}', [PostController::class, 'destroy'])->name('api.movies.destroy');

// Rutas para categorías
Route::get('/categories', [ApiCategoryController::class, 'index'])->name('api.categories.index');
Route::get('/categories/{id}', [ApiCategoryController::class, 'show'])->name('api.categories.show');
Route::post('/categories', [ApiCategoryController::class, 'store'])->name('api.categories.store');
Route::put('/categories/{id}', [ApiCategoryController::class, 'update'])->name('api.categories.update');
Route::delete('/categories/{id}', [ApiCategoryController::class, 'destroy'])->name('api.categories.destroy');