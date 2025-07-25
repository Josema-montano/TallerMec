@extends('layouts.app')
@section('title','Órdenes de Trabajo')
@section('header','Gestión de Órdenes de Trabajo')
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
                        ÓRDENES DE<br>
                        TRABAJO
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Control completo de todas las órdenes de trabajo del taller
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div>
                    <a href="{{ route('ordenes.create') }}" 
                       class="bg-gray-900 text-white px-8 py-4 font-semibold tracking-wider hover:bg-red-600 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        + NUEVA ORDEN
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Orders Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">ÓRDENES</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">TRABAJOS EN CURSO</h2>
                <p class="text-gray-600">Seguimiento detallado de todas las órdenes de trabajo</p>
            </div>
            
            <!-- Orders Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gray-900 text-white">
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 font-semibold tracking-wider text-sm">
                        <div class="col-span-2">FECHA INGRESO</div>
                        <div class="col-span-2">VEHÍCULO</div>
                        <div class="col-span-2">CLIENTE</div>
                        <div class="col-span-3">DESCRIPCIÓN PROBLEMA</div>
                        <div class="col-span-1">ESTADO</div>
                        <div class="col-span-2 text-center">ACCIONES</div>
                    </div>
                </div>
                
                <!-- Table Body -->
                <div class="divide-y divide-gray-100">
                    @forelse($ordenes as $o)
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 hover:bg-gray-50 transition-colors duration-200 items-center">
                        <!-- Entry Date -->
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($o->fecha_ingreso)->format('d/m/Y') }}</div>
                                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($o->fecha_ingreso)->format('H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vehicle Info -->
                        <div class="col-span-2">
                            <div class="bg-gray-900 text-white px-3 py-2 rounded-lg font-mono text-sm font-bold text-center shadow-md mb-2">
                                {{ $o->vehiculo->patente }}
                            </div>
                            <div class="text-xs text-gray-600 text-center font-medium">
                                {{ $o->vehiculo->marca }} {{ $o->vehiculo->modelo }}
                            </div>
                            <div class="text-xs text-gray-500 text-center">
                                {{ $o->vehiculo->color }}
                            </div>
                        </div>
                        
                        <!-- Client -->
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 text-sm">{{ $o->vehiculo->cliente->nombre }}</div>
                                    <div class="text-xs text-gray-500">{{ $o->vehiculo->cliente->telefono ?? 'Sin teléfono' }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Problem Description -->
                        <div class="col-span-3">
                            <div class="bg-gray-50 rounded-lg p-3 border-l-4 border-red-500">
                                @if($o->descripcion_problema)
                                    <div class="flex items-start">
                                        <svg class="w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 mb-1">Problema reportado:</div>
                                            <div class="text-sm text-gray-700 leading-relaxed">
                                                {{ Str::limit($o->descripcion_problema, 100) }}
                                            </div>
                                            @if(strlen($o->descripcion_problema) > 100)
                                                <button class="text-xs text-blue-600 hover:text-blue-800 mt-1 font-medium" 
                                                        onclick="toggleDescription({{ $o->id }})">
                                                    Ver más...
                                                </button>
                                                <div id="full-description-{{ $o->id }}" class="hidden text-sm text-gray-700 mt-2">
                                                    {{ $o->descripcion_problema }}
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
                                
                                @if($o->kilometraje)
                                    <div class="mt-2 pt-2 border-t border-gray-200">
                                        <div class="flex items-center text-xs text-gray-600">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            Kilometraje: {{ number_format($o->kilometraje) }} km
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="col-span-1">
                            <div class="text-center">
                                @switch($o->estado)
                                    @case('pendiente')
                                        <div class="bg-yellow-100 text-yellow-800 px-3 py-2 rounded-full font-bold text-xs shadow-sm">
                                            <svg class="w-3 h-3 inline mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <div class="mt-1">PENDIENTE</div>
                                        </div>
                                        @break
                                    @case('en_proceso')
                                        <div class="bg-blue-100 text-blue-800 px-3 py-2 rounded-full font-bold text-xs shadow-sm">
                                            <svg class="w-3 h-3 inline mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <div class="mt-1">PROCESO</div>
                                        </div>
                                        @break
                                    @case('finalizado')
                                        <div class="bg-green-100 text-green-800 px-3 py-2 rounded-full font-bold text-xs shadow-sm">
                                            <svg class="w-3 h-3 inline mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <div class="mt-1">FINALIZADO</div>
                                        </div>
                                        @break
                                    @case('cancelado')
                                        <div class="bg-red-100 text-red-800 px-3 py-2 rounded-full font-bold text-xs shadow-sm">
                                            <svg class="w-3 h-3 inline mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <div class="mt-1">CANCELADO</div>
                                        </div>
                                        @break
                                @endswitch
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="col-span-2 flex justify-center space-x-3">
                            <a href="{{ route('ordenes.edit', $o) }}" 
                               class="group bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('ordenes.destroy', $o) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Está seguro de eliminar esta orden de trabajo?')"
                                        class="group bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <!-- Empty State -->
                    <div class="px-8 py-16 text-center">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No hay órdenes de trabajo</h3>
                        <p class="text-gray-600 mb-6">Comienza creando la primera orden de trabajo</p>
                        <a href="{{ route('ordenes.create') }}" 
                           class="bg-gray-900 text-white px-6 py-3 font-semibold rounded-lg hover:bg-red-600 transition-colors duration-300">
                            + CREAR ORDEN
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Pagination -->
            @if($ordenes->hasPages())
            <div class="mt-12 flex justify-center">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    {{ $ordenes->links() }}
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
                <h2 class="text-3xl font-bold text-gray-900 mb-4">RESUMEN DE ÓRDENES</h2>
                <p class="text-gray-600">Métricas clave del flujo de trabajo del taller</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <!-- Total Orders -->
                <div class="group">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $ordenes->total() }}</div>
                    <div class="text-gray-600 font-medium">Total Órdenes</div>
                </div>
                
                <!-- Pending Orders -->
                <div class="group">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $ordenes->where('estado', 'pendiente')->count() }}</div>
                    <div class="text-gray-600 font-medium">Pendientes</div>
                </div>
                
                <!-- In Process -->
                <div class="group">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $ordenes->where('estado', 'en_proceso')->count() }}</div>
                    <div class="text-gray-600 font-medium">En Proceso</div>
                </div>
                
                <!-- Completed -->
                <div class="group">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $ordenes->where('estado', 'finalizado')->count() }}</div>
                    <div class="text-gray-600 font-medium">Finalizadas</div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function toggleDescription(ordenId) {
    const fullDescription = document.getElementById('full-description-' + ordenId);
    const button = event.target;
    
    if (fullDescription.classList.contains('hidden')) {
        fullDescription.classList.remove('hidden');
        button.textContent = 'Ver menos...';
    } else {
        fullDescription.classList.add('hidden');
        button.textContent = 'Ver más...';
    }
}
</script>

@endsection
