@extends('layouts.app')
@section('title','Órdenes de Trabajo')
@section('header','Gestión de Órdenes de Trabajo')
@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/ordenes-hero.jpg') }}"
                 alt="Gestión de Órdenes de Trabajo"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">GESTIÓN</div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        ÓRDENES DE<br>
                        <span class="text-red-500">TRABAJO</span>
                    </h1>
                    <p class="text-gray-300 text-xl leading-relaxed max-w-2xl">
                        Control completo de todas las órdenes de trabajo del taller con seguimiento en tiempo real
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div class="hidden lg:block">
                    <a href="{{ route('ordenes.create') }}" 
                       class="group relative overflow-hidden bg-red-600 text-white px-10 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            NUEVA ORDEN
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Button -->
            <div class="lg:hidden mt-8">
                <a href="{{ route('ordenes.create') }}" 
                   class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-300 rounded-lg shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    NUEVA ORDEN
                </a>
            </div>
        </div>
    </section>

    <!-- Orders Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">ÓRDENES</div>
                <h2 class="text-4xl font-bold text-white mb-8">TRABAJOS EN CURSO</h2>
                <p class="text-gray-300 text-lg">Seguimiento detallado de todas las órdenes de trabajo</p>
            </div>
            
            <!-- Orders Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @forelse($ordenes as $o)
                <!-- Order Card -->
                <div class="relative bg-gray-900 rounded-xl overflow-hidden group hover:transform hover:scale-[1.02] transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50">
                    <!-- Card Header -->
                    <div class="relative bg-gradient-to-r from-red-600 to-red-700 p-6 text-white">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
                        </div>
                        
                        <div class="relative z-10 flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mr-4 border border-white/30">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold mb-1">Orden #{{ $o->id }}</h3>
                                    <p class="text-red-100 text-sm uppercase tracking-wide">
                                        {{ \Carbon\Carbon::parse($o->fecha_ingreso)->format('d/m/Y - H:i') }}
                                    </p>
                                </div>
                            </div>
                            <!-- Status Badge -->
                            <div class="text-right">
                                @switch($o->estado)
                                    @case('pendiente')
                                        <div class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                            PENDIENTE
                                        </div>
                                        @break
                                    @case('en_proceso')
                                        <div class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                            EN PROCESO
                                        </div>
                                        @break
                                    @case('finalizado')
                                        <div class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                            FINALIZADO
                                        </div>
                                        @break
                                    @case('cancelado')
                                        <div class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                            CANCELADO
                                        </div>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Vehicle and Client Information -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <!-- Vehicle Info -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Vehículo</div>
                                    <div class="font-bold text-white text-sm">{{ $o->vehiculo->patente }}</div>
                                    <div class="text-xs text-gray-400">{{ $o->vehiculo->marca }} {{ $o->vehiculo->modelo }}</div>
                                </div>
                            </div>
                            
                            <!-- Client Info -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Cliente</div>
                                    <div class="font-bold text-white text-sm truncate">{{ $o->vehiculo->cliente->nombre }}</div>
                                    <div class="text-xs text-gray-400">{{ $o->vehiculo->cliente->telefono ?? 'Sin teléfono' }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Problem Description -->
                        <div class="mb-6">
                            <div class="bg-gray-800 rounded-lg p-4 border-l-4 border-red-500">
                                <div class="flex items-start mb-2">
                                    <svg class="w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Problema Reportado</div>
                                </div>
                                
                                @if($o->descripcion_problema)
                                    <div class="text-sm text-gray-300 leading-relaxed">
                                        <span id="short-description-{{ $o->id }}">
                                            {{ Str::limit($o->descripcion_problema, 120) }}
                                        </span>
                                        @if(strlen($o->descripcion_problema) > 120)
                                            <span id="full-description-{{ $o->id }}" class="hidden">
                                                {{ $o->descripcion_problema }}
                                            </span>
                                            <button class="text-red-400 hover:text-red-300 ml-1 font-medium text-xs" 
                                                    onclick="toggleDescription({{ $o->id }})">
                                                <span id="toggle-text-{{ $o->id }}">Ver más...</span>
                                            </button>
                                        @endif
                                    </div>
                                @else
                                    <div class="flex items-center text-gray-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-sm italic">Sin descripción del problema</span>
                                    </div>
                                @endif
                                
                                @if($o->kilometraje)
                                    <div class="mt-3 pt-3 border-t border-gray-700">
                                        <div class="flex items-center text-xs text-gray-400">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            Kilometraje: {{ number_format($o->kilometraje) }} km
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Order Details Stats -->
                        <div class="grid grid-cols-3 gap-4 mb-6 p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div class="text-center">
                                <div class="text-lg font-bold text-red-500">
                                    {{ \Carbon\Carbon::parse($o->fecha_ingreso)->diffForHumans() }}
                                </div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Tiempo</div>
                            </div>
                            <div class="text-center border-l border-r border-gray-700">
                                @if($o->kilometraje)
                                    <div class="text-lg font-bold text-blue-500">{{ number_format($o->kilometraje) }}</div>
                                    <div class="text-xs text-gray-400 uppercase tracking-wide">Kilómetros</div>
                                @else
                                    <div class="text-lg font-bold text-gray-500">--</div>
                                    <div class="text-xs text-gray-400 uppercase tracking-wide">Sin datos</div>
                                @endif
                            </div>
                            <div class="text-center">
                                @switch($o->estado)
                                    @case('pendiente')
                                        <div class="text-lg font-bold text-yellow-500">⏳</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Pendiente</div>
                                        @break
                                    @case('en_proceso')
                                        <div class="text-lg font-bold text-blue-500">⚙️</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Proceso</div>
                                        @break
                                    @case('finalizado')
                                        <div class="text-lg font-bold text-green-500">✅</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Finalizado</div>
                                        @break
                                    @case('cancelado')
                                        <div class="text-lg font-bold text-red-500">❌</div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Cancelado</div>
                                        @break
                                @endswitch
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <a href="{{ route('ordenes.show', $o) }}" 
                               class="flex-1 bg-gray-700 text-white text-center py-3 rounded-lg hover:bg-gray-600 transition-all duration-300 font-semibold text-sm">
                                Ver Detalles
                            </a>
                            <a href="{{ route('ordenes.edit', $o) }}" 
                               class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('ordenes.destroy', $o) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Está seguro de eliminar esta orden de trabajo?')"
                                        class="bg-red-600 text-white px-4 py-3 rounded-lg hover:bg-red-700 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-red-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="col-span-full">
                    <div class="relative bg-gray-900 rounded-2xl overflow-hidden p-16 text-center border border-gray-700">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <img src="{{ asset('storage/images/interfaces/empty-orders.jpg') }}"
                                 alt="Sin órdenes"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/60"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="w-32 h-32 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-8">
                                <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-4">NO HAY ÓRDENES DE TRABAJO</h3>
                            <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto">
                                Comienza gestionando el taller creando la primera orden de trabajo
                            </p>
                            <a href="{{ route('ordenes.create') }}" 
                               class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                CREAR PRIMERA ORDEN
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($ordenes->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-gray-900 rounded-xl shadow-2xl p-6 border border-gray-700">
                    <div class="pagination-wrapper text-white">
                        {{ $ordenes->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gray-900 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">ESTADÍSTICAS</div>
                <h2 class="text-4xl font-bold text-white mb-8">RESUMEN DE ÓRDENES</h2>
                <p class="text-gray-300 text-lg">Métricas clave del flujo de trabajo del taller</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Total Orders -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $ordenes->total() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Total Órdenes</div>
                </div>
                
                <!-- Pending Orders -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-yellow-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $ordenes->where('estado', 'pendiente')->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Pendientes</div>
                </div>
                
                <!-- In Process -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $ordenes->where('estado', 'en_proceso')->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">En Proceso</div>
                </div>
                
                <!-- Completed -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $ordenes->where('estado', 'finalizado')->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Finalizadas</div>
                </div>
            </div>
            
            <!-- Workflow Analytics -->
            <div class="mt-12 grid md:grid-cols-3 gap-8">
                <!-- Efficiency Metrics -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Eficiencia del Taller</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">Órdenes del Mes</span>
                            <span class="text-purple-500 font-bold">
                                {{ $ordenes->filter(function($o) { return $o->created_at && $o->created_at->isCurrentMonth(); })->count() }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">Promedio Diario</span>
                            <span class="text-purple-500 font-bold">
                                {{ round($ordenes->filter(function($o) { return $o->created_at && $o->created_at->isCurrentMonth(); })->count() / 30, 1) }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Status Distribution -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-orange-600/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Distribución de Estados</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">Pendientes</span>
                            <span class="text-yellow-500 font-bold">{{ $ordenes->where('estado', 'pendiente')->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">En Proceso</span>
                            <span class="text-blue-500 font-bold">{{ $ordenes->where('estado', 'en_proceso')->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">Finalizadas</span>
                            <span class="text-green-500 font-bold">{{ $ordenes->where('estado', 'finalizado')->count() }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Acciones Rápidas</h3>
                    </div>
                    <div class="space-y-3">
                        <a href="{{ route('ordenes.create') }}" 
                           class="block w-full bg-red-600 text-white text-center py-2 rounded-lg hover:bg-red-700 transition-colors duration-300 font-semibold">
                            Nueva Orden
                        </a>
                        <button class="block w-full bg-gray-700 text-white text-center py-2 rounded-lg hover:bg-gray-600 transition-colors duration-300 font-semibold">
                            Exportar Reporte
                        </button>
                        <button class="block w-full bg-gray-700 text-white text-center py-2 rounded-lg hover:bg-gray-600 transition-colors duration-300 font-semibold">
                            Filtrar por Estado
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function toggleDescription(ordenId) {
    const shortDesc = document.getElementById('short-description-' + ordenId);
    const fullDesc = document.getElementById('full-description-' + ordenId);
    const toggleText = document.getElementById('toggle-text-' + ordenId);
    
    if (fullDesc.classList.contains('hidden')) {
        shortDesc.classList.add('hidden');
        fullDesc.classList.remove('hidden');
        toggleText.textContent = 'Ver menos...';
    } else {
        shortDesc.classList.remove('hidden');
        fullDesc.classList.add('hidden');
        toggleText.textContent = 'Ver más...';
    }
}
</script>

@endsection

<style>
.pagination-wrapper .pagination {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.pagination-wrapper .pagination .page-link {
    color: #fff;
    background-color: transparent;
    border: 1px solid #374151;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.3s;
}

.pagination-wrapper .pagination .page-link:hover {
    background-color: #dc2626;
    border-color: #dc2626;
    color: #fff;
}

.pagination-wrapper .pagination .page-item.active .page-link {
    background-color: #dc2626;
    border-color: #dc2626;
    color: #fff;
}
</style>