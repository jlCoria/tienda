<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id'    => \App\Models\Cliente::inRandomOrder()->first()->id,
            'total'         => fake()->randomFloat(2, 50, 5000),
            'estado'        => fake()->randomElement(['pendiente', 'entregado', 'cancelado']),
            'fecha_entrega' => fake()->dateTimeBetween('-30 days', '+30 days'),
        ];
    }
}