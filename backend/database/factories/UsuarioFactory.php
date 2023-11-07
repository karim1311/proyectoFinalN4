<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idpersona' => fake()->numberBetween(1,10),
            'usuario' => fake()->userName(),
            'correo' => fake()->email(),
            'clave' => fake()->word(),
            'habilitado' => fake()->randomElement(['si', 'no']),
            'fecha' => fake()->date(),
            'idrol' => fake()->numberBetween(1,3),
            'usuariocreacion' => fake()->numberBetween(1,10),
            'usuariomodificacion' => fake()->numberBetween(1,10)
        ];
    }
}

