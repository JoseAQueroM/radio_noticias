<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)
                        ->where('status', 'published')
                        ->with('category', 'author')
                        ->firstOrFail();
                        
        // Obtener 4 noticias aleatorias (excluyendo la actual)
        $randomNews = News::where('status', 'published')
                         ->where('id', '!=', $newsItem->id)
                         ->inRandomOrder()
                         ->limit(4)
                         ->get();

        return view('news.show', [
            'newsItem' => $newsItem,
            'randomNews' => $randomNews
        ]);
    }

    public function index()
    {
        $allNews = News::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->get();

        return View::make('news.index', ['allNews' => $allNews]);
    }
}