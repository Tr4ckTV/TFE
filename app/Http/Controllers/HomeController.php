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

    public function nouveautes()
    {
        // Récupérer la date du premier jour du mois actuel
    $startDate = Carbon::now()->startOfMonth();

    // Récupérer les produits mis en ligne ce mois-ci
    $newProducts = Product::where('created_at', '>=', $startDate)->get();

    return view('nouveautes', compact('newProducts'));
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

    // Récupérer les produits filtrés avec pagination
    $products = $query->paginate(12); // Nombre de produits par page

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
        $cartItems = Panier::all();
        return view('panier', compact('cartItems'));
    }

    public function recherche(Request $request)
{
    $keywords = $request->input('keywords');

    // Recherchez les produits qui correspondent aux mots-clés
    $products = Product::where('name', 'like', '%' . $keywords . '%')
                        ->orWhere('description', 'like', '%' . $keywords . '%')
                        ->get();

    // Retournez la vue des résultats de la recherche avec les produits trouvés
    return view('recherche', compact('keywords', 'products'));
}


}
