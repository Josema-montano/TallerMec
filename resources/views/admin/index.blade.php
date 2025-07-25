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

    <!-- Decora­tivos (triángulo rojo) -->
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
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">MÉTRICAS</div>
                <h2 class="text-4xl font-bold text-gray-900 mb-8">PRINCIPALES</h2>
                <p class="text-gray-600 text-lg">Monitoreo en tiempo real del rendimiento del taller</p>
            </div>
            
            <!-- KPI Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Clientes -->
                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-indigo-600 mb-2">{{ \App\Models\Cliente::count() }}</div>
                    <div class="text-gray-900 font-semibold">CLIENTES</div>
                </div>

                <!-- Vehículos -->
                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">{{ \App\Models\Vehiculo::count() }}</div>
                    <div class="text-gray-900 font-semibold">VEHÍCULOS</div>
                </div>

                <!-- Órdenes -->
                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-yellow-600 mb-2">{{ \App\Models\OrdenTrabajo::count() }}</div>
                    <div class="text-gray-900 font-semibold">ÓRDENES</div>
                </div>

                <!-- Stock Repuestos -->
                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ \App\Models\Repuesto::sum('stock_actual') }}</div>
                    <div class="text-gray-900 font-semibold">STOCK REPUESTOS</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider">ACCESOS</div>
                <h2 class="text-4xl font-bold text-gray-900 mb-8">RÁPIDOS</h2>
                <p class="text-gray-600 text-lg">Navegación directa a las secciones principales del sistema</p>
            </div>
            
            <!-- Quick Access Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Clientes -->
                <a href="{{ route('clientes.index') }}" class="group bg-indigo-600 text-white p-8 rounded-lg hover:bg-indigo-700 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">CLIENTES</h3>
                        <p class="text-indigo-100 text-sm">Gestión de clientes</p>
                    </div>
                </a>

                <!-- Vehículos -->
               <a href="{{ route('vehiculos.index') }}" class="group bg-blue-600 text-white p-8 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
    <div class="flex flex-col items-center text-center">
        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 13l1-3a4 4 0 014-3h8a4 4 0 014 3l1 3M5 16h14M6.5 20a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm11 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold mb-2">VEHÍCULOS</h3>
        <p class="text-blue-100 text-sm">Registro de vehículos</p>
    </div>
</a>



                <!-- Órdenes -->
                <a href="{{ route('ordenes.index') }}" class="group bg-yellow-600 text-white p-8 rounded-lg hover:bg-yellow-700 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">ÓRDENES</h3>
                        <p class="text-yellow-100 text-sm">Órdenes de trabajo</p>
                    </div>
                </a>

                <!-- Repuestos -->
                <a href="{{ route('repuestos.index') }}" class="group bg-green-600 text-white p-8 rounded-lg hover:bg-green-700 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">REPUESTOS</h3>
                        <p class="text-green-100 text-sm">Inventario de repuestos</p>
                    </div>
                </a>

                <!-- Cotizaciones -->
                <a href="{{ route('cotizaciones.index') }}" class="group bg-purple-600 text-white p-8 rounded-lg hover:bg-purple-700 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">COTIZACIONES</h3>
                        <p class="text-purple-100 text-sm">Gestión de cotizaciones</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>

@endsection
