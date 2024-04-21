@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laissez votre avis</h2>
    <form action="{{ route('avis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Votre avis :</label>
            <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
@endsection
