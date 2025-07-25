<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $ordenes = OrdenTrabajo::with('vehiculo.cliente')->latest()->paginate(10);
        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::with('cliente')->get();
        return view('ordenes.create', compact('vehiculos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha_ingreso' => 'required|date',
            'fecha_estimada_fin' => 'nullable|date|after_or_equal:fecha_ingreso',
            'estado' => 'required|in:pendiente,en_proceso,finalizado,cancelado',
            'descripcion_problema' => 'nullable|string',
            'kilometraje' => 'nullable|integer|min:0',
        ]);

        OrdenTrabajo::create($validated);

        return redirect()->route('ordenes.index')->with('success', 'Orden creada.');
    }

    public function edit(OrdenTrabajo $orden)
    {
        $vehiculos = Vehiculo::with('cliente')->get();
        return view('ordenes.edit', compact('orden', 'vehiculos'));
    }

    public function update(Request $request, $ordene)
{
    $validated = $request->validate([
    'vehiculo_id' => 'required|exists:vehiculos,id',
    'fecha_ingreso' => 'required|date',
    'fecha_estimada_fin' => 'nullable|date|after_or_equal:fecha_ingreso',
    'estado' => 'required|in:pendiente,en_proceso,finalizado,cancelado',
    'descripcion_problema' => 'nullable|string',
    'kilometraje' => 'nullable|integer|min:0',
]);


    $orden = OrdenTrabajo::findOrFail($ordene);
    $orden->update($validated);

    return redirect()->route('ordenes.index')->with('success', 'Orden actualizada.');
}
    public function destroy(OrdenTrabajo $orden)
    {
        $orden->delete();
        return redirect()->route('ordenes.index')->with('success', 'Orden eliminada.');
    }
}