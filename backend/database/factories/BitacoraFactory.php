<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bitacora>
 */
class BitacoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bitacora' => fake()->sentence(),
            'idusuario' => fake()->numberBetween(1,10),
            'fecha' => fake()->date(),
            'hora' => fake()->time(),
            'ip' => fake()->ipv4(),
            'so' => fake()->randomElement(['linux','mac','windows']),
            'navegador' => fake()->randomElement(['Firefox','Edge','Chrome','Safari','Opera']),
            'usuario' => fake()->firstName()
        ];
    }
}

