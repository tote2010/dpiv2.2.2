<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecioAdicional extends Model
{
    protected $table = 'precio_adicionales';

    protected $fillable = [
        'adicional_id',
        'cantidad_desde',
        'cantidad_hasta',
        'precio_unitario',
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:3',
        'cantidad_desde'  => 'integer',
        'cantidad_hasta'  => 'integer',
    ];

    public function adicional()
    {
        return $this->belongsTo(Adicional::class);
    }

    public function scopeParaCantidad($query, int $cantidad)
    {
        return $query->where('cantidad_desde', '<=', $cantidad)
                     ->where('cantidad_hasta', '>=', $cantidad);
    }
}
