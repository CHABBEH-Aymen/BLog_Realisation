@extends('adminlte::page')

@section('title', 'Modifier l\'Article')

@section('content_header')
    <h1>Modifier l'Article</h1>
@stop

@section('content')
    <form action="{{ route('article.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Catégorie</label>
            <select name="category" id="category" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('article.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
@stop
