<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TypeMembre;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $users = User::with('typeMembre')->get();
        return view('users.index', compact('users'));
    }

    public function create()
{
    // Récupérer tous les types de membres disponibles
    $typesMembre = TypeMembre::pluck('nom', 'id');

    // Passer les types de membres à la vue
    return view('users.create', compact('typesMembre'));
}

public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users', // Ajout de la validation pour l'email
        'password' => 'required|string|min:8',
        'type_membre_id' => 'required|integer',
    ]);

    // Créer un nouvel utilisateur avec les données validées
    $user = User::create($validatedData);

    // Rediriger vers la page de détails de l'utilisateur nouvellement créé
    return redirect()->route('users.membres', $user);
}

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
{
    // Récupérer tous les types de membres disponibles
    $typesMembre = TypeMembre::pluck('nom', 'id');

    // Passer les types de membres à la vue
    return view('users.edit', compact('user', 'typesMembre'));
}


public function update(Request $request, User $user)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)], // Ajout de la validation pour l'email
        'password' => 'nullable|string|min:8',
        'type_membre_id' => 'required|integer',
    ]);

    // Mettre à jour les informations de l'utilisateur avec les données validées
    $user->update($validatedData);

    // Rediriger vers la page de détails de l'utilisateur mis à jour
    return redirect()->route('users.membres');
}

    public function destroy(User $user)
{
    // Supprimer l'utilisateur spécifique
    $user->delete();

    // Rediriger vers la liste des utilisateurs
    return redirect()->route('users.index');
}


    public function membres()
    {
        $users = User::all();
        return view('membres', compact('users'));
    }

    public function typeMembre()
    {
        return $this->belongsTo(TypeMembre::class);
    }
}
