<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'total',
        'estado',
        'fecha_entrega',
    ];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación muchos a muchos con Producto
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto');
    }

    // Local Scopes (equivalente a extension methods en C#)
    public function scopePorEnviar($query)
    {
        return $query->where('estado', 'pendiente')
                     ->whereDate('fecha_entrega', '>=', today())
                     ->whereDate('fecha_entrega', '<=', today()->addDays(3));
    }

    public function scopeRetrasados($query)
    {
        return $query->where('estado', 'pendiente')
                     ->whereDate('fecha_entrega', '<', today());
    }

    public function scopeEntregados($query)
    {
        return $query->where('estado', 'entregado');
    }

    public function scopeCancelados($query)
    {
        return $query->where('estado', 'cancelado');
    }
}