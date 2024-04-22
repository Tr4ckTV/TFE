@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vos Commandes</h1>
    @if(count($commandes) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
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
