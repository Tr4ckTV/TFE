@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des avis</h2>
        @forelse ($avis as $avisItem)
            <div class="avis">
                <p>{{ $avisItem->comment }}</p>
                <p>Écrit par : {{ $avisItem->user->name }}</p>
            </div>
        @empty
            <p>Aucun avis trouvé.</p>
        @endforelse

        <!-- Bouton pour créer un nouvel avis -->
        <a href="{{ route('avis.create') }}" class="btn btn-primary">Ajouter un avis</a>
    </div>
@endsection
