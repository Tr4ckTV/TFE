@extends('layouts.app')

@section('content')
<style>
    /* Styles pour la liste de produits */
    .product-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* 5 produits par ligne */
        grid-gap: 20px; /* Espacement entre les produits */
    }

    .product {
        border: 1px solid #ddd; /* Bordure autour de chaque produit */
        border-radius: 10px;
        overflow: hidden; /* Masquer le débordement du contenu */
        transition: transform 0.3s; /* Effet de transition au survol */
        text-decoration: none;
        color: inherit;
    }

    .product:hover {
        transform: translateY(-5px); /* Animation de translation vers le haut au survol */
    }

    .product img {
        height: 200px;
    }

    .product .details {
        padding: 15px;
    }

    .product .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .product .description {
        font-size: 14px;
        color: black;
        margin-bottom: 10px;
        max-height: 60px; /* Limite de hauteur pour la description */
        overflow: hidden; /* Masquer le texte qui dépasse */
        text-overflow: ellipsis; /* Afficher "..." pour indiquer que le texte est coupé */
    }

    .product .price {
        font-size: 16px;
        color: #007bff;
        font-weight: bold;
    }

    .product .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .product .special-badge {
        background-color: #ffcc00; /* Couleur de l'étiquette spéciale */
        color: #fff;
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .product .special-badge1 {
        background-color: #ff8800; /* Couleur de l'étiquette spéciale */
        color: #fff;
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .product .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s; /* Effet de transition */
    }

    .product .btn-primary:hover {
        background-color: #0056b3; /* Couleur de fond du bouton au survol */
    }

    .product .btn-primary:focus {
        outline: none; /* Supprimer le contour sur le focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
    }
</style>

<div class="container">
    <h2>Nouveautés</h2>
    <div class="product-list">
        @foreach ($newProducts->reverse() as $product)
        <a href="{{ route('products.show', $product->id) }}" class="product">
        <div>
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <div class="details">
                <span class="title">{{ $product->name }}</span>
                <p class="description">{{ $product->description }}</p>
                <p class="price">{{ $product->price }} €</p>
                @if ($product->quantity <= 0)
                <span class="special-badge1">Épuisé</span>
                @elseif ($product->is_promotion)
                <span class="special-badge">En promo</span>
                @endif
                @if ($product->quantity > 0)
                <form action="{{ route('panier.add', $product->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
