<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

// Rota principal
Route::get('/', function () {
    return view('library.home');
})->name('home');

// Rotas para Livros
Route::resource('books', BookController::class);

// Rotas para Autores
Route::resource('authors', AuthorController::class);

// Rotas para Gêneros
Route::resource('genres', GenreController::class);

// Rotas para Editoras
Route::resource('publishers', PublisherController::class); 