<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagina>
 */
class PaginaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuariocreacion' => fake()->numberBetween(1,10),
            'usuariomodificacion' => fake()->numberBetween(1,10),
            'url' => fake()->url(),
            'estado' => fake()->randomElement(['activo','inactivo']),
            'nombre' => fake()->firstName(),
            'descripcion' => fake()->sentence(),
            'icono' => fake()->sentence(),
            'tipo' => fake()->word()
        ];
    }
}
