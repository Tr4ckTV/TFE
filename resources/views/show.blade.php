@extends('layouts.app')

@section('content')
<style>
    .container {
    max-width: 800px; /* Largeur maximale du conteneur */
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

</style>
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
