@extends('layouts.app')
@section('title','Crear Vehículo')
@section('header','Crear Nuevo Vehículo')
@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-16">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/vehiculos-hero.jpg') }}"
                 alt="Gestión de Vehículos"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/80"></div>
        </div>
        
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center">
                <div class="mb-8 lg:mb-0">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">NUEVO REGISTRO</div>
                    <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6 text-white">
                        CREAR NUEVO<br>
                        <span class="text-red-500">VEHÍCULO</span>
                    </h1>
                    <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                        Registre la información completa del vehículo para comenzar a gestionar sus servicios
                    </p>
                </div>
                
                <div class="flex gap-4">
                    <a href="{{ route('vehiculos.index') }}" 
                       class="bg-gray-700 text-white px-8 py-4 font-bold tracking-wider hover:bg-gray-600 transition-all duration-300 rounded-lg shadow-lg transform hover:-translate-y-1 border border-gray-600">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        VOLVER
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-black">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">FORMULARIO</div>
                <h2 class="text-3xl font-bold text-white mb-6">INFORMACIÓN DEL VEHÍCULO</h2>
                <p class="text-gray-300 text-lg">Complete todos los campos requeridos para registrar el vehículo</p>
            </div>
            
            <!-- Form Card -->
            <div class="bg-gray-900 rounded-2xl shadow-2xl border border-gray-700 overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 p-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mr-6 border border-white/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Datos del Vehículo</h3>
                            <p class="text-red-100">Información técnica y de identificación</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Body -->
                <div class="p-8">
                    <form action="{{ route('vehiculos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        
                        <!-- Owner Information Section -->
                        <div class="border-b border-gray-700 pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-indigo-600/20 rounded-xl flex items-center justify-center mr-4 border border-indigo-500/30">
                                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Propietario</h4>
                                    <p class="text-gray-400">Cliente propietario del vehículo</p>
                                </div>
                            </div>
                            
                            <!-- Client Selection -->
                            <div class="mb-6">
                                <label for="cliente_id" class="block text-sm font-semibold text-gray-300 mb-3">
                                    Cliente Propietario *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <select name="cliente_id" 
                                            id="cliente_id" 
                                            required 
                                            class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white appearance-none transition-all duration-300">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach($clientes as $c)
                                            <option value="{{ $c->id }}" {{ old('cliente_id') == $c->id ? 'selected' : '' }}>
                                                {{ $c->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('cliente_id')
                                    <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                        <p class="text-sm text-red-400 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Vehicle Information Section -->
                        <div class="border-b border-gray-700 pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-blue-600/20 rounded-xl flex items-center justify-center mr-4 border border-blue-500/30">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Información del Vehículo</h4>
                                    <p class="text-gray-400">Datos básicos del automóvil</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Brand -->
                                <div>
                                    <label for="marca" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Marca *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="marca"
                                               name="marca" 
                                               required 
                                               value="{{ old('marca') }}"
                                               placeholder="Toyota, Ford, Chevrolet..."
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                    </div>
                                    @error('marca')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                                
                                <!-- Model -->
                                <div>
                                    <label for="modelo" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Modelo *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="modelo"
                                               name="modelo" 
                                               required 
                                               value="{{ old('modelo') }}"
                                               placeholder="Corolla, Focus, Cruze..."
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                    </div>
                                    @error('modelo')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                                
                                <!-- Year -->
                                <div>
                                    <label for="anio" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Año *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <input type="number" 
                                               id="anio"
                                               name="anio" 
                                               min="1900" 
                                               max="2099" 
                                               required 
                                               value="{{ old('anio') }}"
                                               placeholder="2020"
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                    </div>
                                    @error('anio')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                                
                                <!-- Color -->
                                <div>
                                    <label for="color" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Color
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5v12a2 2 0 002 2h2V3zM15 3h2v12a2 2 0 01-2 2h-2V3zM17 21a4 4 0 004-4V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="color"
                                               name="color" 
                                               value="{{ old('color') }}"
                                               placeholder="Blanco, Negro, Rojo..."
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                    </div>
                                    @error('color')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Identification Section -->
                        <div class="border-b border-gray-700 pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-green-600/20 rounded-xl flex items-center justify-center mr-4 border border-green-500/30">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Identificación</h4>
                                    <p class="text-gray-400">Datos de identificación del vehículo</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- License Plate -->
                                <div>
                                    <label for="patente" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Placa/Patente *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="patente"
                                               name="patente" 
                                               required 
                                               value="{{ old('patente') }}"
                                               placeholder="ABC-123"
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 uppercase transition-all duration-300">
                                    </div>
                                    @error('patente')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                                
                                <!-- VIN -->
                                <div>
                                    <label for="vin" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Número VIN *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="vin"
                                               name="vin" 
                                               required 
                                               value="{{ old('vin') }}"
                                               placeholder="1HGBH41JXMN109186"
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 uppercase transition-all duration-300">
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Número de identificación del vehículo (17 caracteres)</p>
                                    @error('vin')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image Section -->
                        <div class="pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-yellow-600/20 rounded-xl flex items-center justify-center mr-4 border border-yellow-500/30">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Imagen del Vehículo</h4>
                                    <p class="text-gray-400">Fotografía del vehículo (opcional)</p>
                                </div>
                            </div>
                            
                            <!-- Image Upload -->
                            <div class="mb-6">
                                <label for="imagen" class="block text-sm font-semibold text-gray-300 mb-3">
                                    Imagen del Vehículo
                                </label>
                                
                                <!-- Upload Area -->
                                <div class="relative" id="upload-container">
                                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-600 border-dashed rounded-lg hover:border-yellow-500 transition-colors duration-300 bg-gray-800/50" id="upload-area">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" id="upload-icon">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <div class="flex text-sm text-gray-300">
                                                <label for="imagen" class="relative cursor-pointer bg-gray-700 rounded-md font-medium text-yellow-400 hover:text-yellow-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500 px-2 py-1">
                                                    <span>Subir una imagen</span>
                                                    <input id="imagen" name="imagen" type="file" accept="image/*" class="sr-only">
                                                </label>
                                                <p class="pl-1">o arrastrar y soltar</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 10MB</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Preview Area (Initially Hidden) -->
                                    <div class="hidden mt-4" id="preview-container">
                                        <div class="relative bg-gray-800 rounded-lg p-4 border-2 border-gray-600">
                                            <div class="flex items-center justify-between mb-3">
                                                <h4 class="text-sm font-semibold text-gray-300 flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    Vista Previa
                                                </h4>
                                                <button type="button" id="remove-image" class="text-red-400 hover:text-red-300 transition-colors duration-200">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <!-- Image Preview -->
                                            <div class="relative group">
                                                <img id="image-preview" src="/placeholder.svg" alt="Vista previa" class="w-full h-48 object-cover rounded-lg shadow-md">
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 rounded-lg flex items-center justify-center">
                                                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                        <button type="button" id="change-image" class="bg-gray-700 text-gray-200 px-4 py-2 rounded-lg shadow-lg hover:bg-gray-600 transition-colors duration-200 text-sm font-medium">
                                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                            Cambiar imagen
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Image Info -->
                                            <div class="mt-3 flex items-center justify-between text-sm text-gray-400">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    <span id="file-name">imagen.jpg</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                                                    </svg>
                                                    <span id="file-size">0 KB</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @error('imagen')
                                        <div class="mt-3 bg-red-600/20 border border-red-500/30 rounded-lg p-3">
                                            <p class="text-sm text-red-400 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-700">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-bold tracking-wider">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                GUARDAR VEHÍCULO
                            </button>
                            
                            <a href="{{ route('vehiculos.index') }}" 
                               class="flex-1 bg-gray-700 text-white px-8 py-4 rounded-lg hover:bg-gray-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-bold tracking-wider text-center border border-gray-600">
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
    <section class="py-16 bg-gray-900 border-t border-gray-700">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-gradient-to-r from-red-600/20 to-red-600/20 border border-red-500/30 rounded-2xl p-8">
                <div class="flex items-start">
                    <div class="w-16 h-16 bg-red-600/20 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 border border-red-500/30">
                        <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Información Importante</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <div class="flex items-center text-red-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Los campos marcados con (*) son obligatorios
                                </div>
                                <div class="flex items-center text-red-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    La placa debe ser única en el sistema
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center text-red-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    El VIN debe tener exactamente 17 caracteres
                                </div>
                                <div class="flex items-center text-red-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    La imagen es opcional pero recomendada
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-black border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-blue-600 mb-4 tracking-wider uppercase">GESTIÓN</div>
                <h2 class="text-3xl font-bold text-white mb-6">FUNCIONALIDADES DISPONIBLES</h2>
                <p class="text-gray-300 text-lg">Una vez creado el vehículo, podrás acceder a estas opciones</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-green-500/50">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-500/30">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Crear Órdenes</h3>
                    <p class="text-gray-400 text-sm">Generar órdenes de servicio para el vehículo</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-blue-500/50">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-500/30">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Historial de Servicios</h3>
                    <p class="text-gray-400 text-sm">Ver el registro completo de servicios</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-purple-500/50">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-purple-500/30">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Mantenimiento</h3>
                    <p class="text-gray-400 text-sm">Programar y gestionar mantenimientos</p>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Form validation and enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[required], select[required]');
    
    // Add real-time validation
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                validateField(this);
            }
        });
    });
    
    function validateField(field) {
        const value = field.value.trim();
        
        // Remove existing error styling
        field.classList.remove('border-red-500', 'focus:ring-red-500');
        field.classList.add('border-gray-600');
        
        if (field.hasAttribute('required') && !value) {
            field.classList.remove('border-gray-600');
            field.classList.add('border-red-500', 'focus:ring-red-500');
            return false;
        }
        
        // VIN validation (17 characters)
        if (field.name === 'vin' && value && value.length !== 17) {
            field.classList.remove('border-gray-600');
            field.classList.add('border-red-500', 'focus:ring-red-500');
            return false;
        }
        
        // Year validation
        if (field.name === 'anio' && value) {
            const year = parseInt(value);
            const currentYear = new Date().getFullYear();
            if (year < 1900 || year > currentYear + 1) {
                field.classList.remove('border-gray-600');
                field.classList.add('border-red-500', 'focus:ring-red-500');
                return false;
            }
        }
        
        return true;
    }
    
    // Form submission validation
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
    
    // Image upload functionality
    const fileInput = document.getElementById('imagen');
    const uploadArea = document.getElementById('upload-area');
    const previewContainer = document.getElementById('preview-container');
    const imagePreview = document.getElementById('image-preview');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    const removeImageBtn = document.getElementById('remove-image');
    const changeImageBtn = document.getElementById('change-image');

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function showPreview(file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            
            uploadArea.classList.add('hidden');
            previewContainer.classList.remove('hidden');
        };
        
        reader.readAsDataURL(file);
    }

    function hidePreview() {
        uploadArea.classList.remove('hidden');
        previewContainer.classList.add('hidden');
        imagePreview.src = '';
        fileName.textContent = '';
        fileSize.textContent = '';
        fileInput.value = '';
    }

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (!file.type.startsWith('image/')) {
                alert('Por favor selecciona un archivo de imagen válido.');
                return;
            }
            
            if (file.size > 10 * 1024 * 1024) {
                alert('El archivo es demasiado grande. El tamaño máximo es 10MB.');
                return;
            }
            
            showPreview(file);
        }
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('border-yellow-500', 'bg-yellow-600/10');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-yellow-500', 'bg-yellow-600/10');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-yellow-500', 'bg-yellow-600/10');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            
            if (!file.type.startsWith('image/')) {
                alert('Por favor selecciona un archivo de imagen válido.');
                return;
            }
            
            if (file.size > 10 * 1024 * 1024) {
                alert('El archivo es demasiado grande. El tamaño máximo es 10MB.');
                return;
            }
            
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;
            
            showPreview(file);
        }
    });

    removeImageBtn.addEventListener('click', function() {
        hidePreview();
    });

    changeImageBtn.addEventListener('click', function() {
        fileInput.click();
    });

    uploadArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Auto-format inputs
    const patenteInput = document.getElementById('patente');
    if (patenteInput) {
        patenteInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.toUpperCase();
        });
    }
    
    const vinInput = document.getElementById('vin');
    if (vinInput) {
        vinInput.addEventListener('input', function(e) {
            e.target.value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        });
    }
    
    // Form animation on load
    const formCard = document.querySelector('.bg-gray-900.rounded-2xl');
    if (formCard) {
        formCard.style.opacity = '0';
        formCard.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            formCard.style.transition = 'all 0.6s ease-out';
            formCard.style.opacity = '1';
            formCard.style.transform = 'translateY(0)';
        }, 100);
    }
});
</script>

@endsection