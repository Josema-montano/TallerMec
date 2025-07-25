<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    protected $model = Vehiculo::class;

    public function definition(): array
    {
        return [
            'cliente_id' => null,          
            'patente'    => strtoupper(fake()->bothify('???###')),
            'marca'      => fake()->randomElement(['Ford','Chevrolet','Toyota','VW']),
            'modelo'     => fake()->word(),
            'anio'       => fake()->year(),
            'color' => fake()->safeColorName(),
            'vin' => strtoupper(fake()->unique()->bothify('VIN#######')),
        ];
    }
}