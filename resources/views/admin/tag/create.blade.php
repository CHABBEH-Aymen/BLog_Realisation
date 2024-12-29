@extends('adminlte::page')

@section('title', 'Create Article')



@section('content')
<div class="card mt-5">
    <div class="card-body mt-8">
        <form action="{{route('tags.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" id="title" class="form-control" placeholder="Enter name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Tag</button>
        </form>
    </div>
</div>
@stop
