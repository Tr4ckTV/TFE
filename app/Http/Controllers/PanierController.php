<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function addProductToPanier(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        $cartItem = Panier::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($cartItem) {
            // Si le produit est déjà dans le panier, augmentez simplement la quantité
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Sinon, créez un nouvel élément dans le panier
            Panier::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Le produit a été ajouté à votre panier.');
    }

    public function viewPanier()
    {
        $user = Auth::user();
        $cartItems = Panier::with('product')->where('user_id', $user->id)->get();

        return view('panier', compact('cartItems'));
    }

    public function update(Request $request, $id)
    {
        $panierItem = Panier::findOrFail($id);
        $panierItem->quantity = $request->quantity;
        $panierItem->save();

        return redirect()->route('panier')->with('success', 'Quantité du produit mise à jour dans le panier.');
    }

    public function remove($id)
    {
        $panierItem = Panier::findOrFail($id);
        $panierItem->delete();

        return redirect()->route('panier')->with('success', 'Produit supprimé du panier.');
    }
}
