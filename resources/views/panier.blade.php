@extends('layouts.app')

@section('content')

<style>
    /* CSS pour la liste des commandes */

    /* Titre */
    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Container */
    .container {
        margin: 0 auto;
        max-width: 800px;
    }

    /* Tableau */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* En-tête du tableau */
    th {
        background-color: #f2f2f2;
        padding: 10px;
        text-align: left;
    }

    /* Cellules du tableau */
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    /* Boutons d'action */
    .actions {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    /* Bouton Valider */
    .btn-success {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        display: block;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    /* Bouton Refuser */
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        display: block;
        margin: 0 auto;
        margin-top: 5px;
        margin-bottom: 20px;
    }

    /* Bouton Voir en détail */
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
    }

    /* Message d'erreur */
    .error-message {
        color: #dc3545;
        margin-top: 10px;
        text-align: center;
    }

    /* Liens */
    a {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #007bff;
        text-decoration: none;
    }

</style>
<div class="container">
    <h1>Votre Panier</h1>
    <form action="{{ route('commandes.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success">Passer à la commande</button>
    </form>

    @if(count($cartItems) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->quantity * $item->product->price }}</td>
                <td>
                    <form action="{{ route('panier.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                    <form action="{{ route('panier.remove', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('commandes') }}" aria-label="Commandes">Voir mes commandes précédentes</a>
    @else
    <p>Votre panier est vide.</p>
    <a href="{{ route('commandes') }}" aria-label="Commandes">Voir mes commandes précédentes</a>
    @endif
</div>
@endsection
