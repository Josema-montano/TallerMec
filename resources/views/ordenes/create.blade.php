@extends('layouts.app')

@section('title', 'Crear Orden')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Nueva Orden de Trabajo</h1>
            <p class="text-lg text-gray-600">Registra una nueva orden de servicio para el taller</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Información de la Orden</h2>
                <p class="text-blue-100 mt-1">Complete los datos necesarios para crear la orden</p>
            </div>

            <form action="{{ route('ordenes.store') }}" method="POST" class="p-8">
                @csrf
                
                <!-- Información del Vehículo -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Selección de Vehículo
                    </h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Vehículo <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="vehiculo_id" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white appearance-none">
                                    <option value="">Seleccione un vehículo...</option>
                                    @foreach($vehiculos as $v)
                                        <option value="{{ $v->id }}">
                                            {{ $v->patente }} - {{ $v->marca }} {{ $v->modelo }} ({{ $v->color }}) - {{ $v->cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fechas y Estado -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Fechas y Estado
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Ingreso <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="fecha_ingreso" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha Estimada
                            </label>
                            <input type="date" name="fecha_estimada"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        </div>

                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Estado <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="estado" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white appearance-none">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en_proceso">En Proceso</option>
                                    <option value="finalizado">Finalizado</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detalles del Servicio -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Detalles del Servicio
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Descripción del Problema
                            </label>
                            <textarea name="descripcion_problema" rows="4" 
                                      placeholder="Describa el problema o servicio requerido..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-none"></textarea>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kilometraje
                            </label>
                            <div class="relative">
                                <input type="number" name="kilometraje" min="0" 
                                       placeholder="0"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                    <span class="text-gray-500 text-sm">km</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Crear Orden
                    </button>
                    
                    <a href="{{ route('ordenes.index') }}" 
                       class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Animaciones y efectos adicionales */
.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

.group input:focus,
.group select:focus,
.group textarea:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Efectos de hover para los campos */
.group input:hover,
.group select:hover,
.group textarea:hover {
    border-color: #93c5fd;
}

/* Animación de carga para el botón */
button[type="submit"]:active {
    transform: scale(0.98);
}

/* Estilos para estados de validación */
input:invalid:not(:focus):not(:placeholder-shown) {
    border-color: #ef4444;
    background-color: #fef2f2;
}

input:valid:not(:focus):not(:placeholder-shown) {
    border-color: #10b981;
    background-color: #f0fdf4;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-establecer fecha de ingreso a hoy
    const fechaIngreso = document.querySelector('input[name="fecha_ingreso"]');
    if (fechaIngreso && !fechaIngreso.value) {
        const today = new Date().toISOString().split('T')[0];
        fechaIngreso.value = today;
    }

    // Validación en tiempo real
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[required], select[required]');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('error')) {
                validateField(this);
            }
        });
    });

    function validateField(field) {
        const isValid = field.checkValidity();
        
        if (isValid) {
            field.classList.remove('error');
            field.classList.add('valid');
        } else {
            field.classList.remove('valid');
            field.classList.add('error');
        }
    }

    // Mejorar la experiencia del selector de vehículos
    const vehiculoSelect = document.querySelector('select[name="vehiculo_id"]');
    if (vehiculoSelect) {
        vehiculoSelect.addEventListener('change', function() {
            if (this.value) {
                this.style.color = '#1f2937';
            } else {
                this.style.color = '#9ca3af';
            }
        });
    }

    // Contador de caracteres para textarea
    const textarea = document.querySelector('textarea[name="descripcion_problema"]');
    if (textarea) {
        const maxLength = 500;
        textarea.setAttribute('maxlength', maxLength);
        
        const counter = document.createElement('div');
        counter.className = 'text-sm text-gray-500 mt-1 text-right';
        counter.textContent = `0/${maxLength}`;
        textarea.parentNode.appendChild(counter);
        
        textarea.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/${maxLength}`;
            
            if (length > maxLength * 0.9) {
                counter.classList.add('text-orange-500');
            } else {
                counter.classList.remove('text-orange-500');
            }
        });
    }

    // Formatear kilometraje con separadores de miles
    const kilometrajeInput = document.querySelector('input[name="kilometraje"]');
    if (kilometrajeInput) {
        kilometrajeInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value) {
                value = parseInt(value).toLocaleString();
                this.value = value.replace(/,/g, '');
            }
        });
    }
});
</script>
@endsection
