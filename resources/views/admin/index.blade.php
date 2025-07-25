@extends('layouts.app')

@section('title','Dashboard Administrador')

@section('content')

<div class="min-h-screen bg-white">

   <section class="relative bg-gray-900 py-32">
    <!-- Imagen de fondo con overlay oscuro -->
    <div class="absolute inset-0">
        <img src="{{ asset('storage/images/interfaces/ferra-fondo.jpg') }}"
             alt="Dashboard Analytics"
             class="w-full h-full object-cover">
        <!-- Overlay negro al 40 % -->
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- Decorativos (triángulo rojo) -->
    <div class="absolute top-0 left-0 w-0 h-0
                border-l-[160px] border-l-red-600
                border-b-[100px] border-b-transparent z-10"></div>

    <!-- Contenido -->
    <div class="relative z-20 max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-white">
                <div class="mb-8">
                    <div class="text-sm font-semibold text-white-400 mb-4 tracking-wider">
                        DASHBOARD ADMINISTRATIVO
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        DASHBOARD<br>
                        TALLER<br>
                        <span class="text-white-400">MECÁNICO</span>
                    </h1>
                    <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                        Panel de control integral para la gestión completa de tu taller automotriz
                    </p>
                </div>
            </div>

            <!-- Columna derecha vacía o con contenido opcional -->
            <div></div>
        </div>
    </div>
</section>

    <!-- KPI Cards Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">MÉTRICAS</div>
                <h2 class="text-4xl font-bold text-white mb-8">PRINCIPALES</h2>
                <p class="text-gray-300 text-lg">Monitoreo en tiempo real del rendimiento del taller</p>
            </div>
            
            <!-- KPI Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Clientes -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-300">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/cliente2.jpg') }}" 
                             alt="Clientes" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/70"></div>
                    </div>
                    
                    <div class="relative z-10 p-8 text-center text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-red-500 mb-2">{{ \App\Models\Cliente::count() }}</div>
                        <div class="text-white font-semibold uppercase tracking-wide">CLIENTES</div>
                    </div>
                </div>

                <!-- Vehículos -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-300">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/coche2.jpeg') }}" 
                             alt="Vehículos" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/70"></div>
                    </div>
                    
                    <div class="relative z-10 p-8 text-center text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-red-500 mb-2">{{ \App\Models\Vehiculo::count() }}</div>
                        <div class="text-white font-semibold uppercase tracking-wide">VEHÍCULOS</div>
                    </div>
                </div>

                <!-- Órdenes -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-300">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/cotizacion2.jpg') }}" 
                             alt="Órdenes" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/70"></div>
                    </div>
                    
                    <div class="relative z-10 p-8 text-center text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-red-500 mb-2">{{ \App\Models\OrdenTrabajo::count() }}</div>
                        <div class="text-white font-semibold uppercase tracking-wide">ÓRDENES</div>
                    </div>
                </div>

                <!-- Stock Repuestos -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-300">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/repuesto2.jpg') }}" 
                             alt="Repuestos" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/70"></div>
                    </div>
                    
                    <div class="relative z-10 p-8 text-center text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-red-500 mb-2">{{ \App\Models\Repuesto::sum('stock_actual') }}</div>
                        <div class="text-white font-semibold uppercase tracking-wide">STOCK REPUESTOS</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">ACCESOS</div>
                <h2 class="text-4xl font-bold text-white mb-8">RÁPIDOS</h2>
                <p class="text-gray-300 text-lg">Navegación directa a las secciones principales del sistema</p>
            </div>
            
            <!-- Quick Access Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Clientes -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/cliente.jpg') }}" 
                             alt="Gestión de Clientes" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/70 to-black/50"></div>
                    </div>
                    
                    <div class="relative z-10 p-10 text-center text-white min-h-[400px] flex flex-col justify-between">
                        <div>
                            <h3 class="text-3xl font-bold mb-6 uppercase tracking-wider">CLIENTES</h3>
                            <div class="text-red-500 text-5xl font-bold mb-6">{{ \App\Models\Cliente::count() }}</div>
                            <p class="text-gray-200 text-lg mb-8 leading-relaxed">Gestiona la información completa de tus clientes y su historial de servicios automotrices</p>
                        </div>
                        
                        <a href="{{ route('clientes.index') }}" 
                           class="inline-block border-2 border-red-600 text-red-600 bg-black/30 backdrop-blur-sm px-8 py-3 rounded font-bold hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 uppercase tracking-wider text-sm">
                            Acceder Ahora
                        </a>
                    </div>
                </div>

                <!-- Vehículos -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/vehiculos.jpg') }}" 
                             alt="Registro de Vehículos" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/70 to-black/50"></div>
                    </div>
                    
                    <div class="relative z-10 p-10 text-center text-white min-h-[400px] flex flex-col justify-between">
                        <div>
                            <h3 class="text-3xl font-bold mb-6 uppercase tracking-wider">VEHÍCULOS</h3>
                            <div class="text-red-500 text-5xl font-bold mb-6">{{ \App\Models\Vehiculo::count() }}</div>
                            <p class="text-gray-200 text-lg mb-8 leading-relaxed">Administra el registro completo de vehículos con especificaciones técnicas detalladas</p>
                        </div>
                        
                        <a href="{{ route('vehiculos.index') }}" 
                           class="inline-block border-2 border-red-600 text-red-600 bg-black/30 backdrop-blur-sm px-8 py-3 rounded font-bold hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 uppercase tracking-wider text-sm">
                            Acceder Ahora
                        </a>
                    </div>
                </div>

                <!-- Órdenes -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/orden.jpg') }}" 
                             alt="Órdenes de Trabajo" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/70 to-black/50"></div>
                    </div>
                    
                    <div class="relative z-10 p-10 text-center text-white min-h-[400px] flex flex-col justify-between">
                        <div>
                            <h3 class="text-3xl font-bold mb-6 uppercase tracking-wider">ÓRDENES</h3>
                            <div class="text-red-500 text-5xl font-bold mb-6">{{ \App\Models\OrdenTrabajo::count() }}</div>
                            <p class="text-gray-200 text-lg mb-8 leading-relaxed">Controla el flujo completo de trabajo desde la recepción hasta la entrega final</p>
                        </div>
                        
                        <a href="{{ route('ordenes.index') }}" 
                           class="inline-block border-2 border-red-600 text-red-600 bg-black/30 backdrop-blur-sm px-8 py-3 rounded font-bold hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 uppercase tracking-wider text-sm">
                            Acceder Ahora
                        </a>
                    </div>
                </div>

                <!-- Repuestos -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/repuesto.jpeg') }}" 
                             alt="Inventario de Repuestos" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/70 to-black/50"></div>
                    </div>
                    
                    <div class="relative z-10 p-10 text-center text-white min-h-[400px] flex flex-col justify-between">
                        <div>
                            <h3 class="text-3xl font-bold mb-6 uppercase tracking-wider">REPUESTOS</h3>
                            <div class="text-red-500 text-5xl font-bold mb-6">{{ \App\Models\Repuesto::sum('stock_actual') }}</div>
                            <p class="text-gray-200 text-lg mb-8 leading-relaxed">Mantén control total del inventario con alertas automáticas de stock mínimo</p>
                        </div>
                        
                        <a href="{{ route('repuestos.index') }}" 
                           class="inline-block border-2 border-red-600 text-red-600 bg-black/30 backdrop-blur-sm px-8 py-3 rounded font-bold hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 uppercase tracking-wider text-sm">
                            Acceder Ahora
                        </a>
                    </div>
                </div>

                <!-- Cotizaciones -->
                <div class="relative bg-gray-900 rounded-lg overflow-hidden group hover:transform hover:scale-105 transition-all duration-500 shadow-2xl">
                    <!-- Imagen de fondo -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/images/interfaces/cotizacion.jpg') }}" 
                             alt="Gestión de Cotizaciones" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/70 to-black/50"></div>
                    </div>
                    
                    <div class="relative z-10 p-10 text-center text-white min-h-[400px] flex flex-col justify-between">
                        <div>
                            <h3 class="text-3xl font-bold mb-6 uppercase tracking-wider">COTIZACIONES</h3>
                            <div class="text-red-500 text-5xl font-bold mb-6">{{ \App\Models\Cotizacion::count() ?? '0' }}</div>
                            <p class="text-gray-200 text-lg mb-8 leading-relaxed">Genera cotizaciones profesionales con cálculos automáticos y seguimiento detallado</p>
                        </div>
                        
                        <a href="{{ route('cotizaciones.index') }}" 
                           class="inline-block border-2 border-red-600 text-red-600 bg-black/30 backdrop-blur-sm px-8 py-3 rounded font-bold hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 uppercase tracking-wider text-sm">
                            Acceder Ahora
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection