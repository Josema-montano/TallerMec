@extends('layouts.app')
@section('title','Vehículos')
@section('header','Gestión de Vehículos')
@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/vehiculos-hero.jpg') }}"
                 alt="Gestión de Vehículos"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">GESTIÓN AUTOMOTRIZ</div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        REGISTRO DE<br>
                        <span class="text-red-500">VEHÍCULOS</span>
                    </h1>
                    <p class="text-gray-300 text-xl leading-relaxed max-w-2xl">
                        Administra el registro completo de vehículos con especificaciones técnicas detalladas y seguimiento integral
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div class="hidden lg:block">
                    <a href="{{ route('vehiculos.create') }}" 
                       class="group relative overflow-hidden bg-red-600 text-white px-10 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            NUEVO VEHÍCULO
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Button -->
            <div class="lg:hidden mt-8">
                <a href="{{ route('vehiculos.create') }}" 
                   class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-300 rounded-lg shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    NUEVO VEHÍCULO
                </a>
            </div>
        </div>
    </section>

    <!-- Vehicles Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">INVENTARIO</div>
                <h2 class="text-4xl font-bold text-white mb-8">VEHÍCULOS REGISTRADOS</h2>
                <p class="text-gray-300 text-lg">Control completo del parque automotor en el sistema</p>
            </div>

            <!-- Search Form -->
            <div class="mb-8">
                <form action="{{ route('vehiculos.index') }}" method="GET" class="flex items-center space-x-4">
                    <input type="text" name="search" placeholder="Buscar vehículos por patente, marca o modelo..." value="{{ request('search') }}"
                           class="flex-1 p-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50">
                    <button type="submit"
                            class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors duration-300">
                        Buscar
                    </button>
                </form>
            </div>
            
            <!-- Vehicles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($vehiculos as $v)
                <!-- Vehicle Card -->
                <div class="relative bg-gray-900 rounded-xl overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl">
                    <!-- Vehicle Image -->
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $v->imagen ? asset('storage/' . $v->imagen) : asset('storage/images/default/vehiculo-default.svg') }}"
                             alt="{{ $v->marca }} {{ $v->modelo }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        
                        <!-- License Plate -->
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-white text-black px-4 py-2 rounded-lg font-mono text-sm font-bold shadow-lg border-2 border-gray-300">
                                {{ $v->patente }}
                            </div>
                        </div>
                        
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4">
                            <div class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                                Activo
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Info -->
                    <div class="p-6">
                        <!-- Brand & Model -->
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-white mb-1">{{ $v->marca }}</h3>
                            <p class="text-red-500 font-semibold uppercase tracking-wide">{{ $v->modelo }}</p>
                        </div>
                        
                        <!-- Client Info -->
                        <div class="flex items-center mb-6 p-3 bg-gray-800 rounded-lg">
                            <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-white text-sm">{{ $v->cliente?->nombre ?? 'Sin asignar' }}</div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Propietario</div>
                            </div>
                        </div>
                        
                        <!-- Vehicle Details -->
                        <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                            <div>
                                <div class="text-gray-400 uppercase tracking-wide text-xs mb-1">Año</div>
                                <div class="text-white font-semibold">{{ $v->anio ?? 'N/A' }}</div>
                            </div>
                            <div>
                                <div class="text-gray-400 uppercase tracking-wide text-xs mb-1">Color</div>
                                <div class="text-white font-semibold">{{ $v->color ?? 'N/A' }}</div>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-2">
                           
                            <a href="{{ route('vehiculos.edit', $v) }}" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('vehiculos.destroy', $v) }}" method="POST" 
                                  onsubmit="return confirm('¿Está seguro de eliminar este vehículo?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="col-span-full">
                    <div class="relative bg-gray-900 rounded-2xl overflow-hidden p-16 text-center">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <img src="{{ asset('storage/images/interfaces/empty-vehicles.jpg') }}"
                                 alt="Sin vehículos"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/60"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="w-32 h-32 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-8">
                                <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-4">NO HAY VEHÍCULOS REGISTRADOS</h3>
                            <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto">
                                Comienza agregando el primer vehículo al sistema para gestionar el inventario automotor
                            </p>
                            <a href="{{ route('vehiculos.create') }}" 
                               class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                AGREGAR PRIMER VEHÍCULO
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($vehiculos->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-gray-900 rounded-xl shadow-2xl p-6 border border-gray-700">
                    <div class="pagination-wrapper text-white">
                        {{ $vehiculos->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Quick Stats Section -->
    <section class="py-16 bg-gray-900 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 gap-4 text-white">
                <!-- Total Vehicles -->
                <div class="text-center">
                    <div class="text-3xl font-bold text-red-500 mb-2">{{ $vehiculos->total() }}</div>
                    <div class="text-gray-400 uppercase tracking-wide text-sm">Total Vehículos</div>
                </div>
                

            </div>
        </div>
    </section>
</div>

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