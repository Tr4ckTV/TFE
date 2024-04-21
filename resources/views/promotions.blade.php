@extends('layouts.app')

<style>

</style>

@section('content')
    <div class="container">
        <h2>Promotions</h2>
        <div class="row">
            @foreach($promotedProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Prix: {{ $product->price }}€</p>
                            @if($product->is_promotion)
                                <p class="card-text">Promotion: {{ $product->discount_percentage }}% de réduction</p>
                                <p class="card-text">Prix après réduction: {{ $product->discounted_price }}€</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
