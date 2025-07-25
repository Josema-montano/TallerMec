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
            'cliente_id' => \App\Models\Cliente::factory(),
            'patente'    => strtoupper(fake()->bothify('???###')),
            'marca'      => fake()->randomElement(['Ford','Chevrolet','Toyota','VW']),
            'modelo'     => fake()->word(),
            'anio'       => fake()->year(),
            'color'      => fake()->safeColorName(),
            'vin'        => strtoupper(fake()->unique()->bothify('VIN#######')),
            'imagen'     => 'vehiculos/' . fake()->image('public/storage/vehiculos', 640, 480, null, false), // guarda solo el nombre
        ];
    }
}