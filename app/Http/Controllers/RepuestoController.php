<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RepuestoController extends Controller
{
    public function index()
    {
        return view('repuestos.index', ['repuestos' => Repuesto::paginate(15)]);
    }

    public function create()
    {
        return view('repuestos.create');
    }

    public function store(Request $r)
    {
        $validated = $r->validate([
            'nombre'          => 'required|string|max:255',
            'codigo'          => 'required|unique:repuestos,codigo',
            'stock_actual'    => 'required|integer|min:0',
            'precio_unitario' => 'required|numeric',
            'imagen'          => 'nullable|file|image|max:2048',
        ]);

        if ($r->hasFile('imagen')) {
            $validated['imagen'] = $r->file('imagen')->store('repuestos', 'public');
        }

        Repuesto::create($validated);

        return back()->with('success', 'Repuesto creado con imagen.');
    }

    public function edit(Repuesto $repuesto)
    {
        return view('repuestos.edit', compact('repuesto'));
    }

    public function update(Request $r, Repuesto $repuesto)
    {
        $validated = $r->validate([
            'nombre'          => 'required|string|max:255',
            'codigo'          => ['required', Rule::unique('repuestos', 'codigo')->ignore($repuesto->id)],
            'stock_actual'    => 'required|integer|min:0',
            'precio_unitario' => 'required|numeric',
            'imagen'          => 'nullable|file|image|max:2048',
        ]);

        if ($r->hasFile('imagen')) {
            $validated['imagen'] = $r->file('imagen')->store('repuestos', 'public');
        }

        $repuesto->update($validated);

        return back()->with('success', 'Repuesto actualizado con imagen.');
    }

    public function destroy(Repuesto $repuesto)
    {
        $repuesto->delete();
        return back()->with('success', 'Repuesto eliminado.');
    }
}
