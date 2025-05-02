<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController; // Ya existe
use App\Http\Controllers\CategoryController; // Ya existe

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para mostrar todas las noticias
Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');

// Rutas para mostrar los detalles de una noticia
Route::get('/noticias/{slug}', [NewsController::class, 'show'])->name('news.show');

// Ruta para mostrar todas las categorías
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');

// Ruta para mostrar todas las noticias de una categoría
Route::get('/categorias/{slug}', [CategoryController::class, 'show'])->name('categories.show');


