@extends('layouts.cliente')

@section('title', 'Mis Órdenes - Portal Cliente')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Mis Órdenes de Servicio</h1>
            <p class="text-lg text-gray-600">Consulte el estado de sus servicios y deje sus comentarios</p>
        </div>

        <!-- Search Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form action="{{ route('cliente.mis-ordenes') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Ingrese su email para consultar sus órdenes</label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                           value="{{ request('email') }}" placeholder="su-email@ejemplo.com">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition-colors">
                        <i class="fas fa-search mr-2"></i>Buscar
                    </button>
                </div>
            </form>
        </div>

        @if(isset($ordenes) && $ordenes->count() > 0)
            <!-- Orders List -->
            <div class="space-y-6">
                @foreach($ordenes as $orden)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <!-- Order Header -->
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">
                                    {{ $orden->vehiculo->marca }} {{ $orden->vehiculo->modelo }} ({{ $orden->vehiculo->anio }})
                                </h3>
                                <p class="text-gray-600">Patente: {{ $orden->vehiculo->patente }}</p>
                            </div>
                            <div class="mt-2 md:mt-0">
                                @php
                                    $estadoClasses = [
                                        'pendiente' => 'bg-yellow-100 text-yellow-800',
                                        'en_proceso' => 'bg-blue-100 text-blue-800',
                                        'finalizado' => 'bg-green-100 text-green-800',
                                        'cancelado' => 'bg-red-100 text-red-800'
                                    ];
                                    $estadoTextos = [
                                        'pendiente' => 'Pendiente',
                                        'en_proceso' => 'En Proceso',
                                        'finalizado' => 'Finalizado',
                                        'cancelado' => 'Cancelado'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $estadoClasses[$orden->estado] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $estadoTextos[$orden->estado] ?? ucfirst($orden->estado) }}
                                </span>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-600"><strong>Fecha de ingreso:</strong> {{ $orden->fecha_ingreso->format('d/m/Y') }}</p>
                                @if($orden->fecha_estimada_fin)
                                    <p class="text-sm text-gray-600"><strong>Fecha estimada:</strong> {{ $orden->fecha_estimada_fin->format('d/m/Y') }}</p>
                                @endif
                                @if($orden->fecha_entrega)
                                    <p class="text-sm text-gray-600"><strong>Fecha de entrega:</strong> {{ $orden->fecha_entrega->format('d/m/Y') }}</p>
                                @endif
                            </div>
                            <div>
                                @if($orden->kilometraje)
                                    <p class="text-sm text-gray-600"><strong>Kilometraje:</strong> {{ number_format($orden->kilometraje) }} km</p>
                                @endif
                            </div>
                        </div>

                        @if($orden->descripcion_problema)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600"><strong>Problema reportado:</strong></p>
                                <p class="text-gray-800 bg-gray-50 p-3 rounded-md mt-1">{{ $orden->descripcion_problema }}</p>
                            </div>
                        @endif

                        <!-- Comments Section -->
                        @if($orden->estado === 'finalizado')
                            <div class="border-t pt-4">
                                <h4 class="text-lg font-semibold text-gray-900 mb-3">Comentarios y Calificación</h4>
                                
                                @if($orden->comentarios->count() > 0)
                                    <!-- Existing Comments -->
                                    @foreach($orden->comentarios as $comentario)
                                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                                            <div class="flex items-center justify-between mb-2">
                                                <div class="flex items-center">
                                                    <span class="text-sm font-medium text-gray-900">{{ $comentario->cliente->nombre }}</span>
                                                    <span class="text-sm text-gray-500 ml-2">{{ $comentario->fecha_comentario->format('d/m/Y H:i') }}</span>
                                                </div>
                                                @if($comentario->calificacion)
                                                    <div class="flex items-center">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="fas fa-star {{ $i <= $comentario->calificacion ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                        @endfor
                                                        <span class="ml-2 text-sm text-gray-600">({{ $comentario->calificacion }}/5)</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <p class="text-gray-800">{{ $comentario->comentario }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <!-- Comment Form -->
                                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                        <p class="text-blue-800 mb-4">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            Su servicio ha sido completado. ¡Nos encantaría conocer su opinión!
                                        </p>
                                        
                                        <form action="{{ route('cliente.comentario') }}" method="POST" class="space-y-4">
                                            @csrf
                                            <input type="hidden" name="orden_id" value="{{ $orden->id }}">
                                            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                                            
                                            <div>
                                                <label for="calificacion_{{ $orden->id }}" class="block text-sm font-medium text-gray-700 mb-2">Calificación</label>
                                                <div class="flex items-center space-x-1">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <input type="radio" id="star_{{ $orden->id }}_{{ $i }}" name="calificacion" value="{{ $i }}" class="hidden" required>
                                                        <label for="star_{{ $orden->id }}_{{ $i }}" class="cursor-pointer text-2xl text-gray-300 hover:text-yellow-400 transition-colors star-rating" data-rating="{{ $i }}">
                                                            <i class="fas fa-star"></i>
                                                        </label>
                                                    @endfor
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <label for="comentario_{{ $orden->id }}" class="block text-sm font-medium text-gray-700 mb-2">Comentario</label>
                                                <textarea id="comentario_{{ $orden->id }}" name="comentario" rows="3" required
                                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                                          placeholder="Comparta su experiencia con nuestro servicio..."></textarea>
                                            </div>
                                            
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors">
                                                <i class="fas fa-comment mr-2"></i>Enviar Comentario
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @elseif(request('email'))
            <!-- No Orders Found -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                <div class="text-4xl mb-4">📋</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No se encontraron órdenes</h3>
                <p class="text-gray-600">No hay órdenes de servicio asociadas a este email.</p>
            </div>
        @else
            <!-- Initial State -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center">
                <div class="text-4xl mb-4">🔍</div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Consulte sus órdenes</h3>
                <p class="text-gray-600">Ingrese su email en el formulario de arriba para ver sus órdenes de servicio.</p>
            </div>
        @endif
    </div>
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
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
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
                    s.classList.remove('text-gray-300');
                } else {
                    s.classList.add('text-gray-300');
                    s.classList.remove('text-yellow-400');
                }
            });
        });
    });
});
</script>
@endsection