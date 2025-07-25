@extends('layouts.app')
@section('title','Editar Vehículo')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar vehículo</h1>
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block mb-1">Cliente</label>
            <select name="cliente_id" required class="w-full border px-3 py-2 rounded">
                @foreach($clientes as $c)
                    <option value="{{ $c->id }}" {{ $c->id == $vehiculo->cliente_id ? 'selected' : '' }}>{{ $c->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div><label class="block mb-1">Marca</label><input type="text" name="marca" value="{{ $vehiculo->marca }}" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Modelo</label><input type="text" name="modelo" value="{{ $vehiculo->modelo }}" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Año</label><input type="number" name="anio" value="{{ $vehiculo->anio }}" min="1900" max="2099" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Patente</label><input type="text" name="patente" value="{{ $vehiculo->patente }}" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">VIN</label><input type="text" name="vin" value="{{ $vehiculo->vin }}" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Color</label><input type="text" name="color" value="{{ $vehiculo->color }}" class="w-full border px-3 py-2 rounded"></div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Actualizar</button>
    </form>
</div>
@endsection