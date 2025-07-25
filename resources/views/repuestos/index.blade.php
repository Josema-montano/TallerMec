@extends('layouts.app')
@section('title','Repuestos')
@section('header','Gestión de Repuestos')
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
                    <div class="text-sm font-semibold text-red-600 mb-2 tracking-wider">INVENTARIO</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        REPUESTOS
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Control completo del inventario de repuestos y piezas
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div>
                    <a href="{{ route('repuestos.create') }}" 
                       class="bg-gray-900 text-white px-8 py-4 font-semibold tracking-wider hover:bg-red-600 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        + NUEVO REPUESTO
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Parts Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">INVENTARIO</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">REPUESTOS EN STOCK</h2>
                <p class="text-gray-600">Gestión completa del inventario de repuestos y piezas automotrices</p>
            </div>
            
            <!-- Parts Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gray-900 text-white">
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 font-semibold tracking-wider text-sm">
                        <div class="col-span-2">IMAGEN</div>
                        <div class="col-span-2">CÓDIGO</div>
                        <div class="col-span-3">NOMBRE</div>
                        <div class="col-span-1">STOCK</div>
                        <div class="col-span-2">PRECIO</div>
                        <div class="col-span-2 text-center">ACCIONES</div>
                    </div>
                </div>
                
                <!-- Table Body -->
                <div class="divide-y divide-gray-100">
                    @forelse($repuestos as $r)
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 hover:bg-gray-50 transition-colors duration-200 items-center">
                        <!-- Part Image -->
                        <div class="col-span-2">
                            <div class="relative group">
                                @if($r->imagen)
                                    <img src="{{ asset('storage/'.$r->imagen) }}" 
                                         alt="Imagen {{ $r->nombre }}" 
                                         class="w-24 h-16 object-cover rounded-lg shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                @else
                                    <div class="w-24 h-16 bg-gray-100 rounded-lg flex items-center justify-center shadow-md">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg"></div>
                            </div>
                        </div>
                        
                        <!-- Part Code -->
                        <div class="col-span-2">
                            <div class="bg-gray-100 text-gray-900 px-3 py-2 rounded-lg font-mono text-sm font-bold text-center shadow-sm">
                                {{ $r->codigo }}
                            </div>
                        </div>
                        
                        <!-- Part Name -->
                        <div class="col-span-3">
                            <div class="font-bold text-gray-900 text-lg">{{ $r->nombre }}</div>
                            <div class="text-gray-600 text-sm">Repuesto automotriz</div>
                        </div>
                        
                        <!-- Stock -->
                        <div class="col-span-1">
                            <div class="text-center">
                                @if($r->stock_actual > 10)
                                    <div class="bg-green-100 text-green-800 px-3 py-2 rounded-lg font-bold text-sm">
                                        {{ $r->stock_actual }}
                                    </div>
                                    <div class="text-xs text-green-600 mt-1">En stock</div>
                                @elseif($r->stock_actual > 0)
                                    <div class="bg-yellow-100 text-yellow-800 px-3 py-2 rounded-lg font-bold text-sm">
                                        {{ $r->stock_actual }}
                                    </div>
                                    <div class="text-xs text-yellow-600 mt-1">Bajo stock</div>
                                @else
                                    <div class="bg-red-100 text-red-800 px-3 py-2 rounded-lg font-bold text-sm">
                                        {{ $r->stock_actual }}
                                    </div>
                                    <div class="text-xs text-red-600 mt-1">Sin stock</div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Price -->
                        <div class="col-span-2">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">
                                    ${{ number_format($r->precio_unitario, 2) }}
                                </div>
                                <div class="text-sm text-gray-500">Precio unitario</div>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="col-span-2 flex justify-center space-x-3">
                            <a href="{{ route('repuestos.edit', $r) }}" 
                               class="group bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>
                            <form method="POST" action="{{ route('repuestos.destroy', $r) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Está seguro de eliminar este repuesto?')"
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No hay repuestos registrados</h3>
                        <p class="text-gray-600 mb-6">Comienza agregando el primer repuesto al inventario</p>
                        <a href="{{ route('repuestos.create') }}" 
                           class="bg-gray-900 text-white px-6 py-3 font-semibold rounded-lg hover:bg-red-600 transition-colors duration-300">
                            + AGREGAR REPUESTO
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Inventory Statistics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">ESTADÍSTICAS</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">CONTROL DE INVENTARIO</h2>
                <p class="text-gray-600">Métricas clave del inventario de repuestos</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <!-- Total Parts -->
                <div class="group">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $repuestos->count() }}</div>
                    <div class="text-gray-600 font-medium">Total Repuestos</div>
                </div>
                
                <!-- In Stock -->
                <div class="group">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $repuestos->where('stock_actual', '>', 0)->count() }}</div>
                    <div class="text-gray-600 font-medium">En Stock</div>
                </div>
                
                <!-- Low Stock -->
                <div class="group">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $repuestos->whereBetween('stock_actual', [1, 10])->count() }}</div>
                    <div class="text-gray-600 font-medium">Stock Bajo</div>
                </div>
                
                <!-- Total Value -->
                <div class="group">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">
                        ${{ number_format($repuestos->sum(function($r) { return $r->stock_actual * $r->precio_unitario; }), 0) }}
                    </div>
                    <div class="text-gray-600 font-medium">Valor Total</div>
                </div>
            </div>
        </div>
    </section>

    
</div>

@endsection
