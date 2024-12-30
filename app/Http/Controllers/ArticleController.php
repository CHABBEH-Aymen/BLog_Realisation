<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(5);
        return view('admin.article.index' , compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.create' , compact('categories' , 'tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $raquest->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:500',
            'category' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $article = new Article();
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->user_id = auth()->id();
        $article->category_id = $data['category'];
        $article->tags()->attach($data['tags']);  
        $article->save();

        return redirect()->route('article.index')->with('message' , 'Article created successfully');  
    }

    public function show(string $id)
    {
        return view('admin.article.show');
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.edit' , compact('article','categories' , 'tags'));
    }


    public function update(Request $request, Article $article)
    {
        
        $data = $raquest->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:500',
            'category' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $article->update($data)([
            'title' => $valideted['title'],
            'content' => $valideted['content'],
            'category_id' => $valideted['category'],
        ]);

        $article->tags()->sync($request->tags);

        return redirect()->route('article.index')->with('message' , 'Article updated successfully');
    }


    public function destroy(Article $article)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('article.index')->with('message' , 'Article deleted successfully');
    }
    
}
