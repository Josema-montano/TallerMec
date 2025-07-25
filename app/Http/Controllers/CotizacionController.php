<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\OrdenTrabajo;
use App\Models\Repuesto;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacion::with('orden.vehiculo.cliente', 'repuestos')
            ->orderBy('fecha', 'desc')
            ->paginate(10);

        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function create()
    {
        $ordenes = OrdenTrabajo::with('vehiculo.cliente')->get();
        $repuestos = Repuesto::all();

        return view('cotizaciones.create', compact('ordenes', 'repuestos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'orden_id'         => 'required|exists:ordenes_trabajo,id',
            'fecha'            => 'required|date',
            'total_servicio'   => 'required|numeric|min:0',
            'aprobada'         => 'nullable|boolean',
            'repuestos'        => 'nullable|array',
            'repuestos.*.cantidad' => 'nullable|integer|min:1',
        ]);

        $validated['aprobada'] = $request->has('aprobada') ? 1 : 0;

        $totalRepuestos = 0;
        $repuestosData = [];

        if ($request->has('repuestos')) {
            foreach ($request->input('repuestos') as $repuestoId => $datos) {
                if (isset($datos['usar']) && $datos['usar'] == 1) {
                    $cantidad = isset($datos['cantidad']) ? (int) $datos['cantidad'] : 0;

                    if ($cantidad <= 0) {
                        return back()->withErrors(["La cantidad para el repuesto con ID $repuestoId no es válida."]);
                    }

                    $repuesto = Repuesto::find($repuestoId);

                    if (!$repuesto) {
                        return back()->withErrors(["El repuesto con ID $repuestoId no existe."]);
                    }

                    // VALIDACIÓN DE STOCK CORRECTA (USANDO stock_actual)
                    if ((int) $repuesto->stock_actual < $cantidad) {
                        return back()->withErrors([
                            "El repuesto '{$repuesto->nombre}' no tiene suficiente stock. Stock disponible: {$repuesto->stock_actual}, solicitado: {$cantidad}."
                        ]);
                    }

                    $precioTotal = $repuesto->precio_unitario * $cantidad;
                    $totalRepuestos += $precioTotal;

                    $repuestosData[$repuestoId] = [
                        'cantidad' => $cantidad,
                        'precio_total' => $precioTotal,
                    ];
                }
            }
        }

        $totalFinal = $validated['total_servicio'] + $totalRepuestos;

        $cotizacion = Cotizacion::create([
            'orden_id' => $validated['orden_id'],
            'fecha' => $validated['fecha'],
            'total_servicio' => $validated['total_servicio'],
            'total' => $totalFinal,
            'aprobada' => $validated['aprobada'],
        ]);

        // SINCRONIZAR REPUESTOS Y ACTUALIZAR STOCK
        if (!empty($repuestosData)) {
            $cotizacion->repuestos()->sync($repuestosData);

            foreach ($repuestosData as $id => $datos) {
                $repuesto = Repuesto::find($id);
                $repuesto->decrement('stock_actual', $datos['cantidad']); // CORREGIDO
            }
        }

        return redirect()->route('cotizaciones.index')
            ->with('success', '¡Cotización creada correctamente!');
    }

    public function pdf(Cotizacion $cotizacion)
    {
        $data = $cotizacion->load('orden.vehiculo.cliente', 'repuestos');
        $pdf = \PDF::loadView('cotizaciones.pdf', compact('data'));
        return $pdf->download('cotizacion_' . $cotizacion->id . '.pdf');
    }
}
