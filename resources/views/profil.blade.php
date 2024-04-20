@extends('layouts.app')

@section('content')

<style>
    /* Styles spécifiques pour la page profil */

/* En-tête */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Conteneur du profil */
main {
    max-width: 600px;
    margin: 0 auto;
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

main a {
    display: block;
    margin-bottom: 10px;
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

main a:hover {
    text-decoration: underline;
}
</style>

<main>
    @if(Auth::check()) <!-- Vérifie si l'utilisateur est connecté -->
        <h1>Bienvenue sur votre profil</h1>
        <!-- Contenu du profil -->
        <p>Nom d'utilisateur: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}">Déconnexion</a>

        @if(Auth::user()->type_membre_id == 1) <!-- Vérifie si l'utilisateur est administrateur -->
            <!-- Affiche des liens vers les sections administratives -->
            <p><a href="{{ route('admin.dashboard') }}">Tableau de bord administrateur</a></p>
            <p><a href="{{ route('products.index') }}">Gestion des produits</a></p>
            <!-- Ajoutez d'autres liens vers les sections administratives au besoin -->
        @endif

    @endif
</main>

@endsection
