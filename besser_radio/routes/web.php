<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController; // Ya existe
use App\Http\Controllers\CategoryController; // Ya existe

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Mostrar todas las noticias
Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');

// Mostrar los detalles de una noticia
Route::get('/noticias/{slug}', [NewsController::class, 'show'])->name('news.show');

// Mostrar todas las noticias de una categoría
Route::get('/categorias/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Sobre nosotros
Route::get('/sobre-nosotros', function () {
    return view('about');
})->name('about');
