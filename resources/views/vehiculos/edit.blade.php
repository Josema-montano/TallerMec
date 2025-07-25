@extends('layouts.app')
@section('title','Editar Vehículo')
@section('header','Editar Vehículo')
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
                    <div class="text-sm font-semibold text-red-600 mb-2 tracking-wider">EDITAR</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        VEHÍCULO
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Modificar información del vehículo: <strong>{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</strong>
                    </p>
                </div>
                
                <!-- Right Content - Back Button -->
                <div>
                    <a href="{{ route('vehiculos.index') }}" 
                       class="bg-gray-600 text-white px-8 py-4 font-semibold tracking-wider hover:bg-gray-700 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        ← VOLVER
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">FORMULARIO</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">ACTUALIZAR INFORMACIÓN</h2>
                <p class="text-gray-600">Modifique los datos del vehículo</p>
            </div>
            
            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-8 text-white">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0M15 17a2 2 0 104 0"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Datos del Vehículo</h3>
                            <p class="text-blue-100">Información técnica y de identificación</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Body -->
                <div class="p-8">
                    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf 
                        @method('PUT')
                        
                        <!-- Owner Information Section -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">Propietario</h4>
                                    <p class="text-gray-600 text-sm">Cliente dueño del vehículo</p>
                                </div>
                            </div>
                            
                            <!-- Cliente Field -->
                            <div class="mb-6">
                                <label for="cliente_id" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Cliente *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <select name="cliente_id" 
                                            id="cliente_id"
                                            required 
                                            class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 text-gray-900 appearance-none bg-white">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach($clientes as $c)
                                            <option value="{{ $c->id }}" {{ $c->id == $vehiculo->cliente_id ? 'selected' : '' }}>
                                                {{ $c->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('cliente_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Vehicle Information Section -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0M15 17a2 2 0 104 0"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">Información del Vehículo</h4>
                                    <p class="text-gray-600 text-sm">Datos básicos del automóvil</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Marca Field -->
                                <div>
                                    <label for="marca" class="block text-sm font-semibold text-gray-700 mb-3">
                                        Marca *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="marca"
                                               name="marca" 
                                               required 
                                               value="{{ old('marca', $vehiculo->marca) }}"
                                               placeholder="Ej: Toyota, Ford, Chevrolet"
                                               class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 text-gray-900 placeholder-gray-400">
                                    </div>
                                    @error('marca')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <!-- Modelo Field -->
                                <div>
                                    <label for="modelo" class="block text-sm font-semibold text-gray-700 mb-3">
                                        Modelo *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="modelo"
                                               name="modelo" 
                                               required 
                                               value="{{ old('modelo', $vehiculo->modelo) }}"
                                               placeholder="Ej: Corolla, Focus, Cruze"
                                               class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 text-gray-900 placeholder-gray-400">
                                    </div>
                                    @error('modelo')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <!-- Año Field -->
                                <div>
                                    <label for="anio" class="block text-sm font-semibold text-gray-700 mb-3">
                                        Año *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <input type="number" 
                                               id="anio"
                                               name="anio" 
                                               required 
                                               min="1900" 
                                               max="2099"
                                               value="{{ old('anio', $vehiculo->anio) }}"
                                               placeholder="2020"
                                               class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 text-gray-900 placeholder-gray-400">
                                    </div>
                                    @error('anio')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <!-- Color Field -->
                                <div>
                                    <label for="color" class="block text-sm font-semibold text-gray-700 mb-3">
                                        Color
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5a2 2 0 00-2 2v12a4 4 0 004 4h2a2 2 0 002-2V5a2 2 0 00-2-2z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="color"
                                               name="color" 
                                               value="{{ old('color', $vehiculo->color) }}"
                                               placeholder="Ej: Blanco, Negro, Azul"
                                               class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 text-gray-900 placeholder-gray-400">
                                    </div>
                                    @error('color')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Identification Section -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">Identificación</h4>
                                    <p class="text-gray-600 text-sm">Datos de identificación del vehículo</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Patente Field -->
                                <div>
                                    <label for="patente" class="block text-sm font-semibold text-gray-700 mb-3">
                                        Patente *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="patente"
                                               name="patente" 
                                               required 
                                               value="{{ old('patente', $vehiculo->patente) }}"
                                               placeholder="ABC-123"
                                               class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-900 placeholder-gray-400 uppercase">
                                    </div>
                                    @error('patente')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                
                                <!-- VIN Field -->
                                <div>
                                    <label for="vin" class="block text-sm font-semibold text-gray-700 mb-3">
                                        VIN *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="vin"
                                               name="vin" 
                                               required 
                                               value="{{ old('vin', $vehiculo->vin) }}"
                                               placeholder="1HGBH41JXMN109186"
                                               class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-900 placeholder-gray-400 uppercase">
                                    </div>
                                    @error('vin')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image Section -->
                        <div class="pb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">Imagen del Vehículo</h4>
                                    <p class="text-gray-600 text-sm">Fotografía del automóvil (opcional)</p>
                                </div>
                            </div>
                            
                            <!-- Current Image Display -->
                            @if($vehiculo->imagen)
                                <div class="mb-6">
                                    <p class="text-sm font-semibold text-gray-700 mb-3">Imagen actual:</p>
                                    <div class="relative inline-block">
                                        <img src="{{ asset('storage/' . $vehiculo->imagen) }}" 
                                             alt="Imagen del vehículo" 
                                             class="max-w-xs h-48 object-cover rounded-lg shadow-lg border-2 border-gray-200">
                                        <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                            ACTUAL
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Image Upload Field -->
                            <div class="mb-6">
                                <label for="imagen" class="block text-sm font-semibold text-gray-700 mb-3">
                                    {{ $vehiculo->imagen ? 'Cambiar imagen (opcional)' : 'Subir imagen (opcional)' }}
                                </label>
                                
                                <!-- Upload Area -->
                                <div class="relative">
                                    <input type="file" 
                                           id="imagen"
                                           name="imagen" 
                                           accept="image/*"
                                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                           onchange="handleImagePreview(this)">
                                    
                                    <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-purple-400 hover:bg-purple-50 transition-all duration-300 cursor-pointer">
                                        <div id="upload-content">
                                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-gray-600 mb-2">
                                                <span class="font-semibold text-purple-600">Haz clic para subir</span> o arrastra una imagen aquí
                                            </p>
                                            <p class="text-sm text-gray-500">PNG, JPG, JPEG hasta 10MB</p>
                                        </div>
                                        
                                        <!-- Preview Area (hidden by default) -->
                                        <div id="preview-area" class="hidden">
                                            <img id="preview-image" class="max-w-full h-48 object-cover rounded-lg mx-auto mb-4" alt="Vista previa">
                                            <div id="file-info" class="text-sm text-gray-600 mb-4"></div>
                                            <div class="flex justify-center space-x-4">
                                                <button type="button" onclick="changeImage()" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                                                    Cambiar imagen
                                                </button>
                                                <button type="button" onclick="removeImage()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                                    Quitar imagen
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @error('imagen')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-semibold tracking-wider">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                ACTUALIZAR VEHÍCULO
                            </button>
                            
                            <a href="{{ route('vehiculos.index') }}" 
                               class="flex-1 bg-gray-600 text-white px-8 py-4 rounded-lg hover:bg-gray-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-semibold tracking-wider text-center">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                CANCELAR
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6">
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
                                Los campos marcados con (*) son obligatorios
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                La patente y VIN deben ser únicos en el sistema
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Si no cambias la imagen, se mantendrá la actual
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Puedes arrastrar y soltar imágenes en el área de carga
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function handleImagePreview(input) {
    const file = input.files[0];
    const uploadContent = document.getElementById('upload-content');
    const previewArea = document.getElementById('preview-area');
    const previewImage = document.getElementById('preview-image');
    const fileInfo = document.getElementById('file-info');
    
    if (file) {
        // Validar tipo de archivo
        if (!file.type.startsWith('image/')) {
            alert('Por favor selecciona un archivo de imagen válido.');
            input.value = '';
            return;
        }
        
        // Validar tamaño (10MB)
        if (file.size > 10 * 1024 * 1024) {
            alert('El archivo es demasiado grande. El tamaño máximo es 10MB.');
            input.value = '';
            return;
        }
        
        // Mostrar preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            fileInfo.innerHTML = `
                <p><strong>Archivo:</strong> ${file.name}</p>
                <p><strong>Tamaño:</strong> ${(file.size / 1024 / 1024).toFixed(2)} MB</p>
            `;
            uploadContent.classList.add('hidden');
            previewArea.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
}

function changeImage() {
    document.getElementById('imagen').click();
}

function removeImage() {
    const input = document.getElementById('imagen');
    const uploadContent = document.getElementById('upload-content');
    const previewArea = document.getElementById('preview-area');
    
    input.value = '';
    uploadContent.classList.remove('hidden');
    previewArea.classList.add('hidden');
}

// Drag and drop functionality
const uploadArea = document.getElementById('upload-area');
const imageInput = document.getElementById('imagen');

uploadArea.addEventListener('dragover', function(e) {
    e.preventDefault();
    uploadArea.classList.add('border-purple-400', 'bg-purple-50');
});

uploadArea.addEventListener('dragleave', function(e) {
    e.preventDefault();
    uploadArea.classList.remove('border-purple-400', 'bg-purple-50');
});

uploadArea.addEventListener('drop', function(e) {
    e.preventDefault();
    uploadArea.classList.remove('border-purple-400', 'bg-purple-50');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        imageInput.files = files;
        handleImagePreview(imageInput);
    }
});
</script>

@endsection
