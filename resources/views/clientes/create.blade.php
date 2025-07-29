@extends('layouts.app')
@section('title','Crear Cliente')
@section('header','Crear Nuevo Cliente')
@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-16">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/clientes-hero.jpg') }}"
                 alt="Gestión de Clientes"
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
                        <span class="text-red-500">CLIENTE</span>
                    </h1>
                    <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                        Registre la información completa del cliente para comenzar a gestionar sus servicios
                    </p>
                </div>
                
                <div class="flex gap-4">
                    <a href="{{ route('clientes.index') }}" 
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
                <h2 class="text-3xl font-bold text-white mb-6">INFORMACIÓN DEL CLIENTE</h2>
                <p class="text-gray-300 text-lg">Complete todos los campos requeridos para registrar el cliente</p>
            </div>
            
            <!-- Form Card -->
            <div class="bg-gray-900 rounded-2xl shadow-2xl border border-gray-700 overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-700 p-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mr-6 border border-white/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Datos del Cliente</h3>
                            <p class="text-red-100">Información personal y de contacto</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Body -->
                <div class="p-8">
                    <form action="{{ route('clientes.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="border-b border-gray-700 pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-blue-600/20 rounded-xl flex items-center justify-center mr-4 border border-blue-500/30">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Información Personal</h4>
                                    <p class="text-gray-400">Datos básicos del cliente</p>
                                </div>
                            </div>
                            
                            <!-- Name Field -->
                            <div class="mb-6">
                                <label for="nombre" class="block text-sm font-semibold text-gray-300 mb-3">
                                    Nombre Completo *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           id="nombre"
                                           name="nombre" 
                                           required 
                                           value="{{ old('nombre') }}"
                                           placeholder="Ingrese el nombre completo del cliente"
                                           class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                </div>
                                @error('nombre')
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
                        
                        <!-- Contact Information Section -->
                        <div class="border-b border-gray-700 pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-green-600/20 rounded-xl flex items-center justify-center mr-4 border border-green-500/30">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Información de Contacto</h4>
                                    <p class="text-gray-400">Datos para comunicación</p>
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Email Field -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Correo Electrónico *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <input type="email" 
                                               id="email"
                                               name="email" 
                                               required 
                                               value="{{ old('email') }}"
                                               placeholder="cliente@ejemplo.com"
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                    </div>
                                    @error('email')
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
                                
                                <!-- Phone Field -->
                                <div>
                                    <label for="telefono" class="block text-sm font-semibold text-gray-300 mb-3">
                                        Teléfono
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               id="telefono"
                                               name="telefono" 
                                               value="{{ old('telefono') }}"
                                               placeholder="+591 70123456"
                                               class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                    </div>
                                    @error('telefono')
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
                        
                        <!-- Additional Information Section -->
                        <div class="pb-8">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-purple-600/20 rounded-xl flex items-center justify-center mr-4 border border-purple-500/30">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-white">Información Adicional</h4>
                                    <p class="text-gray-400">Datos complementarios (opcional)</p>
                                </div>
                            </div>
                            
                            <!-- Address Field -->
                            <div class="mb-6">
                                <label for="direccion" class="block text-sm font-semibold text-gray-300 mb-3">
                                    Dirección
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           id="direccion"
                                           name="direccion" 
                                           value="{{ old('direccion') }}"
                                           placeholder="Dirección completa del cliente"
                                           class="w-full pl-12 pr-4 py-4 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300">
                                </div>
                                @error('direccion')
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
                        
                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-700">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-bold tracking-wider">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                GUARDAR CLIENTE
                            </button>
                            
                            <a href="{{ route('clientes.index') }}" 
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
            <div class="bg-gradient-to-r from-blue-600/20 to-indigo-600/20 border border-blue-500/30 rounded-2xl p-8">
                <div class="flex items-start">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 border border-blue-500/30">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Información Importante</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <div class="flex items-center text-blue-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Los campos marcados con (*) son obligatorios
                                </div>
                                <div class="flex items-center text-blue-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    El email debe ser único en el sistema
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center text-blue-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Después podrás agregar vehículos al cliente
                                </div>
                                <div class="flex items-center text-blue-200">
                                    <div class="w-6 h-6 bg-green-600/20 rounded-lg flex items-center justify-center mr-3 border border-green-500/30">
                                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Todos los datos pueden editarse después
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
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">GESTIÓN</div>
                <h2 class="text-3xl font-bold text-white mb-6">FUNCIONALIDADES DISPONIBLES</h2>
                <p class="text-gray-300 text-lg">Una vez creado el cliente, podrás acceder a estas opciones</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-blue-500/50">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-500/30">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Agregar Vehículos</h3>
                    <p class="text-gray-400 text-sm">Registrar todos los vehículos del cliente</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-green-500/50">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-500/30">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Crear Órdenes</h3>
                    <p class="text-gray-400 text-sm">Generar órdenes de servicio</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-purple-500/50">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-purple-500/30">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Historial de Servicios</h3>
                    <p class="text-gray-400 text-sm">Ver el registro completo de servicios</p>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Form validation and enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[required]');
    
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
        const fieldContainer = field.closest('div').parentElement;
        
        // Remove existing error styling
        field.classList.remove('border-red-500', 'focus:ring-red-500');
        field.classList.add('border-gray-600', 'focus:ring-red-500');
        
        if (field.hasAttribute('required') && !value) {
            field.classList.remove('border-gray-600', 'focus:ring-red-500');
            field.classList.add('border-red-500', 'focus:ring-red-500');
            return false;
        }
        
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                field.classList.remove('border-gray-600', 'focus:ring-red-500');
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
            // Scroll to first error
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
    
    // Phone number formatting
    const phoneInput = document.getElementById('telefono');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.startsWith('591')) {
                    value = '+' + value;
                } else if (!value.startsWith('+')) {
                    value = '+591' + value;
                }
            }
            e.target.value = value;
        });
    }
    
    // Auto-capitalize name
    const nameInput = document.getElementById('nombre');
    if (nameInput) {
        nameInput.addEventListener('input', function(e) {
            const words = e.target.value.toLowerCase().split(' ');
            const capitalizedWords = words.map(word => 
                word.charAt(0).toUpperCase() + word.slice(1)
            );
            e.target.value = capitalizedWords.join(' ');
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