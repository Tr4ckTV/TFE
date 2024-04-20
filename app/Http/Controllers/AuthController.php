<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // L'utilisateur est connecté, rediriger vers la page d'accueil
            return redirect()->route('profil');
        }

        // La connexion a échoué, retourner à la page de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations de connexion fournies ne sont pas valides.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
}

    public function register(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création d'un nouvel utilisateur avec les données validées
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Authentification de l'utilisateur nouvellement créé
        Auth::login($user);

        // Redirection vers la page de profil après inscription réussie
        return redirect()->route('profil');
    }
}
