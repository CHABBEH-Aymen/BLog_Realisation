<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            "title"=>"required|string|max:255",
            "content"=>"required|string",
        ]); 
        $data["user_id"] = Auth::user()->getAuthIdentifier();
        $article = Article::creat($data);
        if($request->has('tags')) $article->tag->attach($request->tags);
        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validate([
            "title"=>"required|string|max:255",
            "content"=>"required|string",
        ]); 
        $article->title = $data["title"];
        $article->content = $data["content"];
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
