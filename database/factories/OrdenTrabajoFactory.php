<?php

namespace Database\Factories;

use App\Models\OrdenTrabajo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenTrabajoFactory extends Factory
{
    protected $model = OrdenTrabajo::class;

    public function definition(): array
    {
        $estado = fake()->randomElement(['pendiente', 'en_proceso', 'finalizado', 'cancelado']);

        $fechaEntrega = null;
        if (in_array($estado, ['finalizado', 'cancelado'])) {
            $fechaEntrega = fake()->dateTimeBetween('+1 day', '+7 days')->format('Y-m-d');
        }

        return [
            'vehiculo_id' => \App\Models\Vehiculo::inRandomOrder()->first()->id,
            'fecha_ingreso' => fake()->dateTimeThisMonth(),
            'descripcion_problema' => fake()->sentence(),
            'estado' => $estado,
            'fecha_estimada_fin' => fake()->dateTimeBetween('+1 day', '+7 days')->format('Y-m-d'),
            'fecha_entrega' => $fechaEntrega,
            'kilometraje' => fake()->numberBetween(0, 300000), // Añade esto
        ];
    }
}