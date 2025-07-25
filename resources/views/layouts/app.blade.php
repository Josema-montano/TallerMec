<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Taller')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-6">
            <h2 class="text-xl font-semibold">@yield('header')</h2>
        </div>
    </header>
    <main>@yield('content')</main>
</body>
</html>