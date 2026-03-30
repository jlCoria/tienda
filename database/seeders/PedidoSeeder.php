<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        Pedido::factory()->count(1500)->create()->each(function ($pedido) {
            $productos = Producto::inRandomOrder()
                ->limit(rand(1, 5))
                ->pluck('id');

            $pedido->productos()->attach($productos);
        });
    }
}