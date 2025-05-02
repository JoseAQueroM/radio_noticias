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
                        
        // Noticias relacionadas (misma categoría)
        $relatedNews = News::where('status', 'published')
                         ->where('category_id', $newsItem->category_id)
                         ->where('id', '!=', $newsItem->id)
                         ->orderBy('publish_date', 'desc')
                         ->limit(3)
                         ->get();
    
        // Noticias aleatorias (para otras secciones)
        $randomNews = News::where('status', 'published')
                         ->where('id', '!=', $newsItem->id)
                         ->inRandomOrder()
                         ->limit(3)
                         ->get();
    
        return view('news.show', [
            'newsItem' => $newsItem,
            'relatedNews' => $relatedNews,
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