<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('news.show', ['newsItem' => $newsItem]);
    }

    public function index()
    {
        $allNews = News::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->paginate(12); // Mostrar 12 noticias por página (ajusta este número si lo deseas)

        return View::make('news.index', ['allNews' => $allNews]);
    }
}