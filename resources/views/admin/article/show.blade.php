@extends('adminlte::page')

@section('title', 'Détails de l\'Article')

@section('content_header')
    <h1>{{ $article->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5><strong>Catégorie :</strong> {{ $article->category->name ?? 'Non catégorisé' }}</h5>
            <h5><strong>Contenu :</strong></h5>
            <p>{{ $article->content }}</p>
            <h5><strong>Auteur :</strong> {{ $article->user->name ?? 'Utilisateur inconnu' }}</h5>
            <h5><strong>Tags :</strong></h5>
            <ul>
                @forelse($article->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @empty
                    <li>Aucun tag associé</li>
                @endforelse
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('article.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
@stop
