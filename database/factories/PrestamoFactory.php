<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Book;

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

       $fecha_prestamo = $this->faker->dateTimeBetween('-1 year', 'now');
    $ampliado = $this->faker->boolean(25); // 25% de probabilidad de que sea true
    $fecha_devolucion = $ampliado ? $fecha_prestamo->modify('+6 days') : $fecha_prestamo->modify('+3 days');

    return [
        'fecha_prestamo' => $fecha_prestamo,
        'fecha_devolucion' => $fecha_devolucion,
        'user_id' => User::factory()->create()->id,
        'libro_id' => Book::factory()->create()->id,
        'devuelto' => $this->faker->boolean(75), // 75% de probabilidad de que sea true
        'ampliado' => $ampliado,
    ];
    }
}
