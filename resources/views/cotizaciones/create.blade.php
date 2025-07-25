@extends('layouts.app')
@section('title','Crear Cotización')
@section('header','Crear Nueva Cotización')
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
                    <div class="text-sm font-semibold text-red-600 mb-2 tracking-wider">NUEVA</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        COTIZACIÓN
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Genera una nueva cotización para servicios y repuestos
                    </p>
                </div>
                
                <!-- Right Content - Back Button -->
                <div>
                    <a href="{{ route('cotizaciones.index') }}" 
                       class="bg-gray-600 text-white px-8 py-4 font-semibold tracking-wider hover:bg-gray-700 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        ← VOLVER
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Error Messages -->
    @if ($errors->any())
    <section class="py-4 bg-red-50">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <strong>Por favor corrige los siguientes errores:</strong>
                </div>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif

    <!-- Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">FORMULARIO</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">DATOS DE LA COTIZACIÓN</h2>
                <p class="text-gray-600">Complete la información para generar la cotización</p>
            </div>
            
            <form action="{{ route('cotizaciones.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <!-- Main Information Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-8 text-white">
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold">Información Principal</h3>
                                <p class="text-purple-100">Datos básicos de la cotización</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Work Order Selection -->
                            <div class="md:col-span-2">
                                <label for="orden_id" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Orden de Trabajo *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <select name="orden_id" 
                                            id="orden_id" 
                                            required
                                            class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 text-gray-900 bg-white">
                                        <option value="">Seleccione una orden de trabajo</option>
                                        @foreach ($ordenes as $orden)
                                            <option value="{{ $orden->id }}" {{ old('orden_id') == $orden->id ? 'selected' : '' }}>
                                                Orden #{{ $orden->id }} - 
                                                {{ $orden->vehiculo->marca ?? 'Marca N/D' }} {{ $orden->vehiculo->modelo ?? 'Modelo N/D' }} - 
                                                Color: {{ $orden->vehiculo->color ?? 'N/D' }} - 
                                                Cliente: {{ $orden->vehiculo->cliente->nombre ?? 'Cliente desconocido' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('orden_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Date -->
                            <div>
                                <label for="fecha" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Fecha de Cotización *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="date" 
                                           id="fecha"
                                           name="fecha" 
                                           required 
                                           value="{{ old('fecha', date('Y-m-d')) }}"
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 text-gray-900">
                                </div>
                                @error('fecha')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Service Price -->
                            <div>
                                <label for="total_servicio" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Precio del Servicio (Bs) *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                        </svg>
                                    </div>
                                    <input type="number" 
                                           step="0.01" 
                                           id="total_servicio"
                                           name="total_servicio" 
                                           required 
                                           value="{{ old('total_servicio', 0) }}"
                                           placeholder="0.00"
                                           class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 text-gray-900">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Precio estimado del servicio sin incluir repuestos</p>
                                @error('total_servicio')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Approval Status -->
                            <div class="md:col-span-2">
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <input type="checkbox" 
                                           name="aprobada" 
                                           id="aprobada" 
                                           value="1" 
                                           {{ old('aprobada') ? 'checked' : '' }}
                                           class="w-5 h-5 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                    <label for="aprobada" class="ml-3 text-sm font-medium text-gray-900">
                                        Marcar como aprobada
                                    </label>
                                    <div class="ml-auto">
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Opcional
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Parts Selection Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 p-8 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold">Repuestos a Utilizar</h3>
                                    <p class="text-green-100">Selecciona los repuestos necesarios</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-green-100">Total disponible</div>
                                <div class="text-2xl font-bold">{{ count($repuestos) }} repuestos</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-8">
                        @if(count($repuestos) > 0)
                            <div class="grid gap-4">
                                @foreach ($repuestos as $repuesto)
                                <div class="border-2 border-gray-200 rounded-lg p-6 hover:border-green-300 transition-colors duration-300 repuesto-item" data-repuesto-id="{{ $repuesto->id }}">
                                    <div class="flex items-center justify-between">
                                        <!-- Part Info -->
                                        <div class="flex items-center flex-1">
                                            <div class="flex items-center mr-6">
                                                <input type="checkbox" 
                                                       name="repuestos[{{ $repuesto->id }}][usar]" 
                                                       value="1"
                                                       id="repuesto-{{ $repuesto->id }}"
                                                       {{ old("repuestos.{$repuesto->id}.usar") ? 'checked' : '' }}
                                                       class="w-5 h-5 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2 repuesto-checkbox">
                                            </div>
                                            
                                            <div class="flex items-center flex-1">
                                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                    </svg>
                                                </div>
                                                
                                                <div class="flex-1">
                                                    <label for="repuesto-{{ $repuesto->id }}" class="font-bold text-gray-900 text-lg cursor-pointer">
                                                        {{ $repuesto->nombre }}
                                                    </label>
                                                    <div class="flex items-center space-x-4 mt-2">
                                                        <div class="flex items-center text-sm text-gray-600">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                                            </svg>
                                                            {{ number_format($repuesto->precio_unitario, 2) }} Bs/unidad
                                                        </div>
                                                        <div class="flex items-center text-sm {{ $repuesto->stock_actual > 10 ? 'text-green-600' : ($repuesto->stock_actual > 0 ? 'text-yellow-600' : 'text-red-600') }}">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                            </svg>
                                                            Stock: {{ $repuesto->stock_actual }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Quantity Input -->
                                        <div class="ml-6">
                                            <label for="cantidad-{{ $repuesto->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                                Cantidad
                                            </label>
                                            <div class="flex items-center">
                                                <button type="button" 
                                                        class="decrease-btn w-10 h-10 bg-gray-200 hover:bg-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed disabled:opacity-50 rounded-l-lg flex items-center justify-center transition-colors duration-200"
                                                        data-repuesto-id="{{ $repuesto->id }}">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                    </svg>
                                                </button>
                                                <input type="number" 
                                                       name="repuestos[{{ $repuesto->id }}][cantidad]" 
                                                       id="cantidad-{{ $repuesto->id }}"
                                                       min="1" 
                                                       max="{{ $repuesto->stock_actual }}"
                                                       value="{{ old("repuestos.{$repuesto->id}.cantidad", 1) }}"
                                                       class="w-20 h-10 text-center border-t border-b border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 disabled:bg-gray-100 disabled:cursor-not-allowed quantity-input"
                                                       disabled>
                                                <button type="button" 
                                                        class="increase-btn w-10 h-10 bg-gray-200 hover:bg-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed disabled:opacity-50 rounded-r-lg flex items-center justify-center transition-colors duration-200"
                                                        data-repuesto-id="{{ $repuesto->id }}"
                                                        data-max-stock="{{ $repuesto->stock_actual }}">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1">
                                                Stock disponible: {{ $repuesto->stock_actual }}
                                            </div>
                                            @error("repuestos.{$repuesto->id}.cantidad")
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">No hay repuestos disponibles</h3>
                                <p class="text-gray-600">No se encontraron repuestos en el inventario</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-semibold tracking-wider">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            GUARDAR COTIZACIÓN
                        </button>
                        
                        <a href="{{ route('cotizaciones.index') }}" 
                           class="flex-1 bg-gray-600 text-white px-8 py-4 rounded-lg hover:bg-gray-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-semibold tracking-wider text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            CANCELAR
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Help Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-blue-50 rounded-2xl p-8">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-6 flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-blue-900 mb-2">Información Importante</h3>
                        <ul class="text-blue-800 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Selecciona una orden de trabajo existente
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                El precio del servicio no incluye repuestos
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Solo puedes usar repuestos disponibles en stock
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Puedes marcar la cotización como aprobada directamente
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Definir funciones en el scope global ANTES del DOMContentLoaded
function toggleQuantityControls(repuestoId) {
    const checkbox = document.getElementById('repuesto-' + repuestoId);
    const quantityInput = document.getElementById('cantidad-' + repuestoId);
    const repuestoItem = document.querySelector('[data-repuesto-id="' + repuestoId + '"]');
    const decreaseBtn = repuestoItem.querySelector('.decrease-btn');
    const increaseBtn = repuestoItem.querySelector('.increase-btn');
    
    console.log('Toggle para repuesto:', repuestoId, 'Checked:', checkbox.checked);
    
    if (checkbox.checked) {
        // Habilitar controles
        quantityInput.disabled = false;
        quantityInput.classList.remove('bg-gray-100', 'cursor-not-allowed');
        
        decreaseBtn.disabled = false;
        decreaseBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        
        increaseBtn.disabled = false;
        increaseBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        
        // Cambiar apariencia del item
        repuestoItem.classList.add('border-green-300', 'bg-green-50');
        repuestoItem.classList.remove('border-gray-200');
        
        // Asegurar valor mínimo
        if (!quantityInput.value || quantityInput.value < 1) {
            quantityInput.value = 1;
        }
    } else {
        // Deshabilitar controles
        quantityInput.disabled = true;
        quantityInput.classList.add('bg-gray-100', 'cursor-not-allowed');
        
        decreaseBtn.disabled = true;
        decreaseBtn.classList.add('opacity-50', 'cursor-not-allowed');
        
        increaseBtn.disabled = true;
        increaseBtn.classList.add('opacity-50', 'cursor-not-allowed');
        
        // Restaurar apariencia del item
        repuestoItem.classList.remove('border-green-300', 'bg-green-50');
        repuestoItem.classList.add('border-gray-200');
        
        quantityInput.value = 1;
    }
}

function increaseQuantity(repuestoId, maxStock) {
    console.log('Increase quantity:', repuestoId, maxStock);
    const input = document.getElementById('cantidad-' + repuestoId);
    const checkbox = document.getElementById('repuesto-' + repuestoId);
    
    if (!checkbox.checked || input.disabled) {
        console.log('No se puede aumentar - checkbox no marcado o input deshabilitado');
        return;
    }
    
    let currentValue = parseInt(input.value) || 1;
    if (currentValue < maxStock) {
        input.value = currentValue + 1;
        console.log('Nueva cantidad:', input.value);
    }
}

function decreaseQuantity(repuestoId) {
    console.log('Decrease quantity:', repuestoId);
    const input = document.getElementById('cantidad-' + repuestoId);
    const checkbox = document.getElementById('repuesto-' + repuestoId);
    
    if (!checkbox.checked || input.disabled) {
        console.log('No se puede disminuir - checkbox no marcado o input deshabilitado');
        return;
    }
    
    let currentValue = parseInt(input.value) || 1;
    if (currentValue > 1) {
        input.value = currentValue - 1;
        console.log('Nueva cantidad:', input.value);
    }
}

// Cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('JavaScript cargado');
    
    // Configurar checkboxes
    document.querySelectorAll('.repuesto-checkbox').forEach(function(checkbox) {
        const repuestoId = checkbox.id.replace('repuesto-', '');
        console.log('Configurando checkbox para repuesto:', repuestoId);
        
        // Estado inicial
        toggleQuantityControls(repuestoId);
        
        // Event listener para cambios
        checkbox.addEventListener('change', function() {
            console.log('Checkbox cambió:', repuestoId, this.checked);
            toggleQuantityControls(repuestoId);
        });
    });
    
    // Configurar botones de incremento
    document.querySelectorAll('.increase-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const repuestoId = this.getAttribute('data-repuesto-id');
            const maxStock = parseInt(this.getAttribute('data-max-stock'));
            increaseQuantity(repuestoId, maxStock);
        });
    });
    
    // Configurar botones de decremento
    document.querySelectorAll('.decrease-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const repuestoId = this.getAttribute('data-repuesto-id');
            decreaseQuantity(repuestoId);
        });
    });
    
    // Validación de inputs de cantidad
    document.querySelectorAll('.quantity-input').forEach(function(input) {
        input.addEventListener('input', function() {
            let value = parseInt(this.value);
            const max = parseInt(this.getAttribute('max'));
            
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > max) {
                this.value = max;
            }
        });
    });
    
    console.log('JavaScript configurado completamente');
});
</script>

@endsection
