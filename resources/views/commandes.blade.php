@extends('layouts.app')

@section('content')

<style>


.container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.highlight {
    background-color: #ffffcc;
    padding: 10px;
}

.bold {
    font-weight: bold; 
}

.dark-mode p
{
    color: black
}
</style>
<div class="container">
    <h1>Vos Commandes</h1>
    <div class="highlight">
        <p>Pour finaliser la commande et payer, veuillez appeler le <span class="bold">061 61 59 19</span>, ou envoyer un message sur messenger à <a href="https://www.facebook.com/elodie.toche">https://www.facebook.com/elodie.toche</a>.</p>
    </div>
    @if(count($commandes) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
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
