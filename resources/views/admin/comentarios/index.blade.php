@extends('layouts.app')

@section('title', 'Gestión de Comentarios')

@section('header', 'Gestión de Comentarios')

@section('content')

<div class="min-h-screen bg-black">
    <!-- Hero Section -->
    <section class="relative bg-gray-900 py-24">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/interfaces/comentarios-hero.jpg') }}"
                 alt="Gestión de Comentarios"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>
        
        <!-- Triángulo decorativo rojo -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[120px] border-l-red-600 border-b-[80px] border-b-transparent z-10"></div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="text-sm font-semibold text-red-500 mb-4 tracking-wider uppercase">GESTIÓN</div>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        COMENTARIOS Y<br>
                        <span class="text-red-500">CALIFICACIONES</span>
                    </h1>
                    <p class="text-gray-300 text-xl leading-relaxed max-w-2xl">
                        Monitoreo completo de la satisfacción del cliente y feedback del servicio
                    </p>
                </div>
                
                <!-- Right Content - Stats -->
                <div class="hidden lg:block">
                    <div class="bg-red-600/20 backdrop-blur-sm rounded-2xl p-8 border border-red-500/30">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-white mb-2">{{ $comentarios->total() }}</div>
                            <div class="text-red-400 font-semibold uppercase tracking-wider text-sm">Total Comentarios</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comments Section -->
    <section class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">FEEDBACK</div>
                <h2 class="text-4xl font-bold text-white mb-8">OPINIONES DE CLIENTES</h2>
                <p class="text-gray-300 text-lg">Registro completo de comentarios y calificaciones del servicio</p>
            </div>
            
            @if($comentarios->isEmpty())
                <!-- Empty State -->
                <div class="relative bg-gray-900 rounded-2xl overflow-hidden p-16 text-center border border-gray-700">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <img src="{{ asset('storage/images/interfaces/empty-comments.jpg') }}"
                             alt="Sin comentarios"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/60"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-32 h-32 bg-red-600/20 rounded-full flex items-center justify-center mx-auto mb-8">
                            <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4">NO HAY COMENTARIOS REGISTRADOS</h3>
                        <p class="text-gray-400 text-lg mb-8 max-w-md mx-auto">
                            Los comentarios de los clientes aparecerán aquí una vez que empiecen a evaluar el servicio
                        </p>
                    </div>
                </div>
            @else
                <!-- Comments Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($comentarios as $comentario)
                    <!-- Comment Card -->
                    <div class="relative bg-gray-900 rounded-xl overflow-hidden group hover:transform hover:scale-[1.02] transition-all duration-500 shadow-2xl border border-gray-700 hover:border-red-500/50">
                        <!-- Card Header -->
                        <div class="relative bg-gradient-to-r from-red-600 to-red-700 p-6 text-white">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-20">
                                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
                            </div>
                            
                            <div class="relative z-10 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mr-4 border border-white/30">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold mb-1">{{ $comentario->cliente->nombre ?? 'Cliente N/A' }}</h3>
                                        <p class="text-red-100 text-sm uppercase tracking-wide">
                                            ID: #{{ $comentario->id }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Rating -->
                                <div class="text-right">
                                    @if($comentario->calificacion)
                                        <div class="flex items-center mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $comentario->calificacion)
                                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.602-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.602-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="text-xs text-red-100">{{ $comentario->calificacion }}/5 estrellas</div>
                                    @else
                                        <div class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                            SIN CALIFICAR
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="p-6">
                            <!-- Vehicle and Order Information -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <!-- Vehicle Info -->
                                <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                    <div class="w-10 h-10 bg-blue-600/20 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Vehículo</div>
                                        <div class="font-bold text-white text-sm">{{ $comentario->orden->vehiculo->patente ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-400">{{ $comentario->orden->vehiculo->marca ?? '' }} {{ $comentario->orden->vehiculo->modelo ?? '' }}</div>
                                    </div>
                                </div>
                                
                                <!-- Order Info -->
                                <div class="flex items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors duration-300">
                                    <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-xs text-gray-400 uppercase tracking-wide mb-1">Orden</div>
                                        <div class="font-bold text-white text-sm">#{{ $comentario->orden_id }}</div>
                                        <div class="text-xs text-gray-400">Servicio</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Comment Text -->
                            <div class="mb-6">
                                <div class="bg-gray-800 rounded-lg p-4 border-l-4 border-red-500">
                                    <div class="flex items-start mb-2">
                                        <svg class="w-4 h-4 text-red-500 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Comentario del Cliente</div>
                                    </div>
                                    
                                    @if($comentario->comentario)
                                        <div class="text-sm text-gray-300 leading-relaxed">
                                            <span id="short-comment-{{ $comentario->id }}">
                                                {{ Str::limit($comentario->comentario, 150) }}
                                            </span>
                                            @if(strlen($comentario->comentario) > 150)
                                                <span id="full-comment-{{ $comentario->id }}" class="hidden">
                                                    {{ $comentario->comentario }}
                                                </span>
                                                <button class="text-red-400 hover:text-red-300 ml-1 font-medium text-xs" 
                                                        onclick="toggleComment({{ $comentario->id }})">
                                                    <span id="toggle-comment-text-{{ $comentario->id }}">Ver más...</span>
                                                </button>
                                            @endif
                                        </div>
                                    @else
                                        <div class="flex items-center text-gray-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-sm italic">Sin comentario</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Comment Date -->
                            <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg border border-gray-700">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-purple-600/20 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-400 uppercase tracking-wide">Fecha</div>
                                        <div class="text-sm font-semibold text-white">{{ $comentario->fecha_comentario->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-gray-400 uppercase tracking-wide">Hora</div>
                                    <div class="text-sm font-semibold text-white">{{ $comentario->fecha_comentario->format('H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Overlay -->
                        <div class="absolute inset-0 bg-red-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                @if($comentarios->hasPages())
                <div class="mt-16 flex justify-center">
                    <div class="bg-gray-900 rounded-xl shadow-2xl p-6 border border-gray-700">
                        <div class="pagination-wrapper text-white">
                            {{ $comentarios->links() }}
                        </div>
                    </div>
                </div>
                @endif
            @endif
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gray-900 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="text-sm font-semibold text-red-600 mb-4 tracking-wider uppercase">ESTADÍSTICAS</div>
                <h2 class="text-4xl font-bold text-white mb-8">ANÁLISIS DE SATISFACCIÓN</h2>
                <p class="text-gray-300 text-lg">Métricas clave de la satisfacción del cliente</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Total Comments -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-blue-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $comentarios->total() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Total Comentarios</div>
                </div>
                
                <!-- Rated Comments -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-yellow-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.602-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">{{ $comentarios->whereNotNull('calificacion')->count() }}</div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Con Calificación</div>
                </div>
                
                <!-- Average Rating -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-green-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">
                        {{ $comentarios->whereNotNull('calificacion')->count() > 0 ? number_format($comentarios->whereNotNull('calificacion')->avg('calificacion'), 1) : '0.0' }}
                    </div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Promedio</div>
                </div>
                
                <!-- Recent Comments -->
                <div class="bg-gray-800 rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300 border border-gray-700">
                    <div class="w-16 h-16 bg-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-white mb-2">
                        {{ $comentarios->filter(function($c) { return $c->fecha_comentario && $c->fecha_comentario->isToday(); })->count() }}
                    </div>
                    <div class="text-gray-400 font-medium uppercase tracking-wide text-sm">Hoy</div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function toggleComment(comentarioId) {
    const shortComment = document.getElementById('short-comment-' + comentarioId);
    const fullComment = document.getElementById('full-comment-' + comentarioId);
    const toggleText = document.getElementById('toggle-comment-text-' + comentarioId);
    
    if (fullComment.classList.contains('hidden')) {
        shortComment.classList.add('hidden');
        fullComment.classList.remove('hidden');
        toggleText.textContent = 'Ver menos...';
    } else {
        shortComment.classList.remove('hidden');
        fullComment.classList.add('hidden');
        toggleText.textContent = 'Ver más...';
    }
}
</script>

<style>
.pagination-wrapper .pagination {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.pagination-wrapper .pagination .page-link {
    color: #fff;
    background-color: transparent;
    border: 1px solid #374151;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.3s;
}

.pagination-wrapper .pagination .page-link:hover {
    background-color: #dc2626;
    border-color: #dc2626;
    color: #fff;
}

.pagination-wrapper .pagination .page-item.active .page-link {
    background-color: #dc2626;
    border-color: #dc2626;
    color: #fff;
}

/* Star rating hover effects */
.star-rating svg {
    transition: all 0.2s ease;
}

.star-rating svg:hover {
    transform: scale(1.1);
}

/* Comment card animations */
.comment-card {
    transition: all 0.3s ease;
}

.comment-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
}

/* Custom scrollbar for long comments */
.comment-text::-webkit-scrollbar {
    width: 4px;
}

.comment-text::-webkit-scrollbar-track {
    background: #374151;
    border-radius: 2px;
}

.comment-text::-webkit-scrollbar-thumb {
    background: #dc2626;
    border-radius: 2px;
}

.comment-text::-webkit-scrollbar-thumb:hover {
    background: #b91c1c;
}
</style>

@endsection