<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeItem extends Model
{
    protected $fillable = [
        'commande_id', // L'identifiant de la commande à laquelle cet élément est associé
        'product_id', // L'identifiant du produit commandé
        'quantity', // La quantité du produit commandé
        // Ajoutez d'autres champs selon vos besoins
    ];

    // Relation avec la commande parent
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    // Relation avec le produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
