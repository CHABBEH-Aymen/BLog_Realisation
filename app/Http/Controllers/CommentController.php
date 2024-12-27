<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    public function create(int $articleId)
    {
        //
    }

    public function store(Request $request, int $articleId)
    {
        // valider les données du formulaire
        $data = $request->validate([
            'content' => 'required|string|max:500',
            'article_id' =>'required|integer'
        ]);
        $data['user_id'] = Auth::user()->id;
        // créer un nouveau commentaire
        Comment::create($data);
        return redirect()->route('articles.index', $articleId)->with('success', 'Comment added successfully!');
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
        $comment = Comment::findOrFail($id);
        $data = $request->validate([
            "content"=>"required|string"
        ]);
        $comment->content = $data["content"];
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy(string $id)
    {
        $article = Comment::findOrFail($id);
        $article->delete();
        
        return redirect('admin.comment.index')->with('success' , 'delete successed');
    }

}
