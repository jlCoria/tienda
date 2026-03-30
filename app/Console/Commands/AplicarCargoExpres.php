<?php

namespace App\Console\Commands;

use App\Models\Pedido;
use Illuminate\Console\Command;

class AplicarCargoExpres extends Command
{
    protected $signature   = 'pedidos:cargo-expres';
    protected $description = 'Aplica un recargo del 10% a pedidos prioritarios de mañana';

    public function handle()
    {
        $this->info('Buscando pedidos con cargo exprés...');

        $pedidos = Pedido::where('estado', 'pendiente')
            ->whereDate('fecha_entrega', today()->addDay())
            ->whereHas('productos', function ($query) {
                $query->where('productos.id', 5);
            })
            ->get();

        if ($pedidos->isEmpty()) {
            $this->info('No se encontraron pedidos para procesar.');
            return;
        }

        $this->info("Se encontraron {$pedidos->count()} pedidos. Aplicando recargo...");

        foreach ($pedidos as $pedido) {
            $pedido->update([
                'total' => round($pedido->total * 1.10, 2)
            ]);
        }

        $this->info('✅ Recargo del 10% aplicado correctamente.');
    }
}