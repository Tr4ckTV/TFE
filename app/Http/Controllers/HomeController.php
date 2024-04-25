<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Avis;
use App\Models\Panier;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function nouveautes(Request $request)
    {
        $startDate = Carbon::now()->startOfMonth();

        $query = Product::where('created_at', '>=', $startDate);


        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            });
        }

        $newProducts = $query->paginate(12);
        $categories = Category::all();

        return view('nouveautes', compact('newProducts', 'categories'));
    }

    public function promotions(Request $request)
    {
        $query = Product::where('is_promotion', true);

        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            });
        }

        $promotedProducts = $query->paginate(8);
        $categories = Category::all();

        return view('promotions', compact('promotedProducts', 'categories'));
    }

    public function produits(Request $request)
    {

        $query = Product::query();

        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('categories.id', $categoryId); // Spécifiez la table 'categories'
            });
        }


        $products = $query->paginate(12);

        $categories = Category::all();

        return view('produits', compact('products', 'categories'));
    }


    public function avis()
    {
        $avis = Avis::with('user')->get();
        return view('avis', compact('avis'));
    }

    public function profil()
    {
        if (Auth::check()) {
            return view('profil');
        } else {
            return redirect()->route('login');
        }
    }

    public function panier()
    {

        $cartItems = Panier::all();
        $product = Product::first();
        return view('panier', compact('cartItems', 'product'));
    }

    public function recherche(Request $request)
{
    $keywords = $request->input('keywords');

    $products = Product::where('name', 'like', '%' . $keywords . '%')
                        ->orWhere('description', 'like', '%' . $keywords . '%')
                        ->get();

    return view('recherche', compact('keywords', 'products'));
}
}
