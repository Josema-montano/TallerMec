@extends('layouts.app')
@section('title','Crear Orden')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Nueva orden</h1>
    <form action="{{ route('ordenes.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Vehículo</label>
            <select name="vehiculo_id" required class="w-full border px-3 py-2 rounded">
                @foreach($vehiculos as $v)
                    <option value="{{ $v->id }}">
    {{ $v->patente }} - {{ $v->marca }} {{ $v->modelo }} ({{ $v->color }}) - {{ $v->cliente->nombre }}
</option>
                @endforeach
            </select>
        </div>
        <div><label class="block mb-1">Fecha ingreso</label><input type="date" name="fecha_ingreso" required class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Fecha estimada (opcional)</label><input type="date" name="fecha_estimada" class="w-full border px-3 py-2 rounded"></div>
        <div><label class="block mb-1">Estado</label>
            <select name="estado" required class="w-full border px-3 py-2 rounded">
                   <option value="pendiente">Pendiente</option>
   <option value="en_proceso">En proceso</option>
   <option value="finalizado">Finalizado</option>
   <option value="cancelado">Cancelado</option>
            </select>
        </div>
        <div><label class="block mb-1">Descripción falla (opcional)</label><textarea name="descripcion_problema" rows="3" class="w-full border px-3 py-2 rounded"></textarea></div>
        <div><label class="block mb-1">Kilometraje (opcional)</label><input type="number" name="kilometraje" min="0" class="w-full border px-3 py-2 rounded"></div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Guardar</button>
    </form>
</div>
@endsection