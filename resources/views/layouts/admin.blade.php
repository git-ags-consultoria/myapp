<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name', 'MyApp') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 flex h-screen">
<!-- Sidebar -->
<aside class="w-64 bg-gray-900 text-gray-100 flex-shrink-0 hidden md:flex flex-col">
    <div class="p-6 text-2xl font-bold text-blue-400">
        MyApp Admin
    </div>
    <nav class="flex-1 px-4 space-y-2">
        <a href="{{ route('admin.federations.index') }}"
           class="block py-2 px-3 rounded hover:bg-gray-800 {{ request()->is('admin/federations*') ? 'bg-gray-800 text-blue-400' : '' }}">
            🏛 Federations
        </a>
    </nav>
    <div class="p-4 text-sm text-gray-500 border-t border-gray-800">
        &copy; {{ date('Y') }} MyApp
    </div>
</aside>

<!-- Main Content -->
<div class="flex-1 flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-lg font-semibold text-gray-700">Admin Panel</h1>
        <div>
            <span class="text-sm text-gray-500 mr-3">Olá, Admin</span>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">Logout</button>
        </div>
    </header>

    <!-- Page Content -->
    <main class="p-6 flex-1 overflow-y-auto">
        @yield('content')
    </main>
</div>
</body>
</html>
