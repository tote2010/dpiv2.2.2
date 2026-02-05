<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    // Relaciones

    public function pedidos() {
        return $this->hasMany(Pedido::class, 'estado_pedidos_id');
    }
}
