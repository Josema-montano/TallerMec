<?php

namespace Database\Factories;

use App\Models\Notificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificacionFactory extends Factory
{
    protected $model = Notificacion::class;

    public function definition(): array
    {
        return [
            'orden_id'   => null,   
            'tipo'       => fake()->randomElement(['presupuesto_listo','terminado','otro']),
            'fecha_envio' => fake()->optional()->dateTimeThisMonth(),
            'enviada'    => fake()->boolean(),
        ];
    }
}