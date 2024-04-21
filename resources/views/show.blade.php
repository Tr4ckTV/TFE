@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Détails du Produit</h2>
        <div class="product-details">
            <div>
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="details">
                <h3>{{ $product->name }}</h3>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Prix:</strong> {{ $product->price }} €</p>
                @if ($product->is_promotion)
                    <p><strong>État:</strong> En promotion</p>
                @else
                    <p><strong>État:</strong> Normal</p>
                @endif
                <p><strong>Catégorie:</strong>
                    @if ($product->categories->isNotEmpty())
                        {{ $product->categories->first()->name }}
                    @else
                        Non spécifiée
                    @endif

                    <p><strong>Quantité:</strong> {{ $product->quantity }}</p>
                </p>

            </div>
        </div>
    </div>
@endsection
