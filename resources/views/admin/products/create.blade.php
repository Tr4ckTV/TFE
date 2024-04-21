@extends('layouts.app')

@section('content')
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

            <!-- Form Field for Promotion Percentage -->
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
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
            </div>

            <!-- Affichage du prix réduit -->
            <div class="form-group" id="discounted_price_field" style="display: none;">
                <label for="discounted_price">Prix réduit:</label>
                <input type="number" class="form-control" id="discounted_price" name="discounted_price">
            </div>

            <!-- Ajoutez d'autres champs au besoin -->
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
                calculateDiscountedPrice(); // Appelons la fonction de calcul lorsque la promotion est activée
            } else {
                discountFields.style.display = 'none';
                discountedPriceField.style.display = 'none';
            }
        });

        // Fonction pour calculer le prix réduit
        function calculateDiscountedPrice() {
            var price = parseFloat(document.getElementById('price').value);
            var percentage = parseFloat(document.getElementById('discount_percentage').value);
            var discountedPrice = price * (1 - percentage / 100);
            document.getElementById('discounted_price').value = discountedPrice.toFixed(2);
        }

        // Appelons la fonction de calcul lors de la saisie du pourcentage de réduction
        document.getElementById('discount_percentage').addEventListener('input', function() {
            calculateDiscountedPrice();
        });
    </script>
@endsection
