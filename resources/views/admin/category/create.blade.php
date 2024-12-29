@extends('adminlte::page')

@section('title', 'Create Article')



@section('content')
<div class="card mt-5">
    <div class="card-body">
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
</div>
@stop
