@extends('layouts.app')

@section('content')
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
