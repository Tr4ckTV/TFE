<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeMembre;

class TypeMembreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Création des types de membres
        $types = [
            ['nom' => 'Admin'],
            ['nom' => 'Client'],
        ];

        foreach ($types as $type) {
            TypeMembre::create($type);
        }
    }
}
