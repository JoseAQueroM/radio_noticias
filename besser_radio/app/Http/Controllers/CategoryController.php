<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View; // Asegúrate de tener esta importación

class CategoryController extends Controller
{
    /**
     * Muestra un listado de todas las categorías.
     */
    public function index(): View
    {
        $categories = Category::withCount('news')->get(); // Obtiene todas las categorías y cuenta sus noticias relacionadas
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Muestra las noticias de una categoría específica.
     *
     * @param  string  $slug
     * @return View
     */
    public function show($slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryNews = News::where('category_id', $category->id)
            ->where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->paginate(10);

        return view('category.show', ['category' => $category, 'categoryNews' => $categoryNews]);
    }
}