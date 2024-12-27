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


    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            "title"=>"required|string|max:255",
            "content"=>"required|string",
            "category_id"=>"required|integer"
        ]);
        $data["user_id"] = Auth::user()->id;
        $articel = Article::create($data);
        if($request->has("tags")) $articel->tag()->attach($request->tags);

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
        //git worktree list

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        
        return redirect('admin.article.index')->with('success' , 'delete successed');
    }
}
