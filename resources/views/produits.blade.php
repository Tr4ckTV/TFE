@extends('layouts.app')

<style>
    /* Styles pour la liste de produits */
    .product-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* 5 produits par ligne */
        grid-gap: 20px; /* Espacement entre les produits */
    }

    .product {
        border: 1px solid #ddd; /* Bordure autour de chaque produit */
        padding: 20px;
        border-radius: 10px;
    }

    .product img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product .details {
        margin-top: 10px;
    }

    .product .title {
        font-size: 18px;
        font-weight: bold;
    }

    .product .price {
        font-size: 16px;
        color: #007bff; /* Couleur du prix */
    }

    .product .description {
        font-size: 14px;
        color: #666; /* Couleur de la description */
    }

    .product .special-badge {
        background-color: #ffcc00; /* Couleur de l'étiquette spéciale */
        color: #fff;
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 5px;
        position: relative;
        top: 10px;
        right: 10px;
    }

    .product .special-badge1 {
        background-color: #ff8800; /* Couleur de l'étiquette spéciale */
        color: #fff;
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 5px;
        position: relative;
        top: 10px;
        right: 10px;
    }

</style>

@section('content')
    <div class="container">
        <h2>Nos Produits</h2>
        <!-- Form for filtering products by category -->
        <form action="{{ route('produits') }}" method="GET">
            <div class="form-group">
                <label for="category">Filtrer par catégorie:</label>
                <select class="form-control" id="category" name="category">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    <!-- Ajout de catégories spéciales -->
                    <option value="special1">Catégorie Spéciale 1</option>
                    <option value="special2">Catégorie Spéciale 2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>

        <!-- Liste des produits -->
        <div class="product-list">
            @foreach ($products as $product)
    <a href="{{ route('products.show', $product->id) }}" class="product"> <!-- Ajout du lien vers la page show du produit -->
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        <div class="details">
            <span class="title">{{ $product->name }}</span>
            <p class="description">{{ $product->description }}</p>
            <p class="price">{{ $product->price }} €</p>
            @if ($product->quantity == 0)
                <span class="special-badge1">Épuisé</span>
            @elseif ($product->is_promotion)
                <span class="special-badge">En promo</span>
            @endif
        </div>
    </a>
@endforeach
        </div>
    </div>
@endsection
