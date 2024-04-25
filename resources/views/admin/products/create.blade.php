@extends('layouts.app')

@section('content')
<style>

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.alert-success {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-check {
    margin-bottom: 20px;
}

#discount_fields,
#discounted_price_field {
    display: none;
}

.btn-primary {
    margin-top: 20px;
}

</style>
    <div class="container">
        <h2>Créer un nouveau Produit</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="categories">Catégories:</label>
                <select class="form-control" id="categories" name="categories[]" multiple required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_promotion" name="is_promotion">
                <label class="form-check-label" for="is_promotion">
                    Promotion
                </label>
            </div>

            <div class="form-group" id="discount_fields" style="display: none;">
                <label for="discount_percentage">Pourcentage de réduction:</label>
                <input type="number" class="form-control" id="discount_percentage" name="discount_percentage">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="quantity">Quantité:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="form-group" id="discounted_price_field" style="display: none;">
                <label for="discounted_price">Prix réduit:</label>
                <input type="number" class="form-control" id="discounted_price" name="discounted_price">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <script>
        document.getElementById('is_promotion').addEventListener('change', function() {
            var discountFields = document.getElementById('discount_fields');
            var discountedPriceField = document.getElementById('discounted_price_field');

            if (this.checked) {
                discountFields.style.display = 'block';
                discountedPriceField.style.display = 'block';
                calculateDiscountedPrice();
            } else {
                discountFields.style.display = 'none';
                discountedPriceField.style.display = 'none';
            }
        });

        function calculateDiscountedPrice() {
            var price = parseFloat(document.getElementById('price').value);
            var percentage = parseFloat(document.getElementById('discount_percentage').value);
            var discountedPrice = price * (1 - percentage / 100);
            document.getElementById('discounted_price').value = discountedPrice.toFixed(2);
        }

        document.getElementById('discount_percentage').addEventListener('input', function() {
            calculateDiscountedPrice();
        });
    </script>
@endsection
