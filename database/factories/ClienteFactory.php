<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nombre'   => fake()->name(),
            'telefono' => fake()->phoneNumber(),
            'email'    => fake()->unique()->safeEmail(),
        ];
    }
}