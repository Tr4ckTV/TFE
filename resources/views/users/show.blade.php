@extends('layouts.app')

@section('content')
<style>
        /* Styles pour la page de détails du membre */
        .container {
            text-align: center;
            color: #FFF; /* Texte blanc */
        }

        .card {
            width: 300px;
            margin: 0 auto;
            background-color: #333; /* Fond gris foncé */
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .card-title {
            color: #FFBB38; /* Titre en orange */
            font-size: 24px; /* Taille du texte augmentée */
            margin-bottom: 15px; /* Espacement en bas */
        }

        .card-text {
            color: #FFF; /* Texte blanc */
            margin-bottom: 10px; /* Espacement en bas */
        }

        .btn-primary {
            background-color: #FFBB38;
            border-color: #FFBB38;
            color: black;
            padding: 10px 20px; /* Augmentation du rembourrage */
            border-radius: 6px;
            transition: background-color 0.3s ease; /* Transition fluide */
            text-decoration: none;

        }

        .btn-primary:hover, .btn-primary:active {
            background-color: initial;
            color: #FFBB38;
        }
    </style>

    <div class="container">
        <h1 style="text-align: center;">Détails du Membre</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nom : {{ $user->name }}</h5>
                <p class="card-text">Grade : {{ $user->typeMembre->nom }}</p>
                <p class="card-text">Matricule : {{ $user->matricule }}</p>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>
@endsection
