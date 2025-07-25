@extends('layouts.app')
@section('title','Clientes')
@section('content')
<div class="p-6 max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Nuevo</a>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Teléfono</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $c)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $c->nombre }}</td>
                    <td class="px-4 py-2">{{ $c->email }}</td>
                    <td class="px-4 py-2">{{ $c->telefono }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('clientes.edit', $c) }}" class="text-sm text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('clientes.destroy', $c) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
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
    <div class="mt-4">{{ $clientes->links() }}</div>
</div>
@endsection