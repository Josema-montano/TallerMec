@extends('layouts.app')
@section('title','Dashboard Administrador')
@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard Taller Mecánico</h1>

    {{-- KPI Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-indigo-600">{{ \App\Models\Cliente::count() }}</div>
            <div>Clientes</div>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-blue-600">{{ \App\Models\Vehiculo::count() }}</div>
            <div>Vehículos</div>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-yellow-600">{{ \App\Models\OrdenTrabajo::count() }}</div>
            <div>Órdenes</div>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-green-600">{{ \App\Models\Repuesto::sum('stock_actual') }}</div>
            <div>Stock Repuestos</div>
        </div>
    </div>

    {{-- Accesos rápidos --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('clientes.index') }}" class="bg-indigo-600 text-white p-4 rounded hover:bg-indigo-700">Clientes</a>
        <a href="{{ route('vehiculos.index') }}" class="bg-blue-600 text-white p-4 rounded hover:bg-blue-700">Vehículos</a>
        <a href="{{ route('ordenes.index') }}" class="bg-yellow-600 text-white p-4 rounded hover:bg-yellow-700">Órdenes</a>
        <a href="{{ route('repuestos.index') }}" class="bg-green-600 text-white p-4 rounded hover:bg-green-700">Repuestos</a>
        <a href="{{ route('cotizaciones.index') }}" class="bg-purple-600 text-white p-4 rounded hover:bg-purple-700">Cotizaciones</a>
    </div>
</div>
@endsection