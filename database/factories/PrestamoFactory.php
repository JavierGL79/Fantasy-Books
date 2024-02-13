<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Libro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Prestamo::class;

    public function definition(): array
    {
        return [
            'fecha_prestamo' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fecha_devolucion' => $this->faker->dateTimeBetween('now', '+1 month'),
            'user_id' => User::factory()->create()->id,
            'libro_id' => Libro::factory()->create()->id,
        ];
    }
}
