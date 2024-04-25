@extends('layouts.app')

@section('content')
<style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

p strong {
    margin-right: 5px;
}

h2 {
    font-size: 20px;
    margin-top: 30px;
    margin-bottom: 10px;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

li {
    margin-bottom: 10px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}


tfoot td {
    font-weight: bold;
}

.highlight {
    background-color: #ffffcc;
    padding: 10px;
    margin-top : 1%
}

</style>

<div class="highlight">
    <p>Pour finaliser la commande et payer, veuillez appeler le <span class="bold">061 61 59 19</span>, ou envoyer un message sur messenger à <a href="https://www.facebook.com/elodie.toche">https://www.facebook.com/elodie.toche</a>.</p>
</div>

<div class="container">
    <h1>Détails de la Commande #{{ $commande->id }}</h1>
    <p><b>Statut:</b> {{ $commande->status }}</p>
    <p><b>Date:</b> {{ $commande->created_at->format('d/m/Y H:i:s') }}</p>
    <p><b>Utilisateur:</b> {{ $commande->user->name }}</p>
    <h2>Produits Commandés</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix Unité</th>
                <th>Quantité</th>
                <th>Promotion</th>
                <th>Prix (après promotion)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($commande->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }} €</td>
                <td>{{ $item->quantity }}</td>
                @php
                    $price = $item->product->is_promotion ? $item->product->discounted_price : $item->product->price;
                    $total += $price * $item->quantity;
                @endphp
                @if($item->product->is_promotion)
                    <td>{{ $item->product->discount_percentage }}% de réduction</td>
                    <td>{{ $item->product->discounted_price }} €</td>
                @else
                    <td>/</td>
                    <td>/</td>
                @endif
                <td>{{ $price * $item->quantity }} €</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td><b>Total:</b> {{ $total }} €</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
