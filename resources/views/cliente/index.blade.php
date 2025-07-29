@extends('layouts.cliente')

@section('title', 'Portal Cliente - Reservar Servicio')

@section('content')
<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/cliente-hero.jpg') }}"
                 alt="Portal Cliente"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="text-center text-white">
                <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">PORTAL CLIENTE</div>
                <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    BIENVENIDO A<br>
                    <span class="text-red-500">NUESTRO TALLER</span>
                </h1>
                <p class="text-gray-300 text-xl leading-relaxed max-w-3xl mx-auto mb-8">
                    Reserve su servicio mecánico de forma rápida y sencilla con seguimiento en tiempo real
                </p>
                <a href="#reservar" 
                   class="group relative overflow-hidden bg-red-600 text-white px-10 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105 inline-block">
                    <span class="relative z-10 flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        RESERVAR AHORA
                    </span>
                    <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">SERVICIOS</div>
                <h2 class="text-4xl font-bold text-white mb-8">NUESTROS SERVICIOS</h2>
                <p class="text-gray-300 text-lg max-w-3xl mx-auto">
                    Ofrecemos una amplia gama de servicios para mantener su vehículo en perfectas condiciones
                </p>
            </div>
            
            <!-- Services Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($servicios as $servicio)
                <div class="relative bg-gray-900 rounded-xl p-8 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50 group">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] rounded-xl"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <!-- Service Icon -->
                        <div class="w-20 h-20 bg-red-600/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-6 border border-red-500/30">
                            <div class="text-3xl">
                                @if(str_contains(strtolower($servicio->nombre), 'aceite'))
                                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                    </svg>
                                @elseif(str_contains(strtolower($servicio->nombre), 'freno'))
                                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                @elseif(str_contains(strtolower($servicio->nombre), 'alineación'))
                                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                @else
                                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                @endif
                            </div>
                        </div>
                        
                        <h3 class="text-xl font-bold text-white mb-4">{{ $servicio->nombre }}</h3>
                        <div class="text-3xl font-bold text-red-500 mb-2">${{ number_format($servicio->precio_hora, 0) }}</div>
                        <div class="text-gray-400 text-sm uppercase tracking-wide">Por Hora</div>
                    </div>
                    
                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-red-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none rounded-xl"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Reservation Form -->
    <section id="reservar" class="py-20 bg-gray-900 border-t border-gray-700">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">RESERVAR</div>
                <h2 class="text-4xl font-bold text-white mb-8">RESERVAR SERVICIO</h2>
                <p class="text-gray-300 text-lg">Complete el formulario para reservar su cita</p>
            </div>
            
            <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 overflow-hidden">
                <form action="{{ route('cliente.reservar') }}" method="POST" class="p-8 space-y-8">
                    @csrf
                    
                    <!-- Cliente Information -->
                    <div class="relative">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-5">
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] rounded-xl"></div>
                        </div>
                        
                        <div class="relative bg-gray-900 p-6 rounded-xl border border-gray-600">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Información del Cliente</h3>
                            </div>
                            
                            <div class="grid md:grid-cols-3 gap-6">
                                <div>
                                    <label for="cliente_nombre" class="block text-sm font-semibold text-gray-300 mb-3">Nombre Completo *</label>
                                    <input type="text" id="cliente_nombre" name="cliente_nombre" required 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('cliente_nombre') }}" placeholder="Ingrese su nombre completo">
                                    @error('cliente_nombre')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="cliente_email" class="block text-sm font-semibold text-gray-300 mb-3">Email *</label>
                                    <input type="email" id="cliente_email" name="cliente_email" required 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('cliente_email') }}" placeholder="ejemplo@correo.com">
                                    @error('cliente_email')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="cliente_telefono" class="block text-sm font-semibold text-gray-300 mb-3">Teléfono</label>
                                    <input type="tel" id="cliente_telefono" name="cliente_telefono" 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('cliente_telefono') }}" placeholder="+591 XXXXXXXX">
                                    @error('cliente_telefono')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vehicle Information -->
                    <div class="relative">
                        <div class="relative bg-gray-900 p-6 rounded-xl border border-gray-600">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-blue-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Información del Vehículo</h3>
                            </div>
                            
                            <div class="grid md:grid-cols-3 gap-6">
                                <div>
                                    <label for="vehiculo_patente" class="block text-sm font-semibold text-gray-300 mb-3">Patente *</label>
                                    <input type="text" id="vehiculo_patente" name="vehiculo_patente" required 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300 uppercase"
                                           value="{{ old('vehiculo_patente') }}" placeholder="ABC123">
                                    @error('vehiculo_patente')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="vehiculo_marca" class="block text-sm font-semibold text-gray-300 mb-3">Marca *</label>
                                    <input type="text" id="vehiculo_marca" name="vehiculo_marca" required 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('vehiculo_marca') }}" placeholder="Toyota, Ford, etc.">
                                    @error('vehiculo_marca')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="vehiculo_modelo" class="block text-sm font-semibold text-gray-300 mb-3">Modelo *</label>
                                    <input type="text" id="vehiculo_modelo" name="vehiculo_modelo" required 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('vehiculo_modelo') }}" placeholder="Corolla, Focus, etc.">
                                    @error('vehiculo_modelo')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.764-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="vehiculo_anio" class="block text-sm font-semibold text-gray-300 mb-3">Año *</label>
                                    <input type="number" id="vehiculo_anio" name="vehiculo_anio" required 
                                           min="1900" max="{{ date('Y') + 1 }}"
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('vehiculo_anio') }}" placeholder="2020">
                                    @error('vehiculo_anio')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="vehiculo_color" class="block text-sm font-semibold text-gray-300 mb-3">Color</label>
                                    <input type="text" id="vehiculo_color" name="vehiculo_color" 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                                           value="{{ old('vehiculo_color') }}" placeholder="Blanco, Negro, etc.">
                                    @error('vehiculo_color')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service Information -->
                    <div class="relative">
                        <div class="relative bg-gray-900 p-6 rounded-xl border border-gray-600">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-green-600/20 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Información del Servicio</h3>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="servicio_id" class="block text-sm font-semibold text-gray-300 mb-3">Tipo de Servicio *</label>
                                    <select id="servicio_id" name="servicio_id" required 
                                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white transition-all duration-300">
                                        <option value="" class="text-gray-400">Seleccione un servicio</option>
                                        @foreach($servicios as $servicio)
                                            <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }} class="text-white">
                                                {{ $servicio->nombre }} - ${{ number_format($servicio->precio_hora, 0) }}/hora
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('servicio_id')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="fecha_preferida" class="block text-sm font-semibold text-gray-300 mb-3">Fecha Preferida *</label>
                                    <input type="date" id="fecha_preferida" name="fecha_preferida" required 
                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white transition-all duration-300"
                                           value="{{ old('fecha_preferida') }}">
                                    @error('fecha_preferida')
                                        <p class="text-red-400 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <label for="descripcion_problema" class="block text-sm font-semibold text-gray-300 mb-3">Descripción del Problema</label>
                                <textarea id="descripcion_problema" name="descripcion_problema" rows="4" 
                                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300 resize-none"
                                          placeholder="Describa el problema o servicio que necesita en detalle...">{{ old('descripcion_problema') }}</textarea>
                                @error('descripcion_problema')
                                    <p class="text-red-400 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="text-center pt-6">
                        <button type="submit" 
                                class="group relative overflow-hidden bg-red-600 text-white px-12 py-4 font-bold tracking-wider hover:bg-red-700 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105">
                            <span class="relative z-10 flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                RESERVAR SERVICIO
                            </span>
                            <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-20 bg-black border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">GARANTÍA</div>
                <h2 class="text-4xl font-bold text-white mb-8">¿POR QUÉ ELEGIRNOS?</h2>
                <p class="text-gray-300 text-lg">Compromiso con la excelencia y satisfacción del cliente</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="relative bg-gray-900 rounded-xl p-8 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50 group">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] rounded-xl"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-yellow-600/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-6 border border-yellow-500/30">
                            <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Horarios Flexibles</h3>
                        <p class="text-gray-400 leading-relaxed">Atendemos de lunes a sábado con horarios convenientes para adaptarnos a su agenda</p>
                    </div>
                    
                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-yellow-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none rounded-xl"></div>
                </div>
                
                <!-- Feature 2 -->
                <div class="relative bg-gray-900 rounded-xl p-8 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50 group">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] rounded-xl"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-green-600/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-6 border border-green-500/30">
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Calidad Garantizada</h3>
                        <p class="text-gray-400 leading-relaxed">Técnicos certificados y repuestos originales para garantizar la máxima calidad en cada servicio</p>
                    </div>
                    
                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-green-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none rounded-xl"></div>
                </div>
                
                <!-- Feature 3 -->
                <div class="relative bg-gray-900 rounded-xl p-8 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50 group">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] rounded-xl"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-blue-600/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-6 border border-blue-500/30">
                            <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Seguimiento Online</h3>
                        <p class="text-gray-400 leading-relaxed">Consulte el estado de su vehículo en tiempo real y manténgase informado durante todo el proceso</p>
                    </div>
                    
                    <!-- Hover Effect Overlay -->
                    <div class="absolute inset-0 bg-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none rounded-xl"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Auto-uppercase license plate input
document.getElementById('vehiculo_patente').addEventListener('input', function(e) {
    e.target.value = e.target.value.toUpperCase();
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

@endsection