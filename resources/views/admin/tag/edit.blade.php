@extends('adminlte::page')

@section('title', 'Edit Tag')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <h5 class="card-title">Edit Tag</h5>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Form -->
        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $tag->name) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update Tag</button>
            <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@stop
