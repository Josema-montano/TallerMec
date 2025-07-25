@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Listado de Cotizaciones</h1>
        <a href="{{ route('cotizaciones.create') }}" class="btn btn-success">
            + Nueva Cotización
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Orden</th>
                <th>Fecha</th>
                <th>Total Estimado</th>
                <th>Aprobada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cotizaciones as $cotizacion)
                <tr>
                    <td>{{ $cotizacion->id }}</td>
                    <td>{{ $cotizacion->orden->id ?? 'N/A' }}</td>
                    <td>{{ $cotizacion->fecha->format('d/m/Y') }}</td>
                    <td>{{ number_format($cotizacion->total_estimado, 2) }} Bs</td>
                    <td>{{ $cotizacion->aprobada ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('cotizaciones.pdf', $cotizacion) }}" class="btn btn-sm btn-primary">
                            PDF
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay cotizaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-3">
        {{ $cotizaciones->links() }}
    </div>
</div>
@endsection
