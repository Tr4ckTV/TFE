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
        $user = auth()->user();

        $commandes = Commande::where('user_id', $user->id)->get();
        return view('commandes', compact('commandes'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $commande = new Commande();
        $commande->user_id = $user->id;
        $commande->status = 'en attente';
        $commande->save();

        $panierItems = Panier::where('user_id', $user->id)->get();

        foreach ($panierItems as $panierItem) {
            $commandeItem = new CommandeItem();
            $commandeItem->commande_id = $commande->id;
            $commandeItem->product_id = $panierItem->product_id;
            $commandeItem->quantity = $panierItem->quantity;
            $commandeItem->save();
        }

        Panier::where('user_id', $user->id)->delete();

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
                return redirect()->back()->with('error', 'La quantité du produit "'.$product->name.'" est insuffisante.');
                }
            }

            $commande->status = 'validée';
            $commande->save();


            foreach ($commande->items as $item) {
                $product = $item->product;
                $product->quantity -= $item->quantity;
                $product->save();
            }

            return redirect()->back()->with('success', 'Commande validée avec succès.');
        }

    public function refuse(Commande $commande)
    {
        $commande->status = 'annulée';
        $commande->save();

        return redirect()->back()->with('success', 'Commande refusée.');
    }

}
