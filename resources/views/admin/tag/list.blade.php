@extends('adminlte::page')

@section('title', 'Create Article')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <h5 class="card-title">Tag List</h5>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Categories Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <!-- Add action buttons (Edit, Delete, etc.) -->
                            {{-- <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                            <!-- Delete action (can be added later) -->
                            <form action="{{ route('tag.delete', $tag->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button to create new category -->
    </div>
</div>
@stop

