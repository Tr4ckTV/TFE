@extends('layouts.app')

@section('content')
<style>
    /* CSS pour la liste des commandes */

/* Titre */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Tableau */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Boutons d'action */
.actions {
    display: flex;
    gap: 10px;
}

/* Bouton Valider */
.btn-success {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

/* Bouton Refuser */
.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    margin-top: 5px;
    margin-bottom: 10px;
}

/* Bouton Voir en détail */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
}

</style>
    <div class="container">
        <h1>Liste des commandes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
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
                                    @foreach($commande->items as $item)
                                    @if($item->product->quantity < $item->quantity)
                                        <p>Un/des produit(s) {{ $item->product->name }} est/sont en rupture de stock.</p>
                                    @endif
                                @endforeach
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </form>
                                <form action="{{ route('commandes.reject', $commande->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Refuser</button>
                                </form>
                            @endif
                            <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary">Voir en détail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $commandes->links() }}
    </div>

@endsection
