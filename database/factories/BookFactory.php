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
            'autor' => fake()->name($gender = 'male'|'female'),
            'titulo' => fake()->sentence(3),
            'year' => fake()->year,
            'editorial' => fake()->company(),
            'stock' => fake()->numberBetween(1, 100),
            'foto' => fake()->imageUrl(),
            //'information' => fake()->paragraph(),
        ];
    }
}
