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

    /* Style pour la colonne "Mise à jour quantité" */
td.update-quantity {
    text-align: center;
}

/* Style pour le champ de quantité */
td.update-quantity input[type="number"] {
    width: 60px; /* Ajustez la largeur selon vos préférences */
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

/* Style pour les boutons "Mettre à jour" et "Supprimer" */
td.update-quantity form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

td.update-quantity form button {
    margin-top: 5px;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

td.update-quantity form button.btn-primary {
    background-color: #007bff;
    color: #fff;
}

td.update-quantity form button.btn-danger {
    background-color: #dc3545;
    color: #fff;
}


</style>
<div class="container">
    <h1>Votre Panier</h1>
    <form action="{{ route('commandes.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success">Passer à la commande</button>
    </form>

    @if(count($cartItems) > 0)
    @php
    $total = 0; // Initialiser le total à zéro
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Promotion</th>
                <th>Prix (après promotion)</th>
                <th>Total</th>
                <th>Mise à jour quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }}</td>
                <td>{{ $item->quantity }}</td>
                @php
                $price = $item->product->is_promotion ? $item->product->discounted_price : $item->product->price;
                $total += $price * $item->quantity; // Calculer le total en prenant en compte le prix réduit
                @endphp
                @if($item->product->is_promotion)
                <td>
                    <span>Promotion: {{ $item->product->discount_percentage }}% de réduction</span>
                </td>
                <td>
                    <span>{{ $item->product->discounted_price }} €</span>
                </td>
                @else
                <td>
                    <span>/</span>
                </td>
                <td>
                    <span>/</span>
                </td>
                @endif
                <td>{{ $price * $item->quantity }}</td>
                <td class="update-quantity">
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
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td>Total: {{ $total }} €</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <a href="{{ route('commandes') }}" aria-label="Commandes">Voir mes commandes précédentes</a>
    @else
    <p>Votre panier est vide.</p>
    <a href="{{ route('commandes') }}" aria-label="Commandes">Voir mes commandes précédentes</a>
    @endif
</div>

@endsection
