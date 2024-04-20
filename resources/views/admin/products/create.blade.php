@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer un nouveau Produit</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <!-- Ajoutez d'autres champs au besoin -->
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
