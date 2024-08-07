<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('home');
});

Route::resource('movies', MovieController::class);
Route::resource('categories', CategoryController::class);
Route::get('/', [MovieController::class, 'showHome'])->name('home');
Route::get('/movies/genre/{genre}', [MovieController::class, 'showMoviesByGenre'])->name('movies.genre');
Route::get('/movies/edit/{id}', [MovieController::class, 'editar'])->name('movies.edit');
Route::put('/movies/update/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/delete/{id}', [MovieController::class, 'eliminar'])->name('movies.delete');
