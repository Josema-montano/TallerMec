@extends('layouts.app')

@section('title', 'Editar Orden')

@section('header', 'Editar Orden')

@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/ordenes-hero.jpg') }}"
                 alt="Editar Orden de Trabajo"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/80"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">EDITAR</div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        ORDEN DE<br>
                        <span class="text-red-500">SERVICIO</span>
                    </h1>
                    <p class="text-gray-300 text-xl leading-relaxed max-w-2xl">
                        Modificar datos de la orden: <strong class="text-red-400">#{{ $orden->id }}</strong>
                    </p>
                </div>
                
                <!-- Right Content - Action Button -->
                <div class="hidden lg:block">
                    <a href="{{ route('ordenes.index') }}" 
                       class="group relative overflow-hidden bg-gray-700 text-white px-10 py-4 font-bold tracking-wider hover:bg-gray-600 transition-all duration-500 rounded-lg shadow-2xl transform hover:scale-105">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            VOLVER
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Button -->
            <div class="lg:hidden mt-8">
                <a href="{{ route('ordenes.index') }}" 
                   class="inline-block bg-gray-700 text-white px-8 py-4 font-bold tracking-wider hover:bg-gray-600 transition-all duration-300 rounded-lg shadow-xl">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    VOLVER
                </a>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-20 bg-black">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">FORMULARIO</div>
                <h2 class="text-4xl font-bold text-white mb-8">ACTUALIZAR ORDEN</h2>
                <p class="text-gray-300 text-lg">Modificar datos de ingreso, vehículo y estado</p>
            </div>
            
            <!-- Form Card -->
            <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-2xl border border-gray-700">
                <!-- Card Header -->
                <div class="relative bg-gradient-to-r from-red-600 to-red-700 p-8 text-white">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-20">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
                    </div>
                    
                    <div class="relative z-10 flex items-center">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mr-6 border border-white/30">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6a1 1 0 01.7.3l5.4 5.4a1 1 0 01.3.7V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold mb-2">Orden #{{ $orden->id }}</h3>
                            <p class="text-red-100 text-lg">Actualizar información del servicio</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8 bg-gray-900">
                    <form action="{{ route('ordenes.update', $orden) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Form Grid -->
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Vehículo -->
                                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Vehículo *</label>
                                    </div>
                                    <select name="vehiculo_id" required 
                                            class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300">
                                        @foreach($vehiculos as $v)
                                            <option value="{{ $v->id }}" {{ $v->id == $orden->vehiculo_id ? 'selected' : '' }}
                                                    class="bg-gray-700 text-white">
                                                {{ $v->patente }} - {{ $v->marca }} {{ $v->modelo }} ({{ $v->color }}) - {{ $v->cliente->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Fecha ingreso -->
                                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Fecha ingreso *</label>
                                    </div>
                                    <input type="date" name="fecha_ingreso"
                                           value="{{ $orden->fecha_ingreso->format('Y-m-d') }}"
                                           required
                                           class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300">
                                </div>

                                <!-- Fecha estimada -->
                                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-yellow-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Fecha estimada</label>
                                    </div>
                                    <input type="date" name="fecha_estimada_fin"
                                           value="{{ $orden->fecha_estimada_fin ? $orden->fecha_estimada_fin->format('Y-m-d') : '' }}"
                                           class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300">
                                </div>

                                <!-- Kilometraje -->
                                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Kilometraje</label>
                                    </div>
                                    <input type="number" name="kilometraje" min="0"
                                           value="{{ $orden->kilometraje }}"
                                           placeholder="Ingrese el kilometraje actual"
                                           class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300">
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <!-- Estado -->
                                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-orange-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Estado *</label>
                                    </div>
                                    <select name="estado" id="estado" required
                                            class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300">
                                        <option value="pendiente" {{ $orden->estado == 'pendiente' ? 'selected' : '' }} class="bg-gray-700">Pendiente</option>
                                        <option value="en_proceso" {{ $orden->estado == 'en_proceso' ? 'selected' : '' }} class="bg-gray-700">En proceso</option>
                                        <option value="finalizado" {{ $orden->estado == 'finalizado' ? 'selected' : '' }} class="bg-gray-700">Finalizado</option>
                                        <option value="cancelado" {{ $orden->estado == 'cancelado' ? 'selected' : '' }} class="bg-gray-700">Cancelado</option>
                                    </select>
                                </div>

                                <!-- Fecha entrega -->
                                <div id="fecha_entrega_container" 
                                     class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300"
                                     style="display: {{ $orden->estado == 'finalizado' ? 'block' : 'none' }}">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Fecha de entrega</label>
                                    </div>
                                    <input type="date" name="fecha_entrega"
                                           value="{{ $orden->fecha_entrega ? $orden->fecha_entrega->format('Y-m-d') : '' }}"
                                           class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300">
                                </div>

                                <!-- Descripción del problema -->
                                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-500/50 transition-all duration-300">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                        </div>
                                        <label class="text-sm font-semibold text-white uppercase tracking-wider">Descripción del problema</label>
                                    </div>
                                    <textarea name="descripcion_problema" rows="4"
                                              placeholder="Describe detalladamente el problema reportado por el cliente..."
                                              class="w-full bg-gray-700 border-2 border-gray-600 text-white px-4 py-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300 resize-none">{{ $orden->descripcion_problema }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-700">
                            <button type="submit"
                                    class="group relative overflow-hidden bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-500 transform hover:scale-105 shadow-2xl font-bold tracking-wider flex-1">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    ACTUALIZAR ORDEN
                                </span>
                                <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                            </button>

                            <a href="{{ route('ordenes.index') }}"
                               class="group relative overflow-hidden bg-gray-700 text-white px-8 py-4 rounded-lg hover:bg-gray-600 transition-all duration-500 transform hover:scale-105 shadow-2xl font-bold tracking-wider text-center flex-1 flex items-center justify-center">
                                <span class="relative z-10 flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    CANCELAR
                                </span>
                                <div class="absolute inset-0 bg-white/20 transform -skew-x-12 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Information Section -->
    <section class="py-20 bg-gray-900 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">INFORMACIÓN</div>
                <h2 class="text-4xl font-bold text-white mb-8">DATOS DE LA ORDEN</h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Vehicle Info -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-white mb-2">{{ $orden->vehiculo->patente }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">{{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }}</div>
                </div>
                
                <!-- Client Info -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-white mb-2">{{ Str::limit($orden->vehiculo->cliente->nombre, 15) }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Propietario</div>
                </div>
                
                <!-- Order Age -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-2xl font-bold text-white mb-2">
                        {{ \Carbon\Carbon::parse($orden->fecha_ingreso)->diffInDays() }}
                    </div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Días en taller</div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('estado').addEventListener('change', function () {
        const entrega = document.getElementById('fecha_entrega_container');
        if (this.value === 'finalizado') {
            entrega.style.display = 'block';
            entrega.classList.add('animate-fade-in');
        } else {
            entrega.style.display = 'none';
            entrega.classList.remove('animate-fade-in');
        }
    });

    // Add smooth transitions
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-red-500/50');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-red-500/50');
            });
        });
    });
</script>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}

/* Custom scrollbar for textarea */
textarea::-webkit-scrollbar {
    width: 8px;
}

textarea::-webkit-scrollbar-track {
    background: #374151;
    border-radius: 4px;
}

textarea::-webkit-scrollbar-thumb {
    background: #dc2626;
    border-radius: 4px;
}

textarea::-webkit-scrollbar-thumb:hover {
    background: #b91c1c;
}

/* Input placeholder styling */
input::placeholder,
textarea::placeholder {
    color: #9ca3af;
    opacity: 0.7;
}

/* Select option styling */
select option {
    background-color: #374151;
    color: white;
    padding: 8px;
}

/* Focus states */
input:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: #dc2626 !important;
    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1) !important;
}

/* Hover effects for form fields */
.bg-gray-800:hover {
    background-color: #1f2937;
    border-color: rgba(220, 38, 38, 0.3);
}
</style>
@endsection