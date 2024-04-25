<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'is_promotion', 'discount_percentage', 'discounted_price'];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
}
