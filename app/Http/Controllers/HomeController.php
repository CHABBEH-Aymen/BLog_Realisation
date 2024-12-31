<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Filter articles by category and search term
        $query = Article::query();

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $articles = $query->with('category', 'tags', 'user')->paginate(5);
        $categories = Category::all();

        return view('public.index', compact('articles', 'categories'));
    }

    public function show($id)
    {
        $article = Article::with('category', 'tags', 'user')->findOrFail($id);
        return view('public.show', compact('article'));
    }
}
