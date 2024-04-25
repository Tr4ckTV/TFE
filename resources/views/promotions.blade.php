@extends('layouts.app')

@section('content')
<style>
    .product-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 20px;
    }

    .product {
    border: 3px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s;
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #D4CBE2
}

    .dark-mode .product
    {
        background-color: #505D68
    }

    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product img {
    height: 200px;
    width: 70%;
    object-fit: cover;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.product .details {
    padding: 20px;
    flex-grow: 1;
    text-align: center;
}

    .product .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .product .price
    {
    font-size: 16px;
    color: #007bff;
    font-weight: bold;
    margin-top: 10px;
    }

    .dark-mode .product .price
    {
    color: #FFBD59;
    }

.product .actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding-top: 10px;
}

.product .special-badge {
    background-color: #ffcc00;
    color: black;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
}

.product .badge {
    margin-top: 10px ;
    margin-bottom: 10px;
}

.product .special-badge1 {
    background-color: #ff8800;
    color: #fff;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
    margin-bottom: 5px;
}

.product .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 5px;
}

    .product .btn-primary:hover {
        background-color: #0056b3;
    }

    .product .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .filter-form {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.filter-form .form-group {
    margin-bottom: 0;
}

.filter-form .form-control {
    width: auto;
    margin-right: 10px;
}

.filter-form .btn-reset {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.filter-form .btn-reset:hover {
    background-color: #c82333;
}

.filter-form .btn-reset:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
}
</style>

<div class="container">
    <h2>Promotions</h2>

    <form method="GET" class="filter-form" id="filterForm">
        <div class="form-group">
            <label for="category">Filtrer par catégorie :</label>
            <select class="form-control" id="category" name="category" onchange="submitForm()">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-reset" onclick="resetForm()">Réinitialiser</button>
    </form>

    <div class="product-list">
        @foreach($promotedProducts as $product)
            <a href="{{ route('products.show', $product->id) }}" class="product">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <div class="details">
                        <h5 class="title">{{ $product->name }}</h5>
                        <p class="description">{{ $product->description }}</p>
                        @if($product->is_promotion)
                        <div class ="badge">
                            <span class="special-badge">Promotion: {{ $product->discount_percentage }}% de réduction</span>
                        </div>
                            <span>Prix après réduction :<p class="price">{{ $product->discounted_price }}€</p></span>
                        @endif
                    </div>
                    @if ($product->quantity <= 0)
                        <span class="special-badge1">Épuisé</span>
                    @endif
                    @if ($product->quantity > 0)
                        <form action="{{ route('panier.add', $product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn-primary">Ajouter au panier</button>
                        </form>
                    @endif
            </a>
        @endforeach
    </div>
    <div class="pagination">
        {{ $promotedProducts->appends(request()->input())->links() }}
    </div>
</div>


<script>
    function submitForm() {
        document.getElementById("filterForm").submit();
    }

    function resetForm() {
        document.getElementById("category").selectedIndex = -1;
        document.getElementById("filterForm").submit();
    }
</script>
@endsection
