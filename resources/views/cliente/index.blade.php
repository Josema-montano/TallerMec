@extends('layouts.cliente')

@section('title', 'Portal Cliente - Reservar Servicio')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-red-600 to-red-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                Bienvenido a Nuestro Taller
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-red-100">
                Reserve su servicio mecánico de forma rápida y sencilla
            </p>
            <a href="#reservar" class="bg-white text-red-600 px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors">
                Reservar Ahora
            </a>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Nuestros Servicios</h2>
            <p class="text-lg text-gray-600">Ofrecemos una amplia gama de servicios para mantener su vehículo en perfectas condiciones</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($servicios as $servicio)
            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl mb-4">
                    @if(str_contains(strtolower($servicio->nombre), 'aceite'))
                        🛢️
                    @elseif(str_contains(strtolower($servicio->nombre), 'freno'))
                        🛑
                    @elseif(str_contains(strtolower($servicio->nombre), 'alineación'))
                        ⚖️
                    @else
                        🔧
                    @endif
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $servicio->nombre }}</h3>
                <p class="text-2xl font-bold text-red-600">${{ number_format($servicio->precio_hora, 0) }}/hora</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Reservation Form -->
<div id="reservar" class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Reservar Servicio</h2>
                <p class="text-lg text-gray-600">Complete el formulario para reservar su cita</p>
            </div>
            
            <form action="{{ route('cliente.reservar') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Cliente Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">📋 Información del Cliente</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="cliente_nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo *</label>
                            <input type="text" id="cliente_nombre" name="cliente_nombre" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('cliente_nombre') }}">
                            @error('cliente_nombre')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="cliente_email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" id="cliente_email" name="cliente_email" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('cliente_email') }}">
                            @error('cliente_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="cliente_telefono" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                            <input type="tel" id="cliente_telefono" name="cliente_telefono" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('cliente_telefono') }}">
                            @error('cliente_telefono')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Vehicle Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">🚗 Información del Vehículo</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="vehiculo_patente" class="block text-sm font-medium text-gray-700 mb-2">Patente *</label>
                            <input type="text" id="vehiculo_patente" name="vehiculo_patente" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('vehiculo_patente') }}" placeholder="ABC123">
                            @error('vehiculo_patente')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="vehiculo_marca" class="block text-sm font-medium text-gray-700 mb-2">Marca *</label>
                            <input type="text" id="vehiculo_marca" name="vehiculo_marca" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('vehiculo_marca') }}" placeholder="Toyota, Ford, etc.">
                            @error('vehiculo_marca')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="vehiculo_modelo" class="block text-sm font-medium text-gray-700 mb-2">Modelo *</label>
                            <input type="text" id="vehiculo_modelo" name="vehiculo_modelo" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('vehiculo_modelo') }}" placeholder="Corolla, Focus, etc.">
                            @error('vehiculo_modelo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="vehiculo_anio" class="block text-sm font-medium text-gray-700 mb-2">Año *</label>
                            <input type="number" id="vehiculo_anio" name="vehiculo_anio" required 
                                   min="1900" max="{{ date('Y') + 1 }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('vehiculo_anio') }}" placeholder="2020">
                            @error('vehiculo_anio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="vehiculo_color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                            <input type="text" id="vehiculo_color" name="vehiculo_color" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('vehiculo_color') }}" placeholder="Blanco, Negro, etc.">
                            @error('vehiculo_color')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Service Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">🔧 Información del Servicio</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="servicio_id" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Servicio *</label>
                            <select id="servicio_id" name="servicio_id" required 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="">Seleccione un servicio</option>
                                @foreach($servicios as $servicio)
                                    <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                                        {{ $servicio->nombre }} - ${{ number_format($servicio->precio_hora, 0) }}/hora
                                    </option>
                                @endforeach
                            </select>
                            @error('servicio_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="fecha_preferida" class="block text-sm font-medium text-gray-700 mb-2">Fecha Preferida *</label>
                            <input type="date" id="fecha_preferida" name="fecha_preferida" required 
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                   value="{{ old('fecha_preferida') }}">
                            @error('fecha_preferida')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="descripcion_problema" class="block text-sm font-medium text-gray-700 mb-2">Descripción del Problema</label>
                        <textarea id="descripcion_problema" name="descripcion_problema" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                  placeholder="Describa el problema o servicio que necesita...">{{ old('descripcion_problema') }}</textarea>
                        @error('descripcion_problema')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-calendar-check mr-2"></i>Reservar Servicio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Info Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8 text-center">
            <div>
                <div class="text-4xl mb-4">⏰</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Horarios Flexibles</h3>
                <p class="text-gray-600">Atendemos de lunes a sábado con horarios convenientes para usted</p>
            </div>
            <div>
                <div class="text-4xl mb-4">🏆</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Calidad Garantizada</h3>
                <p class="text-gray-600">Técnicos certificados y repuestos originales para su tranquilidad</p>
            </div>
            <div>
                <div class="text-4xl mb-4">📱</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Seguimiento Online</h3>
                <p class="text-gray-600">Consulte el estado de su vehículo y deje comentarios fácilmente</p>
            </div>
        </div>
    </div>
</div>
@endsection