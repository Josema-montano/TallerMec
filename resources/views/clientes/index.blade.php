@extends('layouts.app')
@section('title','Clientes')
@section('header','Gestión de Clientes')
@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/clientes-hero.jpg') }}"
                 alt="Gestión de Clientes"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">GESTIÓN COMERCIAL</div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        BASE DE<br>
                        <span class="text-red-500">CLIENTES</span>
                    </h1>
                    <p class="text-gray-300 text-xl leading-relaxed max-w-2xl">
                        Administra la información completa de clientes con historial de servicios y seguimiento personalizado
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div class="hidden lg:block">
                    <a href="{{ route('clientes.create') }}" 
                       class="group relative overflow-hidden bg-red-600 text-white px-10 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            NUEVO CLIENTE
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Button -->
            <div class="lg:hidden mt-8">
                <a href="{{ route('clientes.create') }}" 
                   class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-300 rounded-lg shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    NUEVO CLIENTE
                </a>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">DIRECTORIO</div>
                <h2 class="text-4xl font-bold text-white mb-8">CLIENTES REGISTRADOS</h2>
                <p class="text-gray-300 text-lg">Base de datos completa con información detallada de contacto</p>
            </div>
            
            <!-- Clients Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($clientes as $c)
                <!-- Client Card -->
                <div class="relative bg-gray-900 rounded-xl overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold mb-1">{{ $c->nombre }}</h3>
                                    <p class="text-red-100 text-sm uppercase tracking-wide">Cliente Premium</p>
                                </div>
                            </div>
                            <div class="w-4 h-4 bg-green-400 rounded-full shadow-lg border-2 border-white"></div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Contact Information -->
                        <div class="space-y-4 mb-6">
                            <!-- Email -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Email</div>
                                    <div class="font-semibold text-white truncate">{{ $c->email ?: 'No registrado' }}</div>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Teléfono</div>
                                    <div class="font-semibold text-white">{{ $c->telefono ?: 'No registrado' }}</div>
                                </div>
                            </div>
                            
                            <!-- Vehicles -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Vehículos</div>
                                    <div class="font-semibold text-white">{{ $c->vehiculos ? $c->vehiculos->count() : 0 }} registrados</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Statistics -->
                        <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-red-500">{{ $c->vehiculos ? $c->vehiculos->count() : 0 }}</div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Vehículos</div>
                            </div>
                            <div class="text-center border-l border-r border-gray-700">
                                <div class="text-2xl font-bold text-blue-500">0</div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Servicios</div>
                            </div>

                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-3">
                            
                            <a href="{{ route('clientes.edit', $c) }}" 
                               class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('clientes.destroy', $c) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Está seguro de eliminar este cliente?')"
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
                            <img src="{{ asset('storage/images/interfaces/empty-clients.jpg') }}"
                                 alt="Sin clientes"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/60"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="w-32 h-32 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-8">
                                <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-4">NO HAY CLIENTES REGISTRADOS</h3>
                            <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto">
                                Comienza construyendo tu base de clientes agregando el primer registro al sistema
                            </p>
                            <a href="{{ route('clientes.create') }}" 
                               class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                AGREGAR PRIMER CLIENTE
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($clientes->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-gray-900 rounded-xl shadow-2xl p-6 border border-gray-700">
                    <div class="pagination-wrapper text-white">
                        {{ $clientes->links() }}
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
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">MÉTRICAS</div>
                <h2 class="text-4xl font-bold text-white mb-8">ESTADÍSTICAS DE CLIENTES</h2>
                <p class="text-gray-300 text-lg">Análisis detallado de la base de datos comercial</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Total Clients -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $clientes->total() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Total Clientes</div>
                </div>
                
                <!-- Active Clients -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $clientes->filter(function($c) { return $c->vehiculos && $c->vehiculos->count() > 0; })->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Con Vehículos</div>
                </div>
                
                <!-- Total Vehicles -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $clientes->sum(function($c) { return $c->vehiculos ? $c->vehiculos->count() : 0; }) }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Vehículos Totales</div>
                </div>
                
                <!-- New This Month -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">
                        {{ $clientes->filter(function($c) { return $c->created_at && $c->created_at->isCurrentMonth(); })->count() }}
                    </div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Nuevos Este Mes</div>
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