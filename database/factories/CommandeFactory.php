<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prix = fake()->numberBetween($min = 9, $max = 300) ;
        $quntite = fake()->numberBetween($min = 9, $max = 300) ;
        $prixtotal = $prix*$quntite;
        return [
            'user_id' => fake()->numberBetween($min = 1, $max = 10),
            'produit_id' => fake()->numberBetween($min = 1, $max = 5),
            // 'produit_id' => null,
            'quntite' => $quntite,
            'commande_prix' => $prix,
            'prixtotal' => $prixtotal,

        ];
    }
}
