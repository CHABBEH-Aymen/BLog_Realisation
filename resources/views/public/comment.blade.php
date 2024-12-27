@extends('layouts.public')

@section('content')

<div>
    <form action="{{ route('comment.store') }}" method="POST" class="form-group">
        @csrf
        <div class="form-group">
            <label for="comment">Ajouter Commentaire</label>
            <textarea class="form-control" id="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

@endsection