<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\OrdenTrabajo;
use App\Models\Servicio;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrdenFinalizadaMail;

class ClientePortalController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('cliente.index', compact('servicios'));
    }

    public function reservarServicio(Request $request)
    {
        $validated = $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_email' => 'required|email|max:255',
            'cliente_telefono' => 'nullable|string|max:20',
            'vehiculo_patente' => 'required|string|max:10',
            'vehiculo_marca' => 'required|string|max:100',
            'vehiculo_modelo' => 'required|string|max:100',
            'vehiculo_anio' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'vehiculo_color' => 'nullable|string|max:50',
            'servicio_id' => 'required|exists:servicios,id',
            'descripcion_problema' => 'nullable|string|max:1000',
            'fecha_preferida' => 'required|date|after:today'
        ]);

        // Buscar o crear cliente
        $cliente = Cliente::firstOrCreate(
            ['email' => $validated['cliente_email']],
            [
                'nombre' => $validated['cliente_nombre'],
                'telefono' => $validated['cliente_telefono']
            ]
        );

        // Buscar o crear vehículo
        $vehiculo = Vehiculo::firstOrCreate(
            [
                'cliente_id' => $cliente->id,
                'patente' => $validated['vehiculo_patente']
            ],
            [
                'marca' => $validated['vehiculo_marca'],
                'modelo' => $validated['vehiculo_modelo'],
                'anio' => $validated['vehiculo_anio'],
                'color' => $validated['vehiculo_color'],
                'vin' => null  
            ]
        );

        // Crear orden de trabajo
        $orden = OrdenTrabajo::create([
            'vehiculo_id' => $vehiculo->id,
            'fecha_ingreso' => $validated['fecha_preferida'],
            'estado' => 'pendiente',
            'descripcion_problema' => $validated['descripcion_problema']
        ]);

        return redirect()->route('cliente.index')
            ->with('success', 'Su reserva ha sido registrada exitosamente. Nos pondremos en contacto con usted pronto.');
    }

    public function misOrdenes(Request $request)
    {
        $email = $request->get('email');
        
        if (!$email) {
            return view('cliente.mis-ordenes', ['ordenes' => collect()]);
        }

        $cliente = Cliente::where('email', $email)->first();
        
        if (!$cliente) {
            return view('cliente.mis-ordenes', ['ordenes' => collect()])
                ->with('error', 'No se encontraron órdenes para este email.');
        }

        $ordenes = OrdenTrabajo::whereHas('vehiculo', function($query) use ($cliente) {
            $query->where('cliente_id', $cliente->id);
        })
        ->with(['vehiculo', 'comentarios.cliente'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('cliente.mis-ordenes', compact('ordenes', 'cliente'));
    }

    public function agregarComentario(Request $request)
    {
        $validated = $request->validate([
            'orden_id' => 'required|exists:ordenes_trabajo,id',
            'cliente_id' => 'required|exists:clientes,id',
            'comentario' => 'required|string|max:1000',
            'calificacion' => 'required|integer|min:1|max:5'
        ]);

        // Verificar que la orden esté finalizada
        $orden = OrdenTrabajo::find($validated['orden_id']);
        if ($orden->estado !== 'finalizado') {
            return back()->with('error', 'Solo puede comentar órdenes finalizadas.');
        }

        // Verificar que el cliente sea el propietario de la orden
        if ($orden->vehiculo->cliente_id != $validated['cliente_id']) {
            return back()->with('error', 'No tiene permisos para comentar esta orden.');
        }

        // Verificar que no haya comentado antes
        $comentarioExistente = Comentario::where('orden_id', $validated['orden_id'])
            ->where('cliente_id', $validated['cliente_id'])
            ->first();

        if ($comentarioExistente) {
            return back()->with('error', 'Ya ha comentado esta orden.');
        }

        Comentario::create($validated);

        return back()->with('success', 'Comentario agregado exitosamente.');
    }
}