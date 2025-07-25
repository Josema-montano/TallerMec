<?php

namespace Database\Factories;

use App\Models\Cotizacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CotizacionFactory extends Factory
{
    protected $model = Cotizacion::class;

    public function definition(): array
    {
        $totalServicio = $this->faker->randomFloat(2, 50, 1000);
        $totalRepuestos = $this->faker->randomFloat(2, 0, 500);

        return [
            'orden_id'        => null,
            'fecha'           => $this->faker->dateTimeThisMonth(),
            'total_servicio'  => $totalServicio,
            'total'           => $totalServicio + $totalRepuestos,
            'aprobada'        => $this->faker->boolean(),
        ];
    }
}
