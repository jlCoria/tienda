@if($pedidos->isEmpty())
    <p class="text-gray-400 text-sm italic">No hay pedidos en esta categoría.</p>
@else
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="w-full text-sm bg-white">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left"># Pedido</th>
                    <th class="px-4 py-3 text-left">Cliente</th>
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-left">Fecha Entrega</th>
                    <th class="px-4 py-3 text-left">Productos</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($pedidos as $pedido)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-mono text-gray-500">#{{ $pedido->id }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $pedido->cliente->nombre }}</td>
                        <td class="px-4 py-3">${{ number_format($pedido->total, 2) }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($pedido->fecha_entrega)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-1">
                                @foreach($pedido->productos as $producto)
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                        {{ $producto->nombre }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="mt-3">
        {{ $pedidos->appends(request()->query())->links() }}
    </div>
@endif