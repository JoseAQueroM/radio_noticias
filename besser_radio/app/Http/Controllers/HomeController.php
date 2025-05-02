<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener una noticia aleatoria para la sección principal izquierda
        $leftNews = News::where('status', 'published')
            ->inRandomOrder()
            ->first();

        // Obtener 3 noticias aleatorias diferentes para la sección derecha pequeña
        $rightNews = News::where('status', 'published')
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Obtener las últimas noticias publicadas para el carousel
        $latestNews = News::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->take(9) // Ajusta este número según cuántas noticias quieras en el carousel
            ->get();
        $newsChunks = $latestNews->chunk(3);

        // Obtener las noticias paginadas para la lista principal (si la usas)
        $paginatedNews = News::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->paginate(10); // Ajusta el número de noticias por página si es necesario

        return View::make('home', [
            'leftNews' => $leftNews,
            'rightNews' => $rightNews,
            'newsChunks' => $newsChunks,
            'news' => $paginatedNews,
        ]);
    }
}
