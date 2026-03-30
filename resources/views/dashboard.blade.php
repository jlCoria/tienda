<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Logística Tienda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Panel de Logística</h1>
        <div class="flex items-center gap-4">
            <span class="text-gray-300">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded-lg transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8">

        {{-- Por Enviar --}}
        <div class="mb-10">
            <h2 class="text-lg font-bold text-blue-700 mb-3">
                📦 Por Enviar
                <span class="text-sm font-normal text-gray-500">(pendientes en los próximos 3 días)</span>
            </h2>
            @include('partials.tabla-pedidos', ['pedidos' => $porEnviar, 'pageName' => 'porEnviar'])
        </div>

        {{-- Retrasados --}}
        <div class="mb-10">
            <h2 class="text-lg font-bold text-red-700 mb-3">
                ⚠️ Retrasados
                <span class="text-sm font-normal text-gray-500">(pendientes con fecha vencida)</span>
            </h2>
            @include('partials.tabla-pedidos', ['pedidos' => $retrasados, 'pageName' => 'retrasados'])
        </div>

        {{-- Entregados --}}
        <div class="mb-10">
            <h2 class="text-lg font-bold text-green-700 mb-3">
                ✅ Entregados
            </h2>
            @include('partials.tabla-pedidos', ['pedidos' => $entregados, 'pageName' => 'entregados'])
        </div>

        {{-- Cancelados --}}
        <div class="mb-10">
            <h2 class="text-lg font-bold text-gray-600 mb-3">
                ❌ Cancelados
            </h2>
            @include('partials.tabla-pedidos', ['pedidos' => $cancelados, 'pageName' => 'cancelados'])
        </div>

    </div>
</body>
</html>