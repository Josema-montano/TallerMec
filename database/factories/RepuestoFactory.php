<?php

namespace Database\Factories;

use App\Models\Repuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepuestoFactory extends Factory
{
    protected $model = Repuesto::class;

    public function definition(): array
    {
        return [
            'nombre'        => fake()->words(3, true),
            'precio_unitario'=> fake()->randomFloat(2, 5, 200),
            'stock_actual'  => fake()->numberBetween(0, 100),
        ];
    }
}