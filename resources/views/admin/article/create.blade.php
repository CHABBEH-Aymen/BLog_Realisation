@extends('adminlte::page')

@section('title', 'Create Article')

@section('content_header')
    <h1>Create New Article</h1>
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ajouter Article</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" placeholder="Enter content" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Categories</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <label for="tags" class="form-label">Sélectionnez les tags :</label>
                <select id="tags" name="tags[]" class="form-select" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>

@endsection
