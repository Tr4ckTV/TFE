@extends('layouts.app')

<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .avis {
        border: 3px solid #ddd;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #D4CBE2;
        word-wrap: break-word;
        position: relative;
    }

    .dark-mode .avis {
        background-color: #ffffff60;
    }

    .avis p {
        margin-bottom: 10px;
        color: #000;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-primary:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .vide {
        margin-bottom: 20px;
    }

    .date {
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: #000;
        font-size: 12px;
    }
</style>
@section('content')
    <div class="container">
        <h2>Liste des avis</h2>
        @forelse ($avis->sortByDesc('created_at') as $avisItem)
            <div class="avis">
                <p>{{ $avisItem->comment }}</p>
                <p>Écrit par : {{ $avisItem->user->name }}</p>
                <p class="date">{{ $avisItem->created_at->format('d/m/Y H:i') }}</p>
            </div>
        @empty
            <p class="vide">Aucun avis trouvé.</p>
        @endforelse

        <a href="{{ route('avis.create') }}" class="btn btn-primary">Ajouter un avis</a>
    </div>
@endsection
