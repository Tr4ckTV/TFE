@extends('layouts.app')

@section('content')

<style>

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .btn-primary {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .pagination .page-link {
        color: #007bff;
        border: 1px solid #007bff;
        margin: 0 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    td.description {
        max-width: 200px;
        overflow: hidden; 
        text-overflow: ellipsis;
        white-space: nowrap;
    }

</style>
    <div class="container">
        <h2>Liste des Produits</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Ajouter un Produit</a>
        @if ($products->isEmpty())
            <p>Aucun produit trouvé.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Promotion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="description">{{ $product->description }}</td>
                            <td>{{ $product->price }} €</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->is_promotion ? 'Oui' : 'Non' }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
