<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Création de quelques catégories
        Category::create(['name' => 'Collier']);
        Category::create(['name' => 'Bracelet']);
        Category::create(['name' => 'Boucles d\'oreilles']);
    }
}
