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
    border: 3px solid #ddd; /* Bordure autour de chaque produit */
    border-radius: 10px;
    overflow: hidden; /* Masquer le débordement du contenu */
    transition: transform 0.3s; /* Effet de transition au survol */
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrer les éléments horizontalement */
    background-color: #D4CBE2
}

    .dark-mode .product
    {
        background-color: #505D68
    }


    .product:hover {
        transform: translateY(-5px); /* Animation de translation vers le haut au survol */
    }

    .product img {
    height: 200px;
    width: 70%; /* Pour s'assurer que l'image occupe toute la largeur */
    object-fit: cover; /* Redimensionner l'image pour qu'elle remplisse complètement le conteneur */
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.product .details {
    padding: 20px;
    flex-grow: 1; /* Pour que les détails occupent tout l'espace disponible */
    text-align: center; /* Centrer le texte horizontalement */
}

    .product .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .product .price {
    font-size: 16px;
    color: #007bff;
    font-weight: bold;
    margin-top: 10px;
}

.dark-mode .product .price
    {
    color: #FFBD59;
    }

    .product .actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding-top: 10px;
}

.product .special-badge {
    background-color: #ffcc00;
    color: black;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
}

.product .badge {
    margin-top: 10px ;
    margin-bottom: 10px;
}

.product .special-badge1 {
    background-color: #ff8800;
    color: #fff;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
    margin-bottom: 5px;
}

.product .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 5px;
}

    .product .btn-primary:hover {
        background-color: #0056b3; /* Couleur de fond du bouton au survol */
    }

    .product .btn-primary:focus {
        outline: none; /* Supprimer le contour sur le focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
    }

    .filter-form {
    display: flex;
    justify-content: flex-end; /* Aligner le formulaire à droite */
    align-items: center;
}

.filter-form .form-group {
    margin-bottom: 0; /* Supprimer l'espacement sous le champ de filtrage */
}

.filter-form .form-control {
    width: auto; /* Largeur automatique pour le champ de filtrage */
    margin-right: 10px; /* Espacement entre le champ de filtrage et le bouton */
}

.filter-form .btn-reset {
    background-color: #dc3545; /* Couleur de fond pour le bouton de réinitialisation */
    color: #fff; /* Couleur du texte pour le bouton de réinitialisation */
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.filter-form .btn-reset:hover {
    background-color: #c82333; /* Couleur de fond du bouton de réinitialisation au survol */
}

.filter-form .btn-reset:focus {
    outline: none; /* Supprimer le contour sur le focus */
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5); /* Ombre autour du bouton de réinitialisation lorsqu'il est en focus */
}

</style>

    <div class="container">
        <h2>Nos Produits</h2>

        <form method="GET" class="filter-form" id="filterForm">
            <div class="form-group">
                <label for="category">Filtrer par catégorie :</label>
                <select class="form-control" id="category" name="category" onchange="submitForm()">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="btn btn-reset" onclick="resetForm()">Réinitialiser</button>
        </form>

        <!-- Liste des produits -->
        <div class="product-list">
            @foreach ($products as $product)
    <a href="{{ route('products.show', $product->id) }}" class="product">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        <div class="details">
            <span class="title">{{ $product->name }}</span>
            <p class="description">{{ $product->description }}</p>
            <p class="price">{{ $product->price }} €</p>
            <div class ="badge">
            @if ($product->is_promotion)
                <span class="special-badge">En promo</span>
            @endif
            </div>
        </div>
        @if ($product->quantity <= 0)
        <span class="special-badge1">Épuisé</span>
    @endif
    @if ($product->quantity > 0)
        <form action="{{ route('panier.add', $product->id) }}" method="post">
            @csrf
            <button type="submit" class="btn-primary">Ajouter au panier</button>
        </form>
    @endif
    </a>
@endforeach
        </div>
        <div class="pagination">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>

    <script>
        function submitForm() {
            document.getElementById("filterForm").submit();
        }

        function resetForm() {
            document.getElementById("category").selectedIndex = -1;
            document.getElementById("filterForm").submit();
        }
    </script>
@endsection
