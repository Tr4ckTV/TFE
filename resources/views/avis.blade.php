@extends('layouts.app')

<style>
    /* Styles pour la liste des avis */
.container {
    max-width: 800px; /* Largeur maximale du conteneur pour limiter la largeur de la liste des avis */
    margin: auto; /* Centrer la liste horizontalement */
    padding: 20px; /* Espacement intérieur du conteneur */
}

h2 {
    font-size: 24px; /* Taille de police pour le titre */
    margin-bottom: 20px; /* Espacement en bas du titre */
}

.avis {
    border: 1px solid #ddd; /* Bordure autour de chaque avis */
    padding: 15px; /* Espacement intérieur de chaque avis */
    margin-bottom: 20px; /* Espacement entre les avis */
    border-radius: 5px; /* Bordure arrondie */
}

.avis p {
    margin-bottom: 10px; /* Espacement entre les paragraphes */
}

.btn-primary {
    background-color: #007bff; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte du bouton */
    border: none; /* Supprimer la bordure du bouton */
    padding: 10px 20px; /* Espacement intérieur du bouton */
    border-radius: 5px; /* Bordure arrondie du bouton */
    text-decoration: none; /* Supprimer la soulignement du texte */
}

.btn-primary:hover {
    background-color: #0056b3; /* Couleur de fond du bouton au survol */
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
}

.vide {
    margin-bottom: 20px;
}

</style>
@section('content')
    <div class="container">
        <h2>Liste des avis</h2>
        @forelse ($avis as $avisItem)
            <div class="avis">
                <p>{{ $avisItem->comment }}</p>
                <p>Écrit par : {{ $avisItem->user->name }}</p>
            </div>
        @empty
            <p class="vide">Aucun avis trouvé.</p>
        @endforelse

        <!-- Bouton pour créer un nouvel avis -->
        <a href="{{ route('avis.create') }}" class="btn btn-primary">Ajouter un avis</a>
    </div>
@endsection
