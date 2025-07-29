<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculoController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehiculo::with('cliente');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('patente', 'like', '%' . $search . '%')
                  ->orWhere('marca', 'like', '%' . $search . '%')
                  ->orWhere('modelo', 'like', '%' . $search . '%');
        }

        $vehiculos = $query->latest()->paginate(10);
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
            'anio'       => 'required|string|size:4',  // Validación como string para evitar error
            'patente'    => ['required', 'string', 'max:20', Rule::unique('vehiculos')],
            'vin'        => ['required', 'string', 'max:50', Rule::unique('vehiculos')],
            'color'      => 'nullable|string|max:30',
            'imagen'     => 'nullable|file|image|max:2048',
        ]);

        $data = $validated;

        // Forzar entero para anio antes de guardar
        if (isset($data['anio'])) {
            $data['anio'] = (int) $data['anio'];
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/vehiculos'), $filename);
            $data['imagen'] = 'vehiculos/' . $filename;
        }

        Vehiculo::create($data);

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
            'anio'       => 'required|string|size:4',  // Consistencia con store
            'patente'    => ['required', 'string', 'max:20', Rule::unique('vehiculos')->ignoreModel($vehiculo)],
            'vin'        => ['required', 'string', 'max:50', Rule::unique('vehiculos')->ignoreModel($vehiculo)],
            'color'      => 'nullable|string|max:30',
            'imagen'     => 'nullable|file|image|max:2048',
        ]);

        $data = $validated;

        // Forzar entero para anio antes de actualizar
        if (isset($data['anio'])) {
            $data['anio'] = (int) $data['anio'];
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/vehiculos'), $filename);
            $data['imagen'] = 'vehiculos/' . $filename;
        }

        $vehiculo->update($data);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado.');
    }
}
