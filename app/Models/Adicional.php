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
}
