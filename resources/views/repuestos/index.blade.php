@extends('layouts.app')
@section('title','Repuestos')
@section('header','Gestión de Repuestos')
@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/repuestos-hero.jpg') }}"
                 alt="Gestión de Repuestos"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">INVENTARIO</div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        GESTIÓN DE<br>
                        <span class="text-red-500">REPUESTOS</span>
                    </h1>
                    <p class="text-gray-300 text-xl leading-relaxed max-w-2xl">
                        Control completo del inventario de repuestos automotrices con seguimiento en tiempo real
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div class="hidden lg:block">
                    <a href="{{ route('repuestos.create') }}" 
                       class="group relative overflow-hidden bg-red-600 text-white px-10 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            NUEVO REPUESTO
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Button -->
            <div class="lg:hidden mt-8">
                <a href="{{ route('repuestos.create') }}" 
                   class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-300 rounded-lg shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    NUEVO REPUESTO
                </a>
            </div>
        </div>
    </section>

    <!-- Parts Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">INVENTARIO</div>
                <h2 class="text-4xl font-bold text-white mb-8">REPUESTOS EN STOCK</h2>
                <p class="text-gray-300 text-lg">Gestión completa del inventario de repuestos y piezas automotrices</p>
            </div>
            
            <!-- Parts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($repuestos as $r)
                <!-- Part Card -->
                <div class="relative bg-gray-900 rounded-xl overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50">
                    <!-- Card Header with Image -->
                    <div class="relative h-48 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden">
                        @if($r->imagen)
                            <img src="{{ asset('storage/'.$r->imagen) }}" 
                                 alt="Imagen {{ $r->nombre }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors duration-500"></div>
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-800">
                                <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Stock Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            @if($r->stock_actual > 10)
                                <div class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                    En Stock
                                </div>
                            @elseif($r->stock_actual > 0)
                                <div class="bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                    Bajo Stock
                                </div>
                            @else
                                <div class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                    Sin Stock
                                </div>
                            @endif
                        </div>
                        
                        <!-- Code Badge -->
                        <div class="absolute bottom-4 left-4 z-10">
                            <div class="bg-black/80 backdrop-blur-sm text-white px-3 py-2 rounded-lg font-mono text-sm font-bold border border-white/20">
                                {{ $r->codigo }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Part Info -->
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2 group-hover:text-red-500 transition-colors duration-300">
                                {{ $r->nombre }}
                            </h3>
                            <p class="text-gray-400 text-sm uppercase tracking-wide">Repuesto Automotriz</p>
                        </div>
                        
                        <!-- Details -->
                        <div class="space-y-4 mb-6">
                            <!-- Stock Info -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Stock Actual</div>
                                    <div class="font-bold text-white text-lg">{{ $r->stock_actual }} unidades</div>
                                </div>
                            </div>
                            
                            <!-- Price Info -->
                            <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Precio Unitario</div>
                                    <div class="font-bold text-white text-lg">${{ number_format($r->precio_unitario, 2) }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Statistics -->
                        <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-gray-800 rounded-lg border border-gray-700">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-red-500">{{ $r->stock_actual }}</div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Stock</div>
                            </div>
                            <div class="text-center border-l border-gray-700">
                                <div class="text-2xl font-bold text-green-500">${{ number_format($r->stock_actual * $r->precio_unitario, 0) }}</div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Valor Total</div>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-3">
                            
                            <a href="{{ route('repuestos.edit', $r) }}" 
                               class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('repuestos.destroy', $r) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Está seguro de eliminar este repuesto?')"
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
                            <img src="{{ asset('storage/images/interfaces/empty-parts.jpg') }}"
                                 alt="Sin repuestos"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/60"></div>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="w-32 h-32 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-8">
                                <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-4">NO HAY REPUESTOS REGISTRADOS</h3>
                            <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto">
                                Comienza construyendo tu inventario agregando el primer repuesto al sistema
                            </p>
                            <a href="{{ route('repuestos.create') }}" 
                               class="inline-block bg-red-600 text-white px-8 py-4 font-bold tracking-wider rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                AGREGAR PRIMER REPUESTO
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($repuestos->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-gray-900 rounded-xl shadow-2xl p-6 border border-gray-700">
                    <div class="pagination-wrapper text-white">
                        {{ $repuestos->links() }}
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
                <h2 class="text-4xl font-bold text-white mb-8">ESTADÍSTICAS DE INVENTARIO</h2>
                <p class="text-gray-300 text-lg">Análisis completo del control de repuestos</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Total Parts -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $repuestos->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Total Repuestos</div>
                </div>
                
                <!-- In Stock -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $repuestos->where('stock_actual', '>', 0)->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">En Stock</div>
                </div>
                
                <!-- Low Stock -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-yellow-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $repuestos->whereBetween('stock_actual', [1, 10])->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Stock Bajo</div>
                </div>
                
                <!-- Total Value -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">
                        ${{ number_format($repuestos->sum(function($r) { return $r->stock_actual * $r->precio_unitario; }), 0) }}
                    </div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Valor Total</div>
                </div>
            </div>
            
            <!-- Additional Analytics -->
            <div class="mt-12 grid md:grid-cols-2 gap-8">
                <!-- Stock Alerts -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Alertas de Stock</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">Sin Stock</span>
                            <span class="text-red-500 font-bold">{{ $repuestos->where('stock_actual', 0)->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center p-2 bg-gray-700 rounded">
                            <span class="text-gray-300">Stock Crítico (1-5)</span>
                            <span class="text-yellow-500 font-bold">{{ $repuestos->whereBetween('stock_actual', [1, 5])->count() }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Acciones Rápidas</h3>
                    </div>
                    <div class="space-y-3">
                        <a href="{{ route('repuestos.create') }}" 
                           class="block w-full bg-red-600 text-white text-center py-2 rounded-lg hover:bg-red-700 transition-colors duration-300 font-semibold">
                            Agregar Repuesto
                        </a>
                        <button class="block w-full bg-gray-700 text-white text-center py-2 rounded-lg hover:bg-gray-600 transition-colors duration-300 font-semibold">
                            Exportar Inventario
                        </button>
                    </div>
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