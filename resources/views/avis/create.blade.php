@extends('layouts.app')

<style>
/* Styles pour la page "Laissez votre avis" */
.container {
    max-width: 600px; /* Largeur maximale du conteneur pour limiter la largeur du formulaire */
    margin: auto; /* Centrer le formulaire horizontalement */
    padding: 20px; /* Espacement intérieur du conteneur */
}

h2 {
    font-size: 24px; /* Taille de police pour le titre */
    margin-bottom: 20px; /* Espacement en bas du titre */
}

.form-group {
    margin-bottom: 20px; /* Espacement entre les groupes de champs */
}

label {
    font-weight: bold; /* Texte du libellé en gras */
}

textarea {
    resize: vertical; /* Autoriser le redimensionnement vertical du champ de texte */
}

textarea {
    resize: vertical; /* Autoriser le redimensionnement vertical du champ de texte */
    width: 100%; /* Définir la largeur de la zone de texte à 100% */
}

.btn-primary {
    background-color: #007bff; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte du bouton */
    border: none; /* Supprimer la bordure du bouton */
    padding: 10px 20px; /* Espacement intérieur du bouton */
    border-radius: 5px; /* Bordure arrondie du bouton */
    cursor: pointer; /* Curseur de souris en pointeur */
}

.btn-primary:hover {
    background-color: #0056b3; /* Couleur de fond du bouton au survol */
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
}

</style>

@section('content')
<div class="container">
    <h2>Laissez votre avis</h2>
    <form action="{{ route('avis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Votre avis :</label>
            <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
@endsection
