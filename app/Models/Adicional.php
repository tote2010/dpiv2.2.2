<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
 
    protected $table = 'adicionales';

    protected $fillable = [
        'nombre',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function productos()
    {
        return $this->belongsToMany(
            Producto::class,
            'producto_adicionales',
            'adicional_id',
            'producto_id'
        )->withPivot('orden')->withTimestamps();
    }

    public function precios()
    {
        return $this->hasMany(PrecioAdicional::class);
    }

    public function precioParaCantidad(int $cantidad): ?PrecioAdicional
    {
        return $this->precios()
            ->where('cantidad_desde', '<=', $cantidad)
            ->where(function ($q) use ($cantidad) {
                $q->where('cantidad_hasta', '>=', $cantidad)
                ->orWhereNull('cantidad_hasta');
            })
            ->orderBy('cantidad_desde', 'desc')
            ->first();
    }
}
