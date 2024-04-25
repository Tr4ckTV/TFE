<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeItem extends Model
{
    protected $fillable = [
        'commande_id',
        'product_id',
        'quantity',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
