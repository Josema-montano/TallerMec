@extends('layouts.app')
@section('title','Crear Cliente')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Nuevo cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">
        @csrf
        <div><label class="block mb-1">Nombre</label><input type="text" name="nombre" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Email</label><input type="email" name="email" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Teléfono</label><input type="text" name="telefono" class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Dirección</label><input type="text" name="direccion" class="w-full border px-3 py-2 rounded"></div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Guardar</button>
    </form>
</div>
@endsection