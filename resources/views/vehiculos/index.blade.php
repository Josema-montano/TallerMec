@extends('layouts.app')
@section('title','Vehículos')
@section('content')
<div class="p-6 max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Vehículos</h1>
        <a href="{{ route('vehiculos.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Nuevo</a>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Placa</th>
                    <th class="px-4 py-2 text-left">Marca / Modelo</th>
                    <th class="px-4 py-2 text-left">Cliente</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $v)
                <tr class="border-t">
                    <td class="px-4 py-2 font-mono">{{ $v->patente }}</td>
                    <td class="px-4 py-2">{{ $v->marca }} {{ $v->modelo }}</td>
                    <td class="px-4 py-2">{{ $v->cliente?->nombre }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('vehiculos.edit', $v) }}" class="text-sm text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('vehiculos.destroy', $v) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                            @csrf @method('DELETE')
                            <button class="text-sm text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-4 py-2 text-center text-gray-500">Sin registros</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $vehiculos->links() }}</div>
</div>
@endsection