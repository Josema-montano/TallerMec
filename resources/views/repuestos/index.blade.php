@extends('layouts.app')
@section('content')
<div class="p-6">
    <h1 class="text-2xl mb-4">Repuestos</h1>
    <a href="{{ route('repuestos.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Repuesto</a>
    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr><th>Código</th><th>Nombre</th><th>Stock</th><th>Precio</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @forelse($repuestos as $r)
            <tr>
                <td>{{ $r->codigo }}</td><td>{{ $r->nombre }}</td><td>{{ $r->stock_actual }}</td><td>{{ $r->precio_unitario }}</td>
                <td>
                    <a href="{{ route('repuestos.edit',$r) }}" class="text-blue-600">Editar</a>
                    <form method="POST" action="{{ route('repuestos.destroy',$r) }}" class="inline">@csrf @method('DELETE')<button class="text-red-600 ml-2">Borrar</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center p-4">Sin repuestos</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection