<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Afficher la liste des produits
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Afficher le formulaire pour créer un nouveau produit
    public function create()
    {
        return view('admin.products.create');
    }

    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produit créé avec succès.');
    }

    // Afficher le formulaire pour modifier un produit
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Mettre à jour un produit existant
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprimer un produit existant
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}


