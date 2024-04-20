<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
        // Logique pour la page Promotions
    }

    public function produits()
    {
        $products = Product::all();
        return view('produits', compact('products'));
    }

    public function avis()
    {
        // Logique pour la page Avis
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
