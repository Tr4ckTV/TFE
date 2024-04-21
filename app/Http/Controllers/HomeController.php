<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Avis;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function nouveautes()
    {
        // Logique pour la page Nouveautés
    }

    public function promotions()
    {
        $promotedProducts = Product::where('is_promotion', true)->get();
        return view('promotions', ['promotedProducts' => $promotedProducts]);
    }

    public function produits(Request $request)
{
    // Récupérer tous les produits
    $query = Product::query();

    // Filtrer par catégorie si une catégorie est sélectionnée
    if ($request->has('category')) {
        $categoryId = $request->input('category');
        $query->whereHas('categories', function ($query) use ($categoryId) {
            $query->where('categories.id', $categoryId); // Spécifiez la table 'categories'
        });
    }

    // Récupérer les produits filtrés
    $products = $query->get();

    // Récupérer toutes les catégories
    $categories = Category::all();

    // Passer les produits et les catégories à la vue
    return view('produits', compact('products', 'categories'));
}

    public function avis()
    {
        $avis = Avis::with('user')->get();
        return view('avis', compact('avis'));
    }

    public function profil()
    {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            // Si oui, retournez la vue profil avec les données de l'utilisateur
            return view('profil');
        } else {
            // Si non, redirigez vers la page de connexion
            return redirect()->route('login');
        }
    }

    public function panier()
    {
        // Logique pour la page Panier
    }

}
