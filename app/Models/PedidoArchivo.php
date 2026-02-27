<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoArchivo extends Model
{
    protected $fillable = [
        'pedido_id',
        'archivo',
        'mime',
        'peso',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}