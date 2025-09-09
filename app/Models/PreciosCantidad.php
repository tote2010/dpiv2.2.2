<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreciosCantidad extends Model
{
    //use HasFactory;

    protected $table = 'precios_cantidad';

    // Relaciones
    public function precios() {
        return $this->hasMany(Precio::class);
    }
}
