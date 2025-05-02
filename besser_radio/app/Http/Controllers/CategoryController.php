<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('news')
                            ->orderBy('name')
                            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        // Obtener todas las noticias de la categoría (publicadas)
        $categoryNews = $category->news()
                                ->where('status', 'published')
                                ->orderBy('publish_date', 'desc')
                                ->get();
        
        // Obtener noticias aleatorias de otras categorías
        $randomCategoryNews = News::where('status', 'published')
                                ->where('category_id', '!=', $category->id)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();

        return view('categories.show', [
            'category' => $category,
            'categoryNews' => $categoryNews,
            'randomCategoryNews' => $randomCategoryNews
        ]);
    }
}