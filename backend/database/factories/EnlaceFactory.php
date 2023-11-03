<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enlace>
 */
class EnlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idpagina' => fake()->numberBetween(1,5),
            'idrol' => fake()->numberBetween(1,3),
            'descripcion' => fake()->sentence(),
            'usuariocreacion' => fake()->numberBetween(1,10),
            'usuariomodificacion' => fake()->numberBetween(1,10)
        ];
    }
}
