@extends('layouts.app')
@section('title', 'Nuevo Repuesto')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Añadir repuesto</h1>
    <form action="{{ route('repuestos.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Nombre</label>
            <input type="text" name="nombre" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Código</label>
            <input type="text" name="codigo" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Stock</label>
            <input type="number" name="stock" min="0" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Precio unitario</label>
            <input type="number" name="precio_unitario" step="0.01" min="0" required class="w-full border px-3 py-2 rounded">
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
    </form>
</div>
@endsection