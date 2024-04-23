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
</style>

<div class="container">
    <h1>Détails de la Commande #{{ $commande->id }}</h1>
    <p><strong>Statut:</strong> {{ $commande->status }}</p>
    <p><strong>Date:</strong> {{ $commande->created_at->format('d/m/Y H:i:s') }}</p>
    <h2>Produits Commandés</h2>
    <ul>
        @foreach($commande->items as $item)
        <li>{{ $item->product->name }} - {{ $item->quantity }}</li>
        @endforeach
    </ul>
</div>
@endsection
