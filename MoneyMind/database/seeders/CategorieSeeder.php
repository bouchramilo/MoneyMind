<?php
namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Logement',
            'Alimentation',
            'Transport',
            'Factures & Services',
            'Santé',
            'Éducation',
            'Shopping',
            'Loisirs & Sorties',
            'Animaux',
            'Dettes & Crédit',
        ];

        foreach ($categories as $title) {
            Categorie::create(['title' => $title]);
        }
    }
}
