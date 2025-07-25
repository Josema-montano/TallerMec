@extends('layouts.app')
@section('title','Clientes')
@section('header','Gestión de Clientes')
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
                        CLIENTES
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Administra la base de datos completa de clientes del taller
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div>
                    <a href="{{ route('clientes.create') }}" 
                       class="bg-gray-900 text-white px-8 py-4 font-semibold tracking-wider hover:bg-red-600 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        + NUEVO CLIENTE
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">CLIENTES</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">BASE DE DATOS DE CLIENTES</h2>
                <p class="text-gray-600">Información completa de todos los clientes registrados</p>
            </div>
            
            <!-- Clients Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($clientes as $c)
                <!-- Client Card -->
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold">{{ $c->nombre }}</h3>
                                    <p class="text-indigo-100 text-sm">Cliente</p>
                                </div>
                            </div>
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Contact Information -->
                        <div class="space-y-4 mb-6">
                            <!-- Email -->
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm text-gray-500">Email</div>
                                    <div class="font-semibold text-gray-900 truncate">{{ $c->email ?: 'No registrado' }}</div>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm text-gray-500">Teléfono</div>
                                    <div class="font-semibold text-gray-900">{{ $c->telefono ?: 'No registrado' }}</div>
                                </div>
                            </div>
                            
                            <!-- Vehicles Count -->
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm text-gray-500">Vehículos</div>
                                    <div class="font-semibold text-gray-900">{{ $c->vehiculos ? $c->vehiculos->count() : 0 }} registrados</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Statistics -->
                        <div class="grid grid-cols-1 gap-4 mb-6 p-4 bg-gray-50 rounded-lg text-center">
    <div class="flex flex-col items-center justify-center">
        <div class="text-2xl font-bold text-indigo-600">{{ $c->vehiculos->count() }}</div>
        <div class="text-xs text-gray-500">Vehículos</div>
    </div>
</div>

                        
                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <a href="{{ route('clientes.edit', $c) }}" 
                               class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg text-center font-semibold">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('clientes.destroy', $c) }}" method="POST" class="flex-1">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('¿Está seguro de eliminar este cliente?')"
                                        class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg font-semibold">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No hay clientes registrados</h3>
                        <p class="text-gray-600 mb-6">Comienza agregando el primer cliente al sistema</p>
                        <a href="{{ route('clientes.create') }}" 
                           class="bg-gray-900 text-white px-6 py-3 font-semibold rounded-lg hover:bg-red-600 transition-colors duration-300">
                            + AGREGAR CLIENTE
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($clientes->hasPages())
            <div class="mt-12 flex justify-center">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    {{ $clientes->links() }}
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
                <h2 class="text-3xl font-bold text-gray-900 mb-4">RESUMEN DE CLIENTES</h2>
                <p class="text-gray-600">Métricas clave de la base de clientes</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <!-- Total Clients -->
                <div class="group">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $clientes->total() }}</div>
                    <div class="text-gray-600 font-medium">Total Clientes</div>
                </div>
                
                <!-- Active Clients -->
                <div class="group">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $clientes->filter(function($c) { return $c->vehiculos && $c->vehiculos->count() > 0; })->count() }}</div>
                    <div class="text-gray-600 font-medium">Con Vehículos</div>
                </div>
                
                <!-- Total Vehicles -->
                <div class="group">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $clientes->sum(function($c) { return $c->vehiculos ? $c->vehiculos->count() : 0; }) }}</div>
                    <div class="text-gray-600 font-medium">Vehículos Totales</div>
                </div>
                
                <!-- New This Month -->
                <div class="group">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">
                        {{ $clientes->filter(function($c) { return $c->created_at && $c->created_at->isCurrentMonth(); })->count() }}
                    </div>
                    <div class="text-gray-600 font-medium">Nuevos Este Mes</div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
