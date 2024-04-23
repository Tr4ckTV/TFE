@extends('layouts.app')

@section('content')
<style>
    /* Styles pour les résultats de recherche */
    .container {
        margin-top: 20px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .product-link {
        color: #007bff;
        text-decoration: none;
    }

    .product-link:hover {

text-decoration: underline;
}
</style>
<div class="container">
    <h1>Résultats de la recherche</h1>
    <p>Résultats pour la recherche : "{{ $keywords }}"</p>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td><a href="{{ route('products.show', $product->id) }}" class="product-link">Voir en détail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
