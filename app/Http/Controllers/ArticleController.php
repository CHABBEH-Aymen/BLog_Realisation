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
    public function create(Request $request): RedirectResponse
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
