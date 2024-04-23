@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultats de la recherche</h1>
    <p>Résultats pour la recherche : "{{ $keywords }}"</p>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
