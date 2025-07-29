@extends('layouts.cliente')

@section('title', 'Mis Órdenes - Portal Cliente')

@section('content')
<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-16">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/cliente-hero.jpg') }}"
                 alt="Mis Órdenes"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/80"></div>
        </div>
        
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="text-center text-white">
                <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">PORTAL CLIENTE</div>
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6">
                    MIS ÓRDENES DE<br>
                    <span class="text-red-500">SERVICIO</span>
                </h1>
                <p class="text-gray-300 text-lg leading-relaxed max-w-3xl mx-auto">
                    Consulte el estado de sus servicios y deje sus comentarios
                </p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-16 bg-black">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-gray-900 rounded-2xl shadow-2xl border border-gray-700 p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Consultar Órdenes</h2>
                </div>
                
                <form action="{{ route('cliente.mis-ordenes') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label for="email" class="block text-sm font-semibold text-gray-300 mb-3">Ingrese su email para consultar sus órdenes</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300"
                            value="{{ request('email') }}" 
                            placeholder="su-email@ejemplo.com"
                            autocomplete="email">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-red-600 text-white px-8 py-3 font-bold tracking-wider hover:bg-red-700 transition-all duration-300 rounded-lg shadow-lg">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                BUSCAR
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if(isset($ordenes) && $ordenes->count() > 0)
        <!-- Orders Section -->
        <section class="py-16 bg-gray-900 border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">RESULTADOS</div>
                    <h2 class="text-3xl font-bold text-white mb-6">SUS ÓRDENES DE SERVICIO</h2>
                    <p class="text-gray-300 text-lg">Se encontraron {{ $ordenes->count() }} {{ $ordenes->count() == 1 ? 'orden' : 'órdenes' }}</p>
                </div>
                
                <div class="space-y-8">
                    @foreach($ordenes as $orden)
                    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-600 p-8 hover:border-red-500/50 transition-all duration-500">
                        <!-- Order Header -->
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                            <div class="flex items-center mb-4 lg:mb-0">
                                <div class="w-16 h-16 bg-blue-600/20 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-1">
                                        {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }}
                                    </h3>
                                    <div class="flex items-center text-gray-400">
                                        <span class="text-lg font-mono bg-gray-700 px-3 py-1 rounded-lg mr-3">{{ $orden->vehiculo->patente }}</span>
                                        <span>{{ $orden->vehiculo->anio }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @php
                                    $estadoClasses = [
                                        'pendiente' => 'bg-yellow-600/20 text-yellow-400 border-yellow-500/30',
                                        'en_proceso' => 'bg-blue-600/20 text-blue-400 border-blue-500/30',
                                        'finalizado' => 'bg-green-600/20 text-green-400 border-green-500/30',
                                        'cancelado' => 'bg-red-600/20 text-red-400 border-red-500/30'
                                    ];
                                    $estadoTextos = [
                                        'pendiente' => 'Pendiente',
                                        'en_proceso' => 'En Proceso',
                                        'finalizado' => 'Finalizado',
                                        'cancelado' => 'Cancelado'
                                    ];
                                @endphp
                                <div class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold border {{ $estadoClasses[$orden->estado] ?? 'bg-gray-600/20 text-gray-400 border-gray-500/30' }}">
                                    {{ $estadoTextos[$orden->estado] ?? ucfirst($orden->estado) }}
                                </div>
                            </div>
                        </div>

                        <!-- Order Details Grid -->
                        <div class="grid md:grid-cols-3 gap-6 mb-6">
                            <div class="bg-gray-700/50 p-4 rounded-xl">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-300 uppercase tracking-wide">Fecha Ingreso</span>
                                </div>
                                <p class="text-white font-bold text-lg">{{ $orden->fecha_ingreso->format('d/m/Y') }}</p>
                            </div>
                            
                            @if($orden->fecha_estimada_fin)
                            <div class="bg-gray-700/50 p-4 rounded-xl">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-300 uppercase tracking-wide">Fecha Estimada</span>
                                </div>
                                <p class="text-white font-bold text-lg">{{ $orden->fecha_estimada_fin->format('d/m/Y') }}</p>
                            </div>
                            @endif
                            
                            @if($orden->fecha_entrega)
                            <div class="bg-gray-700/50 p-4 rounded-xl">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-300 uppercase tracking-wide">Fecha Entrega</span>
                                </div>
                                <p class="text-white font-bold text-lg">{{ $orden->fecha_entrega->format('d/m/Y') }}</p>
                            </div>
                            @endif
                            
                            @if($orden->kilometraje)
                            <div class="bg-gray-700/50 p-4 rounded-xl">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-300 uppercase tracking-wide">Kilometraje</span>
                                </div>
                                <p class="text-white font-bold text-lg">{{ number_format($orden->kilometraje) }} km</p>
                            </div>
                            @endif
                        </div>

                        @if($orden->descripcion_problema)
                            <div class="mb-6">
                                <div class="bg-gray-700/30 border border-gray-600 rounded-xl p-6">
                                    <div class="flex items-center mb-3">
                                        <svg class="w-5 h-5 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-300 uppercase tracking-wide">Problema Reportado</span>
                                    </div>
                                    <p class="text-white leading-relaxed">{{ $orden->descripcion_problema }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Comments Section -->
                        @if($orden->estado === 'finalizado')
                            <div class="border-t border-gray-600 pt-6">
                                <div class="flex items-center mb-6">
                                    <div class="w-10 h-10 bg-yellow-600/20 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-white">Comentarios y Calificación</h4>
                                </div>
                                
                                @if($orden->comentarios->count() > 0)
                                    @foreach($orden->comentarios as $comentario)
                                        <div class="bg-gray-700/50 border border-gray-600 rounded-xl p-6 mb-4">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-red-600/20 rounded-full flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <span class="text-white font-semibold">{{ $comentario->cliente->nombre }}</span>
                                                        <p class="text-gray-400 text-sm">{{ $comentario->fecha_comentario->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                </div>
                                                @if($comentario->calificacion)
                                                    <div class="flex items-center bg-yellow-600/20 px-3 py-1 rounded-lg">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg class="w-4 h-4 {{ $i <= $comentario->calificacion ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                            </svg>
                                                        @endfor
                                                        <span class="ml-2 text-sm text-yellow-400 font-semibold">({{ $comentario->calificacion }}/5)</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <p class="text-gray-200 leading-relaxed">{{ $comentario->comentario }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <!-- Comment Form -->
                                    <div class="bg-gradient-to-r from-blue-600/20 to-green-600/20 border border-blue-500/30 rounded-xl p-6">
                                        <div class="flex items-center mb-4">
                                            <svg class="w-6 h-6 text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <p class="text-blue-200 font-semibold">
                                                Su servicio ha sido completado. ¡Nos encantaría conocer su opinión!
                                            </p>
                                        </div>
                                        
                                        <form action="{{ route('cliente.comentario') }}" method="POST" class="space-y-6">
                                            @csrf
                                            <input type="hidden" name="orden_id" value="{{ $orden->id }}">
                                            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                                            
                                            <div>
                                                <label for="calificacion_{{ $orden->id }}" class="block text-sm font-semibold text-gray-300 mb-3">Calificación</label>
                                                <div class="flex items-center space-x-2">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <input type="radio" id="star_{{ $orden->id }}_{{ $i }}" name="calificacion" value="{{ $i }}" class="hidden" required>
                                                        <label for="star_{{ $orden->id }}_{{ $i }}" class="cursor-pointer text-3xl text-gray-500 hover:text-yellow-400 transition-colors star-rating" data-rating="{{ $i }}">
                                                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                            </svg>
                                                        </label>
                                                    @endfor
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <label for="comentario_{{ $orden->id }}" class="block text-sm font-semibold text-gray-300 mb-3">Comentario</label>
                                                <textarea id="comentario_{{ $orden->id }}" name="comentario" rows="4" required
                                                          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-white placeholder-gray-400 transition-all duration-300 resize-none"
                                                          placeholder="Comparta su experiencia con nuestro servicio..."></textarea>
                                            </div>
                                            
                                            <button type="submit" class="bg-red-600 text-white px-6 py-3 font-bold tracking-wider hover:bg-red-700 transition-all duration-300 rounded-lg shadow-lg">
                                                <span class="flex items-center">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                    </svg>
                                                    ENVIAR COMENTARIO
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @elseif(request('email'))
        <!-- No Orders Found -->
        <section class="py-16 bg-gray-900 border-t border-gray-700">
            <div class="max-w-4xl mx-auto px-6">
                <div class="bg-gradient-to-r from-yellow-600/20 to-orange-600/20 border border-yellow-500/30 rounded-2xl p-12 text-center">
                    <div class="w-24 h-24 bg-yellow-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">No se encontraron órdenes</h3>
                    <p class="text-gray-300 text-lg mb-6">No hay órdenes de servicio asociadas al email: <span class="text-yellow-400 font-semibold">{{ request('email') }}</span></p>
                    <p class="text-gray-400">Verifique que el email sea correcto o contacte con nuestro taller para más información.</p>
                </div>
            </div>
        </section>
    @else
        <!-- Initial State -->
        <section class="py-16 bg-gray-900 border-t border-gray-700">
            <div class="max-w-4xl mx-auto px-6">
                <div class="bg-gradient-to-r from-gray-700/50 to-gray-600/50 border border-gray-600 rounded-2xl p-12 text-center">
                    <div class="w-24 h-24 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Consulte sus órdenes</h3>
                    <p class="text-gray-300 text-lg mb-6">Ingrese su email en el formulario de arriba para ver sus órdenes de servicio.</p>
                    <p class="text-gray-400">Manténgase informado del estado de sus vehículos en tiempo real.</p>
                </div>
            </div>
        </section>
    @endif

    <!-- Info Section -->
    <section class="py-20 bg-black border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">SEGUIMIENTO</div>
                <h2 class="text-4xl font-bold text-white mb-8">ESTADO EN TIEMPO REAL</h2>
                <p class="text-gray-300 text-lg">Manténgase informado del progreso de su vehículo</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-yellow-500/50">
                    <div class="w-16 h-16 bg-yellow-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-yellow-500/30">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Pendiente</h3>
                    <p class="text-gray-400 text-sm">En espera de revisión</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-blue-500/50">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-500/30">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">En Proceso</h3>
                    <p class="text-gray-400 text-sm">Siendo reparado</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-green-500/50">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-500/30">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Finalizado</h3>
                    <p class="text-gray-400 text-sm">Listo para entrega</p>
                </div>
                
                <div class="bg-gray-900 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50">
                    <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-red-500/30">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Cancelado</h3>
                    <p class="text-gray-400 text-sm">Servicio cancelado</p>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Star rating functionality
document.addEventListener('DOMContentLoaded', function() {
    const starRatings = document.querySelectorAll('.star-rating');
    
    starRatings.forEach(star => {
        star.addEventListener('click', function() {
            const rating = parseInt(this.dataset.rating);
            const form = this.closest('form');
            const stars = form.querySelectorAll('.star-rating');
            
            // Update visual state
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('text-gray-500');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-500');
                }
            });
            
            // Set the radio button
            const radioButton = form.querySelector(`input[name="calificacion"][value="${rating}"]`);
            if (radioButton) {
                radioButton.checked = true;
            }
        });
        
        star.addEventListener('mouseenter', function() {
            const rating = parseInt(this.dataset.rating);
            const form = this.closest('form');
            const stars = form.querySelectorAll('.star-rating');
            
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.add('text-yellow-400');
                    s.classList.remove('text-gray-500');
                } else {
                    s.classList.add('text-gray-500');
                    s.classList.remove('text-yellow-400');
                }
            });
        });
        
        star.addEventListener('mouseleave', function() {
            const form = this.closest('form');
            const stars = form.querySelectorAll('.star-rating');
            const checkedRadio = form.querySelector('input[name="calificacion"]:checked');
            const checkedRating = checkedRadio ? parseInt(checkedRadio.value) : 0;
            
            stars.forEach((s, index) => {
                if (index < checkedRating) {
                    s.classList.add('text-yellow-400');
                    s.classList.remove('text-gray-500');
                } else {
                    s.classList.add('text-gray-500');
                    s.classList.remove('text-yellow-400');
                }
            });
        });
    });
});
</script>

@endsection