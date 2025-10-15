<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name', 'MyApp') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800" id="admin-app">
<!-- Sidebar (desktop & mobile) -->
<div
    :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
    class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-gray-100 transform transition-transform duration-200 ease-in-out md:translate-x-0 md:static md:flex-shrink-0 z-50"
>
    <div class="p-6 text-2xl font-bold text-blue-400 border-b border-gray-800">
        MyApp Admin
    </div>
    <nav class="flex-1 px-4 space-y-2 mt-4">
        <a href="{{ route('admin.federations.index') }}"
           class="block py-2 px-3 rounded hover:bg-gray-800 {{ request()->is('admin/federations*') ? 'bg-gray-800 text-blue-400' : '' }}">
            🏛 Federations
        </a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-gray-800">👥 Users</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-gray-800">⚙️ Settings</a>
    </nav>
    <div class="p-4 text-sm text-gray-500 border-t border-gray-800">
        &copy; {{ date('Y') }} MyApp
    </div>
</div>

<!-- Overlay (mobile only) -->
<div
    v-if="sidebarOpen"
    @click="closeSidebar"
    class="fixed inset-0 bg-black opacity-40 md:hidden z-40">
</div>

<!-- Main Content -->
<div class="flex flex-col flex-1 min-h-screen md:ml-64">
    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center sticky top-0 z-30">
        <div class="flex items-center space-x-3">
            <button @click="toggleSidebar" class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-lg font-semibold text-gray-700">Admin Panel</h1>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-500 hidden sm:inline">Olá, Admin</span>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                Logout
            </button>
        </div>
    </header>

    <!-- Content -->
    <main class="p-6 flex-1 overflow-y-auto">
        @yield('content')
    </main>
</div>
</body>
</html>
