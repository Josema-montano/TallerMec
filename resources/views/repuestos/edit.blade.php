@extends('layouts.app')
@section('title', 'Editar Repuesto')
@section('content')

<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="relative bg-white py-16">
        <!-- Red accent triangle -->
        <div class="absolute top-0 left-0 w-0 h-0 border-l-[80px] border-l-red-600 border-b-[40px] border-b-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <!-- Left Content -->
                <div>
                    <div class="text-sm font-semibold text-red-600 mb-2 tracking-wider">INVENTARIO</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        EDITAR REPUESTO
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Modificar información del repuesto: <strong>{{ $repuesto->nombre }}</strong>
                    </p>
                </div>
                
                <!-- Right Content - Back Button -->
                <div>
                    <a href="{{ route('repuestos.index') }}" 
                       class="bg-gray-900 text-white px-8 py-4 font-semibold tracking-wider hover:bg-red-600 transition-colors duration-300 rounded-lg shadow-lg transform hover:-translate-y-1">
                        ← VOLVER
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <form action="{{ route('repuestos.update', $repuesto) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf 
                @method('PUT')
                
                <!-- Basic Information Section -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-blue-600 text-white px-8 py-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h2 class="text-xl font-bold tracking-wider">INFORMACIÓN BÁSICA</h2>
                        </div>
                    </div>
                    
                    <div class="p-8 grid md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Nombre del Repuesto *
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   required 
                                   placeholder="Ej: Filtro de aceite, Pastillas de freno..."
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 @error('nombre') border-red-500 @enderror" 
                                   value="{{ old('nombre', $repuesto->nombre) }}">
                            @error('nombre')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Code Field -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                                Código del Repuesto *
                            </label>
                            <input type="text" 
                                   name="codigo" 
                                   required 
                                   placeholder="Ej: FLT001, BRK205..."
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 font-mono uppercase @error('codigo') border-red-500 @enderror" 
                                   value="{{ old('codigo', $repuesto->codigo) }}"
                                   oninput="this.value = this.value.toUpperCase()">
                            @error('codigo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Inventory Section -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-yellow-600 text-white px-8 py-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <h2 class="text-xl font-bold tracking-wider">INVENTARIO Y PRECIO</h2>
                        </div>
                    </div>
                    
                    <div class="p-8 grid md:grid-cols-2 gap-6">
                        <!-- Stock Field -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                                </svg>
                                Stock Actual *
                            </label>
                            <input type="number" 
                                   name="stock_actual" 
                                   min="0" 
                                   required 
                                   placeholder="0"
                                   class="w-full border-2 border-gray-200 px-4 py-3 rounded-lg focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition-all duration-300 @error('stock_actual') border-red-500 @enderror" 
                                   value="{{ old('stock_actual', $repuesto->stock_actual) }}">
                            @error('stock_actual')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price Field -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                                Precio Unitario *
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-bold">$</span>
                                <input type="number" 
                                       name="precio_unitario" 
                                       step="0.01" 
                                       min="0" 
                                       required 
                                       placeholder="0.00"
                                       class="w-full border-2 border-gray-200 pl-8 pr-4 py-3 rounded-lg focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 transition-all duration-300 @error('precio_unitario') border-red-500 @enderror" 
                                       value="{{ old('precio_unitario', $repuesto->precio_unitario) }}">
                            </div>
                            @error('precio_unitario')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Current Image Section -->
                @if($repuesto->imagen)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-green-600 text-white px-8 py-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <h2 class="text-xl font-bold tracking-wider">IMAGEN ACTUAL</h2>
                        </div>
                    </div>
                    
                    <div class="p-8 text-center">
                        <div class="inline-block relative group">
                            <img src="{{ asset('storage/'.$repuesto->imagen) }}" 
                                 alt="Imagen actual del repuesto" 
                                 class="w-64 h-48 object-cover rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl flex items-center justify-center">
                                <span class="text-white font-semibold">Imagen actual</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mt-4">Esta es la imagen actual del repuesto</p>
                    </div>
                </div>
                @endif

                <!-- New Image Upload Section -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-purple-600 text-white px-8 py-6">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <h2 class="text-xl font-bold tracking-wider">
                                @if($repuesto->imagen)
                                    REEMPLAZAR IMAGEN
                                @else
                                    AGREGAR IMAGEN
                                @endif
                            </h2>
                            <span class="ml-auto text-sm opacity-75">(Opcional)</span>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <!-- Image Upload Area -->
                        <div id="imageUploadArea" 
                             class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-purple-400 hover:bg-purple-50 transition-all duration-300 cursor-pointer"
                             ondrop="handleDrop(event)" 
                             ondragover="handleDragOver(event)" 
                             ondragleave="handleDragLeave(event)"
                             onclick="document.getElementById('imageInput').click()">
                            
                            <div id="uploadContent">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">
                                    @if($repuesto->imagen)
                                        Subir nueva imagen
                                    @else
                                        Subir imagen del repuesto
                                    @endif
                                </h3>
                                <p class="text-gray-500 mb-4">Arrastra y suelta una imagen aquí, o haz clic para seleccionar</p>
                                <p class="text-sm text-gray-400">PNG, JPG, GIF hasta 10MB</p>
                                @if($repuesto->imagen)
                                    <p class="text-sm text-purple-600 mt-2 font-medium">Esta imagen reemplazará la actual</p>
                                @endif
                            </div>

                            <!-- Image Preview -->
                            <div id="imagePreview" class="hidden">
                                <img id="previewImage" class="max-w-full h-48 object-cover rounded-lg mx-auto mb-4" alt="Vista previa">
                                <div id="imageInfo" class="text-sm text-gray-600 mb-4"></div>
                                <div class="flex justify-center space-x-4">
                                    <button type="button" 
                                            onclick="changeImage()" 
                                            class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors duration-300">
                                        Cambiar imagen
                                    </button>
                                    <button type="button" 
                                            onclick="removeImage()" 
                                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-300">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <input type="file" 
                               id="imageInput"
                               name="imagen" 
                               accept="image/*" 
                               class="hidden" 
                               onchange="handleFileSelect(event)">
                        
                        @error('imagen')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Help Section -->
                <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-blue-800 mb-2">Información importante</h3>
                            <ul class="text-blue-700 space-y-1 text-sm">
                                <li>• El código del repuesto debe ser único en el sistema</li>
                                <li>• Si subes una nueva imagen, reemplazará la imagen actual</li>
                                <li>• Puedes actualizar el stock y precio según sea necesario</li>
                                <li>• Los cambios se guardarán inmediatamente al enviar el formulario</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('repuestos.index') }}" 
                       class="bg-gray-500 text-white px-8 py-4 rounded-lg hover:bg-gray-600 transition-colors duration-300 font-semibold">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 font-semibold shadow-lg transform hover:-translate-y-1">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Actualizar Repuesto
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
function handleDragOver(e) {
    e.preventDefault();
    e.currentTarget.classList.add('border-purple-400', 'bg-purple-50');
}

function handleDragLeave(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('border-purple-400', 'bg-purple-50');
}

function handleDrop(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('border-purple-400', 'bg-purple-50');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        handleFile(files[0]);
    }
}

function handleFileSelect(e) {
    const file = e.target.files[0];
    if (file) {
        handleFile(file);
    }
}

function handleFile(file) {
    // Validate file type
    if (!file.type.startsWith('image/')) {
        alert('Por favor selecciona un archivo de imagen válido.');
        return;
    }
    
    // Validate file size (10MB)
    if (file.size > 10 * 1024 * 1024) {
        alert('El archivo es demasiado grande. El tamaño máximo es 10MB.');
        return;
    }
    
    // Show preview
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('previewImage').src = e.target.result;
        document.getElementById('imageInfo').innerHTML = `
            <strong>${file.name}</strong><br>
            Tamaño: ${(file.size / 1024 / 1024).toFixed(2)} MB
        `;
        document.getElementById('uploadContent').classList.add('hidden');
        document.getElementById('imagePreview').classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

function changeImage() {
    document.getElementById('imageInput').click();
}

function removeImage() {
    document.getElementById('imageInput').value = '';
    document.getElementById('uploadContent').classList.remove('hidden');
    document.getElementById('imagePreview').classList.add('hidden');
}
</script>

@endsection
