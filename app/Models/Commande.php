<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'user_id', // L'identifiant de l'utilisateur qui a passé la commande
        'status', // Le statut de la commande (par exemple, en attente, validée, annulée, etc.)
        // Ajoutez d'autres champs selon vos besoins
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les éléments de commande (les produits commandés)
    public function items()
    {
        return $this->hasMany(CommandeItem::class);
    }
}
