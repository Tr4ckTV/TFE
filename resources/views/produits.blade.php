@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nos Produits</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">{{ $product->price }} €</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
