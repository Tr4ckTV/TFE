@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des Produits</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Ajouter un Produit</a>
        <div class="product-container">
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{ route('products.show', $product) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="product-details">
                        <h5 class="product-title">{{ $product->name }}</h5>
                        <p class="product-description">{{ $product->description }}</p>
                        <p class="product-price">
                            @if ($product->is_promotion)
                                <span class="product-promotion">Promotion</span>
                                <span class="product-discounted-price">{{ $product->discounted_price }} €</span>
                                <span>{{ $product->price }} €</span>
                            @else
                                {{ $product->price }} €
                            @endif
                        </p>
                        <div class="product-actions">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
