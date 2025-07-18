<?php

namespace Database\Factories;

use App\Models\OrdenTrabajo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenTrabajoFactory extends Factory
{
    protected $model = OrdenTrabajo::class;

    public function definition(): array
    {
        return [
            'vehiculo_id'        => null,              
            'fecha_ingreso'      => fake()->dateTimeThisMonth(),
            'descripcion_problema' => fake()->sentence(),
            'estado'             => fake()->randomElement(['pendiente','en_proceso','finalizado','cancelado']),
            'fecha_estimada_fin' => fake()->dateTimeBetween('+1 day','+7 days')->format('Y-m-d'),
            'fecha_entrega' => fake()->optional()->dateTimeBetween('+1 day','+7 days'),
        ];
    }
}