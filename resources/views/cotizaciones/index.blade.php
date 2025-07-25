@extends('layouts.app')
@section('title','Cotizaciones')
@section('header','Gestión de Cotizaciones')
@section('content')

<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-white py-16">
        <!-- Red accent triangle -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[80px] border-l-red-600 border-b-[40px] border-b-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div>
                    <div class="text-sm font-semibold text-red-600 mb-2 tracking-wider">GESTIÓN</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        COTIZACIONES
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Control completo de todas las cotizaciones del taller
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div>
                    <a href="{{ route('cotizaciones.create') }}" 
                       class="bg-gray-900 text-white px-8 py-4 font-semibold tracking-wider hover:bg-red-600 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        + NUEVA COTIZACIÓN
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quotes Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">COTIZACIONES</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">LISTADO DE COTIZACIONES</h2>
                <p class="text-gray-600">Seguimiento detallado de todas las cotizaciones generadas</p>
            </div>
            
            <!-- Quotes Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gray-900 text-white">
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 font-semibold tracking-wider text-sm">
                        <div class="col-span-1">ID</div>
                        <div class="col-span-1">ORDEN</div>
                        <div class="col-span-2">VEHÍCULO</div>
                        <div class="col-span-2">CLIENTE</div>
                        <div class="col-span-2">FECHA</div>
                        <div class="col-span-2">TOTAL</div>
                        <div class="col-span-1">ESTADO</div>
                        <div class="col-span-1 text-center">ACCIONES</div>
                    </div>
                </div>
                
                <!-- Table Body -->
                <div class="divide-y divide-gray-100">
                    @forelse ($cotizaciones as $cotizacion)
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 hover:bg-gray-50 transition-colors duration-200 items-center">
                        <!-- ID -->
                        <div class="col-span-1">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <span class="text-blue-600 font-bold text-sm">#{{ $cotizacion->id }}</span>
                            </div>
                        </div>
                        
                        <!-- Order -->
                        <div class="col-span-1">
                            <div class="bg-gray-100 text-gray-900 px-3 py-2 rounded-lg font-mono text-xs font-bold text-center shadow-sm">
                                {{ $cotizacion->orden ? '#' . $cotizacion->orden->id : 'N/A' }}
                            </div>
                        </div>
                        
                        <!-- Vehicle -->
                        <div class="col-span-2">
                            @if ($cotizacion->orden && $cotizacion->orden->vehiculo)
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900 text-sm">
                                            {{ $cotizacion->orden->vehiculo->marca ?? 'Marca N/D' }}
                                            {{ $cotizacion->orden->vehiculo->modelo ?? 'Modelo N/D' }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $cotizacion->orden->vehiculo->patente ?? 'Sin placa' }}
                                            @if($cotizacion->orden->vehiculo->color)
                                                - {{ $cotizacion->orden->vehiculo->color }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-gray-400 text-sm">N/A</div>
                            @endif
                        </div>
                        
                        <!-- Client -->
                        <div class="col-span-2">
                            @if ($cotizacion->orden && $cotizacion->orden->vehiculo && $cotizacion->orden->vehiculo->cliente)
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900 text-sm">
                                            {{ $cotizacion->orden->vehiculo->cliente->nombre ?? 'Cliente N/D' }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $cotizacion->orden->vehiculo->cliente->telefono ?? 'Sin teléfono' }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-gray-400 text-sm">N/A</div>
                            @endif
                        </div>
                        
                        <!-- Date -->
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-sm">{{ $cotizacion->fecha->format('d/m/Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $cotizacion->fecha->format('H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total -->
                        <div class="col-span-2">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">
                                    {{ number_format($cotizacion->total, 2) }}
                                </div>
                                <div class="text-sm text-gray-500 font-semibold">Bs</div>
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="col-span-1">
                            <div class="text-center">
                                @if($cotizacion->aprobada)
                                    <div class="bg-green-100 text-green-800 px-3 py-2 rounded-full font-bold text-xs shadow-sm">
                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        APROBADA
                                    </div>
                                @else
                                    <div class="bg-yellow-100 text-yellow-800 px-3 py-2 rounded-full font-bold text-xs shadow-sm">
                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        PENDIENTE
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="col-span-1 flex justify-center">
                            <a href="{{ route('cotizaciones.pdf', $cotizacion) }}" 
                               class="group bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                PDF
                            </a>
                        </div>
                    </div>
                    
                    <!-- Problema reportado -->
                    <div class="col-span-3">
                        <div class="bg-gray-50 rounded-lg p-3 border-l-4 border-red-500">
                            @if($cotizacion->orden->descripcion_problema)
                                <div class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 mb-1">Problema reportado:</div>
                                        <div class="text-sm text-gray-700 leading-relaxed">
                                            {{ Str::limit($cotizacion->orden->descripcion_problema, 100) }}
                                        </div>
                                        @if(strlen($cotizacion->orden->descripcion_problema) > 100)
                                            <button class="text-xs text-blue-600 hover:text-blue-800 mt-1 font-medium" 
                                                    onclick="toggleDescription({{ $cotizacion->id }})">
                                                Ver más...
                                            </button>
                                            <div id="full-description-{{ $cotizacion->id }}" class="hidden text-sm text-gray-700 mt-2">
                                                {{ $cotizacion->orden->descripcion_problema }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center text-gray-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm italic">Sin descripción del problema</span>
                                </div>
                            @endif
                            
                            @if($cotizacion->kilometraje)
                                <div class="mt-2 pt-2 border-t border-gray-200">
                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        Kilometraje: {{ number_format($cotizacion->kilometraje) }} km
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @empty
                    <!-- Empty State -->
                    <div class="px-8 py-16 text-center">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No hay cotizaciones registradas</h3>
                        <p class="text-gray-600 mb-6">Comienza creando la primera cotización</p>
                        <a href="{{ route('cotizaciones.create') }}" 
                           class="bg-gray-900 text-white px-6 py-3 font-semibold rounded-lg hover:bg-red-600 transition-colors duration-300">
                            + CREAR COTIZACIÓN
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Pagination -->
            @if($cotizaciones->hasPages())
            <div class="mt-12 flex justify-center">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    {{ $cotizaciones->links() }}
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">ESTADÍSTICAS</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">RESUMEN DE COTIZACIONES</h2>
                <p class="text-gray-600">Métricas clave del proceso de cotización</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <!-- Total Quotes -->
                <div class="group">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $cotizaciones->total() }}</div>
                    <div class="text-gray-600 font-medium">Total Cotizaciones</div>
                </div>
                
                <!-- Approved Quotes -->
                <div class="group">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $cotizaciones->where('aprobada', true)->count() }}</div>
                    <div class="text-gray-600 font-medium">Aprobadas</div>
                </div>
                
                <!-- Pending Quotes -->
                <div class="group">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $cotizaciones->where('aprobada', false)->count() }}</div>
                    <div class="text-gray-600 font-medium">Pendientes</div>
                </div>
                
                <!-- Total Value -->
                <div class="group">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">
                        {{ number_format($cotizaciones->sum('total'), 0) }}
                    </div>
                    <div class="text-gray-600 font-medium">Valor Total (Bs)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">ACCIONES</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">GESTIÓN RÁPIDA</h2>
                <p class="text-gray-600">Herramientas para la gestión eficiente de cotizaciones</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Pending Approval -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Pendientes de Aprobación</h3>
                    <p class="text-gray-600 mb-6">Revisa cotizaciones que requieren aprobación del cliente</p>
                    <button class="bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-700 transition-colors duration-300 font-semibold">
                        Ver Pendientes
                    </button>
                </div>
                
                <!-- Generate Report -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Generar Reporte</h3>
                    <p class="text-gray-600 mb-6">Exporta reportes detallados de cotizaciones por período</p>
                    <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-semibold">
                        Generar Reporte
                    </button>
                </div>
                
                <!-- Bulk Actions -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Acciones Masivas</h3>
                    <p class="text-gray-600 mb-6">Aprueba o rechaza múltiples cotizaciones a la vez</p>
                    <button class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors duration-300 font-semibold">
                        Gestionar
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection 