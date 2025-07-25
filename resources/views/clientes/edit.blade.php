@extends('layouts.app')
@section('title','Editar Cliente')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar cliente</h1>
    <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div><label class="block mb-1">Nombre</label><input type="text" name="nombre" value="{{ $cliente->nombre }}" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Email</label><input type="email" name="email" value="{{ $cliente->email }}" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Teléfono</label><input type="text" name="telefono" value="{{ $cliente->telefono }}" class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Dirección</label><input type="text" name="direccion" value="{{ $cliente->direccion }}" class="w-full border px-3 py-2 rounded"></div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Actualizar</button>
    </form>
</div>
@endsection