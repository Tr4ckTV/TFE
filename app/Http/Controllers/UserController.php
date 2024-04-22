<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TypeMembre;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
    $user = auth()->user();
    return view('users.edit', compact('user'));
}


public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    try {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profil', ['user' => $user->id])->with('success', 'Profil mis à jour avec succès.');
    } catch (\Exception $e) {
        return redirect()->route('profil', ['user' => $user->id])->with('error', 'Une erreur est survenue lors de la mise à jour du profil.');
    }
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
