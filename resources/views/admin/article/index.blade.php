@extends('adminlte::page')

@section('title', 'Liste des Articles')

@section('content_header')
    <h1>Liste des Articles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Articles</h3>
            <a href="{{ route('article.create') }}" class="btn btn-success btn-sm float-right">Créer un nouvel article</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name ?? 'Non catégorisé' }}</td>
                            <td>
                                <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-info">Afficher</a>
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous supprimer cet article ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucun article trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
