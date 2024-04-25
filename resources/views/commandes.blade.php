@extends('layouts.app')

@section('content')

<style>
/* CSS pour la liste des commandes */

.container {
    max-width: 800px; /* Largeur maximale du conteneur */
    margin: auto; /* Centrer le contenu horizontalement */
    padding: 20px; /* Espacement intérieur du conteneur */
}

h1 {
    font-size: 24px; /* Taille de police pour le titre */
    margin-bottom: 20px; /* Espacement en bas du titre */
}

.table {
    width: 100%; /* Largeur totale du tableau */
    border-collapse: collapse; /* Fusionner les bordures des cellules */
    margin-top: 20px; /* Espacement en haut du tableau */
}

.btn-primary {
    background-color: #007bff; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte du bouton */
    border: none; /* Supprimer la bordure du bouton */
    padding: 5px 10px; /* Espacement intérieur du bouton */
    border-radius: 5px; /* Bordure arrondie du bouton */
    text-decoration: none; /* Supprimer la soulignement du texte */
}

.btn-primary:hover {
    background-color: #0056b3; /* Couleur de fond du bouton au survol */
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Ombre autour du bouton lorsqu'il est en focus */
}

.highlight {
    background-color: #ffffcc; /* Couleur de mise en évidence */
    padding: 10px; /* Espacement intérieur */
}

.bold {
    font-weight: bold; /* Mettre en gras */
}

.dark-mode p
{
    color: black
}
</style>
<div class="container">
    <h1>Vos Commandes</h1>
    <div class="highlight">
        <p>Pour finaliser la commande et payer, veuillez appeler le <span class="bold">061 61 59 19</span>, ou envoyer un message sur messenger à <a href="https://www.facebook.com/elodie.toche">https://www.facebook.com/elodie.toche</a>.</p>
    </div>
    @if(count($commandes) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->created_at->format('d/m/Y H:i:s') }}</td>
                <td>{{ $commande->status }}</td>
                <td>
                    <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary">Voir Détails</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Vous n'avez aucune commande.</p>
    @endif
</div>
@endsection
