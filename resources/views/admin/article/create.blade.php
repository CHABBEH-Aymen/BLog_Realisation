@extends('adminlte::page')

@section('title', 'Create Article')

@section('content_header')
    <h1>Create New Article</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Article Form</h3>
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
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    <!-- Add categories dynamically -->
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" name="tags" id="tags" class="form-control" placeholder="Enter tags">
            </div>
            <button type="submit" class="btn btn-primary">Create Article</button>
        </form>
    </div>
</div>
@stop
