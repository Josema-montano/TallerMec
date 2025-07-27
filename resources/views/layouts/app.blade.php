<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Tailwind CDN (última versión estable) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Taller')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Top Header Bar -->
    <div class="bg-gray-900 text-white text-xs py-2">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="flex space-x-6">
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    CONTACTANOS: +1 234 567 8900
                </span>
                <span class="flex items-center">
                   
                </span>
            </div>
            <div class="flex items-center">
                
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('admin') }}" class="text-2xl font-bold text-gray-900">
                    <span class="text-red-600">▼</span> TALLER
                </a>
            </div>

            <!-- Navigation Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('admin') }}" class="text-gray-900 font-medium hover:text-red-600 transition-colors">Dashboard</a>
                <a href="{{ route('clientes.index') }}" class="text-gray-600 font-medium hover:text-red-600 transition-colors">Clientes</a>
                <a href="{{ route('vehiculos.index') }}" class="text-gray-600 font-medium hover:text-red-600 transition-colors">Vehículos</a>
                <a href="{{ route('ordenes.index') }}" class="text-gray-600 font-medium hover:text-red-600 transition-colors">Órdenes</a>
                <a href="{{ route('repuestos.index') }}" class="text-gray-600 font-medium hover:text-red-600 transition-colors">Repuestos</a>
                <a href="{{ route('cotizaciones.index') }}" class="text-gray-600 font-medium hover:text-red-600 transition-colors">Cotizaciones</a>
                <a href="{{ route('comentarios.index') }}" class="text-gray-600 font-medium hover:text-red-600 transition-colors">Comentarios</a>
            </div>
        </div>
    </div>
</nav>

    


    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="text-2xl font-bold mb-4">
                        <span class="text-red-600">▼</span> TALLER
                    </div>
                    <p class="text-gray-400">
                        Sistema profesional para la gestión integral de talleres mecánicos y servicios automotrices.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
                    <ul class="space-y-2">
    <li><a href="{{ route('admin') }}" class="text-gray-400 hover:text-white transition-colors">Dashboard</a></li>
    <li><a href="{{ route('clientes.index') }}" class="text-gray-400 hover:text-white transition-colors">Clientes</a></li>
    <li><a href="{{ route('vehiculos.index') }}" class="text-gray-400 hover:text-white transition-colors">Vehículos</a></li>
    <li><a href="{{ route('ordenes.index') }}" class="text-gray-400 hover:text-white transition-colors">Órdenes</a></li>
</ul>

                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            +1 234 567 8900
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            info@taller.com
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            123 Calle Principal, Ciudad
                        </li>
                    </ul>
                </div>
            </div>
           
        </div>
    </footer>
</body>
</html>
