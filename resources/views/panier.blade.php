@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Votre Panier</h1>
    <form action="{{ route('commandes.store') }}" method="post">
    <a href="{{ route('commandes') }}" aria-label="Commandes">Voir ses commandes</a>
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
    @else
    <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
