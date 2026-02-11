<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecioProducto extends Model
{
    protected $table = 'precio_productos';

    protected $fillable = [
        'producto_id',
        'cantidad_desde',
        'cantidad_hasta',
        'precio_unitario',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function scopeParaCantidad($query, int $cantidad)
    {
        return $query->where('cantidad_desde', '<=', $cantidad)
                     ->where('cantidad_hasta', '>=', $cantidad);
    }
}
