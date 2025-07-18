<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\OrdenTrabajo;
use App\Models\Servicio;
use App\Models\Repuesto;
use App\Models\Cotizacion;
use App\Models\Notificacion;
use App\Models\OrdenServicio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Clientes con sus autos
        Cliente::factory(5)
            ->has(Vehiculo::factory()->count(2))
            ->create();

        // 2) Catálogo básico
        $servicios = Servicio::factory()->createMany([
            ['nombre' => 'Cambio de aceite', 'precio_hora' => 25],
            ['nombre' => 'Alineación',      'precio_hora' => 30],
            ['nombre' => 'Frenos',          'precio_hora' => 40],
        ]);

        $repuestos = Repuesto::factory()->createMany([
            ['nombre' => 'Filtro de aceite', 'precio_unitario' => 12.5, 'stock_actual' => 50],
            ['nombre' => 'Pastillas freno',  'precio_unitario' => 35,   'stock_actual' => 30],
        ]);

        // 3) Órdenes, servicios y cotizaciones
        Vehiculo::all()->each(function ($vehiculo) use ($servicios, $repuestos) {
            $orden = OrdenTrabajo::factory()->create(['vehiculo_id' => $vehiculo->id]);

            // Agregar servicios
            foreach ($servicios->random(2) as $servicio) {
                OrdenServicio::create([
                    'orden_id'        => $orden->id,
                    'servicio_id'     => $servicio->id,
                    'horas_trabajadas'=> rand(1, 3),
                    'precio_total'    => $servicio->precio_hora * rand(1, 3),
                ]);
            }

            // Crear cotización con repuestos
            $cotizacion = Cotizacion::factory()->create(['orden_id' => $orden->id]);
            foreach ($repuestos->random(2) as $repuesto) {
                $cant = rand(1, 2);
                $cotizacion->repuestos()->attach($repuesto->id, [
                    'cantidad'    => $cant,
                    'precio_total'=> $repuesto->precio_unitario * $cant,
                ]);
            }

            // Notificar
            Notificacion::factory()->create(['orden_id' => $orden->id]);
        });
    }
}