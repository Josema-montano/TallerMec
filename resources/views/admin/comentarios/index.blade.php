@extends('layouts.app')

@section('title', 'Gestión de Comentarios')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Gestión de Comentarios</h1>

    @if($comentarios->isEmpty())
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <p class="text-gray-600">No hay comentarios registrados.</p>
        </div>
    @else
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Cliente</th>
                        <th class="px-6 py-3 text-left">Vehículo</th>
                        <th class="px-6 py-3 text-left">Orden</th>
                        <th class="px-6 py-3 text-left">Comentario</th>
                        <th class="px-6 py-3 text-left">Calificación</th>
                        <th class="px-6 py-3 text-left">Fecha</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $comentario->id }}</td>
                            <td class="px-6 py-4">{{ $comentario->cliente->nombre ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $comentario->orden->vehiculo->patente ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $comentario->orden_id }}</td>
                            <td class="px-6 py-4 max-w-xs truncate" title="{{ $comentario->comentario }}">
                                {{ Str::limit($comentario->comentario, 50) }}
                            </td>
                            <td class="px-6 py-4">{{ $comentario->calificacion ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $comentario->fecha_comentario->format('d/m/Y H:i') }}</td>
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $comentarios->links() }}
        </div>
    @endif
</div>
@endsection
