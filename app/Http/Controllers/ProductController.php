<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'is_promotion' => 'nullable|in:on,null',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'discounted_price' => 'nullable|numeric',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];


        $product->is_promotion = $request->has('is_promotion');

        if ($product->is_promotion) {
            $product->discount_percentage = $validatedData['discount_percentage'];
            $product->discounted_price = $validatedData['discounted_price'];
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = 'storage/' . $imagePath;
        }

        $product->save();

        $product->categories()->attach($validatedData['categories']);

        return redirect()->route('products.create')->with('success', 'Produit créé avec succès.');
    }



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Mettre à jour un produit existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'is_promotion' => 'nullable|in:on,null',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discounted_price' => 'nullable|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->categories()->sync($request->categories);


    $product->is_promotion = $request->has('is_promotion');

        if ($product->is_promotion) {
            $product->discount_percentage = $request->discount_percentage;
            $product->discounted_price = $request->discounted_price;
        } else {
        $product->discount_percentage = null;
        $product->discounted_price = null;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Le produit a été mis à jour avec succès.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès.');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', ['product' => $product]);
    }


}


