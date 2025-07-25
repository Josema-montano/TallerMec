@extends('layouts.app')
@section('title', 'Editar Repuesto')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar repuesto</h1>
    <form action="{{ route('repuestos.update', $repuesto) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ $repuesto->nombre }}" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Código</label>
            <input type="text" name="codigo" value="{{ $repuesto->codigo }}" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Stock</label>
            <input type="number" name="stock" value="{{ $repuesto->stock_actual }}" min="0" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Precio unitario</label>
            <input type="number" name="precio_unitario" step="0.01" min="0" value="{{ $repuesto->precio_unitario }}" required class="w-full border px-3 py-2 rounded">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
    </form>
</div>
@endsection