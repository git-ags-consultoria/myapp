<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Painel Administrativo' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex min-h-screen">
    {{-- Sidebar Component --}}
    <x-admin.sidebar />

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        {{-- Header --}}
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">{{ $title ?? 'Dashboard' }}</h1>
        </header>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Content --}}
        <section>
            @yield('content')
        </section>
    </main>
</div>

</body>
</html>
