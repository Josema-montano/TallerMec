<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Cliente - Taller Mecánico')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('cliente.index') }}" class="text-2xl font-bold text-gray-900">
                        <span class="text-red-600">🔧</span> TALLER MECÁNICO
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('cliente.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-home mr-2"></i>Inicio
                    </a>
                    <a href="{{ route('cliente.mis-ordenes') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-list mr-2"></i>Mis Órdenes
                    </a>
                </nav>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button text-gray-700 hover:text-red-600 focus:outline-none focus:text-red-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-50">
                <a href="{{ route('cliente.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-home mr-2"></i>Inicio
                </a>
                <a href="{{ route('cliente.mis-ordenes') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-list mr-2"></i>Mis Órdenes
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="text-2xl font-bold mb-4">
                        <span class="text-red-600">🔧</span> TALLER MECÁNICO
                    </div>
                    <p class="text-gray-400">
                        Su taller de confianza para el mantenimiento y reparación de vehículos.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Horarios de Atención</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Lunes a Viernes: 8:00 AM - 6:00 PM</li>
                        <li>Sábados: 8:00 AM - 2:00 PM</li>
                        <li>Domingos: Cerrado</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-phone w-4 h-4 mr-2"></i>
                            +1 234 567 8900
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope w-4 h-4 mr-2"></i>
                            info@taller.com
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt w-4 h-4 mr-2"></i>
                            123 Calle Principal, Ciudad
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Taller Mecánico. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>