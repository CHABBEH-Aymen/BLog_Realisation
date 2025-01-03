<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Facades\Permission as PermissionFacade;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    public function create(int $articleId)
    {
        
    }

    public function store(Request $request, int $articleId)
    {
        // Vérifie si l'utilisateur a le droit d'ajouter des commentaires
        if (!auth()->user()->can('add comments')) {
            abort(403, 'You do not have permission to add comments.');
        }

        // valider les données du formulaire
        $data = $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // créer un nouveau commentaire
        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->user_id = auth()->id();
        $comment->save();

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
