@extends('layouts.app')
@section('title','Órdenes')
@section('content')
<div class="p-6 max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Órdenes de trabajo</h1>
        <a href="{{ route('ordenes.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Nueva</a>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Fecha ingreso</th>
                    <th class="px-4 py-2 text-left">Placa</th>
                    <th class="px-4 py-2 text-left">Cliente</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ordenes as $o)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($o->fecha_ingreso)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 font-mono">{{ $o->vehiculo->patente }}</td>
                    <td class="px-4 py-2">{{ $o->vehiculo->cliente->nombre }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 text-xs rounded-full
                            {{ $o->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $o->estado == 'en_proceso' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $o->estado == 'finalizado' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $o->estado == 'cancelado' ? 'bg-gray-100 text-gray-800' : '' }}
                        ">{{ $o->estado }}</span>
                    </td>
                    <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('ordenes.edit', $o) }}" class="text-sm text-blue-600 hover:underline">Editar</a>

<form action="{{ route('ordenes.destroy', $o) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
    @csrf
    @method('DELETE')
    <button class="text-sm text-red-600 hover:underline">Eliminar</button>
</form>

                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-4 py-2 text-center text-gray-500">Sin registros</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $ordenes->links() }}</div>
</div>
@endsection