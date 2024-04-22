<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Panier;
use App\Models\CommandeItem;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view('commandes', compact('commandes'));
    }

    public function store(Request $request)
{
    // Récupérer l'utilisateur actuellement authentifié
    $user = auth()->user();

    // Créer une nouvelle commande pour cet utilisateur
    $commande = new Commande();
    $commande->user_id = $user->id;
    $commande->status = 'en attente'; // Vous pouvez définir le statut initial ici
    $commande->save();

    // Récupérer le panier de l'utilisateur
    $panierItems = Panier::where('user_id', $user->id)->get();

    // Ajouter chaque élément du panier comme un élément de commande
    foreach ($panierItems as $panierItem) {
        $commandeItem = new CommandeItem();
        $commandeItem->commande_id = $commande->id; // Assigner la commande_id
        $commandeItem->product_id = $panierItem->product_id;
        $commandeItem->quantity = $panierItem->quantity;
        $commandeItem->save();
    }

    // Supprimer les éléments du panier après la création de la commande
    Panier::where('user_id', $user->id)->delete();

    // Rediriger vers la page des commandes ou afficher un message de succès
    return redirect()->route('commandes')->with('success', 'Votre commande a été passée avec succès.');
}

public function show(Commande $commande)
{
    return view('commandes.show', compact('commande'));
}

public function approve(Commande $commande)
    {
        foreach ($commande->items as $item) {
            $product = $item->product;
            if ($product->quantity < $item->quantity) {
                // Si la quantité est insuffisante, rediriger avec un message d'erreur
                return redirect()->back()->with('error', 'La quantité du produit "'.$product->name.'" est insuffisante.');
            }
        }
        // Mettre à jour le statut de la commande
        $commande->status = 'validée';
        $commande->save();

        // Mettre à jour les quantités des produits
        foreach ($commande->items as $item) {
            $product = $item->product;
            $product->quantity -= $item->quantity;
            $product->save();
        }

        return redirect()->back()->with('success', 'Commande validée avec succès.');
    }

    public function refuse(Commande $commande)
    {
        // Mettre à jour le statut de la commande
        $commande->status = 'annulée';
        $commande->save();

        return redirect()->back()->with('success', 'Commande refusée.');
    }

}
