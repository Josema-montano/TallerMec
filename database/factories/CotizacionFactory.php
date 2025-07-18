<?php

namespace Database\Factories;

use App\Models\Cotizacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CotizacionFactory extends Factory
{
    protected $model = Cotizacion::class;

    public function definition(): array
    {
        return [
            'orden_id'      => null,      
            'fecha'         => fake()->dateTimeThisMonth(),
            'total_estimado'=> fake()->randomFloat(2, 50, 1000),
            'aprobada'      => fake()->boolean(),
        ];
    }
}