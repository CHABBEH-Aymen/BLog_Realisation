<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

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
}
