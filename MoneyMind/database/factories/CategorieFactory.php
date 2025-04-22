<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    public function definition(): array
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
            'Dettes & Crédit'
        ];

        return [
            'title' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
