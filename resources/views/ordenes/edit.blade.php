@extends('layouts.app')

@section('title', 'Editar Orden')

@section('header', 'Editar Orden')

@section('content')

<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-white py-16">
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[80px] border-l-indigo-600 border-b-[40px] border-b-transparent"></div>

        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-sm font-semibold text-indigo-600 mb-2 tracking-wider">EDITAR</div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">ORDEN DE SERVICIO</h1>
                    <p class="text-gray-600 text-lg">
                        Modificar datos de la orden: <strong>#{{ $orden->id }}</strong>
                    </p>
                </div>

                <div>
                    <a href="{{ route('ordenes.index') }}"
                       class="bg-gray-600 text-white px-8 py-4 font-semibold tracking-wider hover:bg-gray-700 transition duration-300 rounded-lg shadow-lg hover:-translate-y-1">
                        ← VOLVER
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 p-8 text-white">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.6a1 1 0 01.7.3l5.4 5.4a1 1 0 01.3.7V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Formulario de Orden</h3>
                            <p class="text-indigo-100">Actualizar datos de ingreso, vehículo y estado</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <form action="{{ route('ordenes.update', $orden) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Vehículo -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Vehículo *</label>
                            <select name="vehiculo_id" required class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                                @foreach($vehiculos as $v)
                                    <option value="{{ $v->id }}" {{ $v->id == $orden->vehiculo_id ? 'selected' : '' }}>
                                        {{ $v->patente }} - {{ $v->marca }} {{ $v->modelo }} ({{ $v->color }}) - {{ $v->cliente->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha ingreso -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Fecha ingreso *</label>
                            <input type="date" name="fecha_ingreso"
                                   value="{{ $orden->fecha_ingreso->format('Y-m-d') }}"
                                   required
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        </div>

                        <!-- Fecha estimada -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Fecha estimada (opcional)</label>
                            <input type="date" name="fecha_estimada_fin"
                                   value="{{ $orden->fecha_estimada_fin ? $orden->fecha_estimada_fin->format('Y-m-d') : '' }}"
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        </div>

                        <!-- Estado -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Estado *</label>
                            <select name="estado" id="estado" required
                                    class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                                <option value="pendiente" {{ $orden->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="en_proceso" {{ $orden->estado == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                                <option value="finalizado" {{ $orden->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                                <option value="cancelado" {{ $orden->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>

                        <!-- Fecha entrega -->
                        <div id="fecha_entrega_container" style="display: {{ $orden->estado == 'finalizado' ? 'block' : 'none' }}">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Fecha de entrega</label>
                            <input type="date" name="fecha_entrega"
                                   value="{{ $orden->fecha_entrega ? $orden->fecha_entrega->format('Y-m-d') : '' }}"
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Descripción falla (opcional)</label>
                            <textarea name="descripcion_problema" rows="3"
                                      class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">{{ $orden->descripcion_problema }}</textarea>
                        </div>

                        <!-- Kilometraje -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kilometraje (opcional)</label>
                            <input type="number" name="kilometraje" min="0"
                                   value="{{ $orden->kilometraje }}"
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        </div>

                        <!-- Botón -->
                        <div class="flex gap-4 pt-4 border-t border-gray-200">
                            <button type="submit"
                                    class="flex-1 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-8 py-4 rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-semibold tracking-wider">
                                Actualizar orden
                            </button>

                            <a href="{{ route('ordenes.index') }}"
                               class="flex-1 bg-gray-600 text-white px-8 py-4 rounded-lg hover:bg-gray-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl font-semibold tracking-wider text-center">
                                Cancelar
                            </a>
                        </div>
                    </form>
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
        entrega.style.display = this.value === 'finalizado' ? 'block' : 'none';
    });
</script>
@endsection
