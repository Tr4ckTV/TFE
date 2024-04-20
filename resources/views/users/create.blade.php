@extends('layouts.app')

@section('content')
<style>
        /* Styles pour la page de création d'un membre */
        .container {
            text-align: center;
        }

        form {
            border: 5px solid #FFBB38;
            border-radius: 20px;
            padding: 20px;
            width: 300px;
            margin: 20px auto;
            text-align: center;
        }

        input, select {
            width: 70%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
        }

        button {
            width: 40%;
            padding: 12px;
            background: #FFBB38;
            border: 1px solid #FFBB38;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            text-align: center;
        }

        button:hover,
        button:active {
            background-color: initial;
            color: #FFBB38;
        }
    </style>

    <div class="container">
        <h1>Ajouter un Membre</h1>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label><br>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label><br>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="type_membre_id">Grade</label><br>
                <select class="form-control" id="type_membre_id" name="type_membre_id" required>
                    @foreach($typesMembre as $id => $nom)
                        <option value="{{ $id }}" selected> {{ $nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
