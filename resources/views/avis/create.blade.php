@extends('layouts.app')

<style>

.container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

textarea {
    resize: vertical;
}

textarea {
    resize: vertical;
    width: 100%;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

</style>

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
