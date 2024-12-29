@extends('adminlte::page')

@section('title', 'Create Article')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <h5 class="card-title">Category List</h5>

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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <!-- Add action buttons (Edit, Delete, etc.) -->
                            <!-- Delete action (can be added later) -->
                            {{-- <form action="{{ route('category.delete', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>                             --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button to create new category -->
    </div>
</div>
@stop

