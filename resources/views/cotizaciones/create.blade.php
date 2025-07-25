@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nueva Cotización</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cotizaciones.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="orden_id" class="form-label">Orden de Trabajo</label>
            <select name="orden_id" id="orden_id" class="form-control" required>
                <option value="">Seleccione una orden</option>
                @foreach ($ordenes as $orden)
                    <option value="{{ $orden->id }}" {{ old('orden_id') == $orden->id ? 'selected' : '' }}>
                        Orden #{{ $orden->id }} - {{ $orden->vehiculo->cliente->nombre ?? 'Cliente desconocido' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
        </div>

        <div class="mb-3">
            <label for="total_servicio" class="form-label">Precio estimado del servicio (sin repuestos)</label>
            <input type="number" step="0.01" name="total_servicio" id="total_servicio" class="form-control" value="{{ old('total_servicio', 0) }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="aprobada" id="aprobada" class="form-check-input" value="1" {{ old('aprobada') ? 'checked' : '' }}>
            <label for="aprobada" class="form-check-label">Aprobada</label>
        </div>

        <h5>Repuestos a usar</h5>
        @foreach ($repuestos as $repuesto)
            <div class="mb-2">
                <label>
                    <input type="checkbox" name="repuestos[{{ $repuesto->id }}][usar]" value="1"
                        onchange="document.getElementById('cantidad-{{ $repuesto->id }}').disabled = !this.checked;"
                        {{ old("repuestos.{$repuesto->id}.usar") ? 'checked' : '' }}>
                    {{ $repuesto->nombre }} - Precio Unitario: {{ number_format($repuesto->precio_unitario, 2) }} Bs (Stock: {{ $repuesto->stock_actual }})
                </label>
                <input type="number" name="repuestos[{{ $repuesto->id }}][cantidad]" id="cantidad-{{ $repuesto->id }}"
                    min="1" value="{{ old("repuestos.{$repuesto->id}.cantidad", 1) }}" 
                    {{ old("repuestos.{$repuesto->id}.usar") ? '' : 'disabled' }} style="width: 70px;">
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
        <a href="{{ route('cotizaciones.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@section('scripts')
<script>
    document.querySelectorAll('input[type=checkbox][name^="repuestos"]').forEach(cb => {
        cb.addEventListener('change', function() {
            const id = this.name.match(/\d+/)[0];
            const cantidadInput = document.getElementById('cantidad-' + id);
            cantidadInput.disabled = !this.checked;
        });
    });
</script>
@endsection

