@extends('layouts.app')
@section('title','Vehículos')
@section('header','Gestión de Vehículos')
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
                        VEHÍCULOS
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Administra el registro completo de vehículos del taller
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div>
                    <a href="{{ route('vehiculos.create') }}" 
                       class="bg-gray-900 text-white px-8 py-4 font-semibold tracking-wider hover:bg-red-600 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        + NUEVO VEHÍCULO
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicles Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">REGISTRO</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">VEHÍCULOS REGISTRADOS</h2>
                <p class="text-gray-600">Lista completa de vehículos en el sistema</p>
            </div>
            
            <!-- Vehicles Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gray-900 text-white">
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 font-semibold tracking-wider text-sm">
                        <div class="col-span-2">IMAGEN</div>
                        <div class="col-span-2">PLACA</div>
                        <div class="col-span-3">MARCA / MODELO</div>
                        <div class="col-span-3">CLIENTE</div>
                        <div class="col-span-2 text-center">ACCIONES</div>
                    </div>
                </div>
                
                <!-- Table Body -->
                <div class="divide-y divide-gray-100">
                    @forelse($vehiculos as $v)
                    <div class="grid grid-cols-12 gap-4 px-8 py-6 hover:bg-gray-50 transition-colors duration-200 items-center">
                        <!-- Vehicle Image -->
                        <div class="col-span-2">
                            <div class="relative group">
                                <img src="{{ $v->imagen ? asset('storage/' . $v->imagen) : asset('images/default-vehiculo.png') }}"
                                     alt="{{ $v->marca }}" 
                                     class="w-24 h-16 object-cover rounded-lg shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg"></div>
                            </div>
                        </div>
                        
                        <!-- License Plate -->
                        <div class="col-span-2">
                            <div class="bg-gray-900 text-white px-3 py-2 rounded-lg font-mono text-sm font-bold text-center shadow-md">
                                {{ $v->patente }}
                            </div>
                        </div>
                        
                        <!-- Brand / Model -->
                        <div class="col-span-3">
                            <div class="font-bold text-gray-900 text-lg">{{ $v->marca }}</div>
                            <div class="text-gray-600 font-medium">{{ $v->modelo }}</div>
                        </div>
                        
                        <!-- Client -->
                        <div class="col-span-3">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $v->cliente?->nombre ?? 'Sin asignar' }}</div>
                                    <div class="text-sm text-gray-500">Cliente</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="col-span-2 flex justify-center space-x-3">
                            <a href="{{ route('vehiculos.edit', $v) }}" 
                               class="group bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('vehiculos.destroy', $v) }}" method="POST" 
                                  onsubmit="return confirm('¿Está seguro de eliminar este vehículo?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No hay vehículos registrados</h3>
                        <p class="text-gray-600 mb-6">Comienza agregando el primer vehículo al sistema</p>
                        <a href="{{ route('vehiculos.create') }}" 
                           class="bg-gray-900 text-white px-6 py-3 font-semibold rounded-lg hover:bg-red-600 transition-colors duration-300">
                            + AGREGAR VEHÍCULO
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Pagination -->
            @if($vehiculos->hasPages())
            <div class="mt-12 flex justify-center">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    {{ $vehiculos->links() }}
                </div>
            </div>
            @endif
        </div>
    </section>

   
</div>

@endsection
