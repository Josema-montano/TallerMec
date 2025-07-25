@extends('layouts.app')
@section('title', 'Editar Orden')
@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar orden</h1>
    <form action="{{ route('ordenes.update', $orden) }}" method="POST">

        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1">Vehículo</label>
            <select name="vehiculo_id" required class="w-full border px-3 py-2 rounded">
                @foreach($vehiculos as $v)
                    <option value="{{ $v->id }}" {{ $v->id == $orden->vehiculo_id ? 'selected' : '' }}>
                        {{ $v->patente }} - {{ $v->marca }} {{ $v->modelo }} ({{ $v->color }}) - {{ $v->cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block mb-1">Fecha ingreso</label>
            <input type="date" name="fecha_ingreso" value="{{ $orden->fecha_ingreso->format('Y-m-d') }}" required class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Fecha estimada (opcional)</label>
        <input type="date" name="fecha_estimada_fin" value="{{ $orden->fecha_estimada_fin ? $orden->fecha_estimada_fin->format('Y-m-d') : '' }}" class="w-full border px-3 py-2 rounded">
    
        </div>
        <div>
            <label class="block mb-1">Estado</label>
            <select name="estado" required class="w-full border px-3 py-2 rounded" id="estado">
                <option value="pendiente" {{ $orden->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en_proceso" {{ $orden->estado == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="finalizado" {{ $orden->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option value="cancelado" {{ $orden->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
        <div id="fecha_entrega_container" style="display: {{ $orden->estado == 'finalizado' ? 'block' : 'none' }}">
            <label class="block mb-1">Fecha de entrega</label>
            <input type="date" name="fecha_entrega" value="{{ $orden->fecha_entrega ? $orden->fecha_entrega->format('Y-m-d') : '' }}" class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Descripción falla (opcional)</label>
            <textarea name="descripcion_problema" rows="3" class="w-full border px-3 py-2 rounded">{{ $orden->descripcion_problema }}</textarea>
        </div>
        <div>
            <label class="block mb-1">Kilometraje (opcional)</label>
            <input type="number" name="kilometraje" value="{{ $orden->kilometraje }}" min="0" class="w-full border px-3 py-2 rounded">
        </div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Actualizar</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('estado').addEventListener('change', function() {
        var fechaEntregaContainer = document.getElementById('fecha_entrega_container');
        if (this.value === 'finalizado') {
            fechaEntregaContainer.style.display = 'block';
        } else {
            fechaEntregaContainer.style.display = 'none';
        }
    });
</script>
@endsection