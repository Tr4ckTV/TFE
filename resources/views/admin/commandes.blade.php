@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des commandes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{ $commande->id }}</td>
                        <td>{{ $commande->user->name }}</td>
                        <td>{{ $commande->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $commande->status }}</td>
                        <td>
                            @if($commande->status === 'en attente')
                                <form action="{{ route('commandes.validate', $commande->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </form>
                                <form action="{{ route('commandes.reject', $commande->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Refuser</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
