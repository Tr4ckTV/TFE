@extends('layouts.app')

@section('content')
<style>
        /* Styles pour la page de modification du membre */
        .container {
            text-align: center;
            color: #ffde59;
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
            color: black;
        }

        button:hover,
        button:active {
            background-color: initial;
            color: #FFBB38;
        }
    </style>

    <div class="container">
        <h1>Modifier le Membre</h1>
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="matricule">Matricule</label><br>
                <input type="text" class="form-control" id="matricule" name="matricule" value="{{ $user->matricule }}" required>
            </div>
            <div class="form-group">
                <label for="name">Nom</label><br>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="type_membre_id">Grade</label><br>
                <select class="form-control" id="type_membre_id" name="type_membre_id" required>
                    @foreach($typesMembre as $id => $nom)
                        <option value="{{ $id }}" @if($id == "$user->type_membre_id") selected @endif> {{ $nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
