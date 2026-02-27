<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoAdicional extends Model
{
    protected $table = 'pedido_adicionales';

    protected $fillable = [
        'pedido_id',
        'adicional_id',
        'orden',
        'precio_usd',
        'precio_ars',
    ];
}
