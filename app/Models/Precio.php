<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $table = 'precios';

    protected $fillable = [
        'precio',
        'productos_id',
        'precios_cantidad_id',
    ];

    //Relaciones

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function precios_cantidad()
    {
        return $this->belongsTo(PreciosCantidad::class);
    }
}
