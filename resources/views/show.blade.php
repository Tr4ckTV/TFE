@extends('layouts.app')

@section('content')
<style>
    .container {
    max-width: 900px; /* Largeur maximale du conteneur */
    margin: auto; /* Centrer le contenu horizontalement */
    padding: 20px; /* Espacement intérieur du conteneur */
}

h2 {
    font-size: 24px; /* Taille de police pour le titre */
    margin-bottom: 20px; /* Espacement en bas du titre */
}

.product-details {
    display: flex; /* Utiliser le modèle de boîte flexible */
    justify-content: space-between; /* Espacement égal entre les éléments */
    align-items: center; /* Aligner les éléments verticalement */
}

.product-details img {
    max-width: 300px; /* Largeur maximale de l'image */
    height: auto; /* Hauteur automatique pour préserver les proportions */
}

.details {
    flex: 1; /* Prendre autant d'espace que possible */
    margin-left: 20px; /* Espacement à gauche */
}

.details h3 {
    font-size: 20px; /* Taille de police pour le titre */
    margin-bottom: 10px; /* Espacement en bas du titre */
}

.details p {
    margin-bottom: 10px; /* Espacement en bas de chaque paragraphe */
}

.details strong {
    font-weight: bold; /* Mettre en gras le texte fort */
}

.details p:last-child {
    margin-bottom: 0; /* Supprimer l'espacement en bas du dernier paragraphe */
}

 .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 5px;
}

.btn-primary:hover {
        background-color: #0056b3; /* Couleur de fond du bouton au survol */
    }

 .btn-primary:focus {
        outline: none; /* Supprimer le contour sur le focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
    }

    .btn-secondary {
    background-color: #ff2d2d;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-decoration: none !important;
}

.btn-secondary:hover {
        background-color: #b30000; /* Couleur de fond du bouton au survol */
    }

 .btn-secondary:focus {
        outline: none; /* Supprimer le contour sur le focus */
        box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
    }

</style>
    <div class="container">
        <h2>Détails du Produit</h2>
        <div class="product-details">
            <div>
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="details">
                <h3>{{ $product->name }}</h3>
                <p><b>Description:</b> {{ $product->description }}</p>
                <p><b>Prix:</b> {{ $product->price }} €</p>
                @if ($product->is_promotion)
                    <p><b>État:</b> En promotion</p>
                    <span><b>Prix après réduction :</b><p class="price">{{ $product->discounted_price }}€</p></span>
                @else
                    <p><b>État:</b> Normal</p>
                @endif
                <p><b>Catégorie:</b>
                    @if ($product->categories->isNotEmpty())
                        {{ $product->categories->first()->name }}
                    @else
                        Non spécifiée
                    @endif

                    <p><b>Quantité:</b> {{ $product->quantity }}</p>
                </p>

                @if ($product->quantity > 0)
                <form action="{{ route('panier.add', $product->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn-primary">Ajouter au panier</button>
                </form>
                @endif

                @if(Auth::check() && Auth::user()->type_membre_id == 1)
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Modifier</a>
                @endif

            </div>
        </div>
    </div>
@endsection
