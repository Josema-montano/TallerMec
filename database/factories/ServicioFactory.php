<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    protected $model = Servicio::class;

    public function definition(): array
    {
        return [
            'nombre'     => fake()->words(2, true),
            'precio_hora'=> fake()->randomFloat(2, 20, 100),
        ];
    }
}