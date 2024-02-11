<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'autor' => $faker->name,
            'titulo' => $faker->sentence,
            'year' => $faker->year,
            'editorial' => $faker->company,
            'stock' => $faker->numberBetween(1, 100),
            'foto' => $faker->imageUrl(),
            'information' => $faker->paragraph,
        ];
    }
}
