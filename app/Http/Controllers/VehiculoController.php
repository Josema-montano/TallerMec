<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('cliente')->paginate(10);
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('vehiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca'      => 'required|string|max:50',
            'modelo'     => 'required|string|max:50',
            'anio'       => 'required|integer|digits:4',
            'patente'      => ['required', 'string', 'max:20', Rule::unique('vehiculos')],
            'vin'        => ['required', 'string', 'max:50', Rule::unique('vehiculos')],
            'color'      => 'nullable|string|max:30',
        ]);

        Vehiculo::create($validated);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado.');
    }

    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all();
        return view('vehiculos.edit', compact('vehiculo', 'clientes'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca'      => 'required|string|max:50',
            'modelo'     => 'required|string|max:50',
            'anio'       => 'required|integer|digits:4',
            'patente'      => ['required', 'string', 'max:20', Rule::unique('vehiculos')->ignoreModel($vehiculo)],
            'vin'        => ['required', 'string', 'max:50', Rule::unique('vehiculos')->ignoreModel($vehiculo)],
            'color'      => 'nullable|string|max:30',
        ]);

        $vehiculo->update($validated);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado.');
    }
}