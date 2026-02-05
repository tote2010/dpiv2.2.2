<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'productos_id',
        'cantidad',
        'created_at',
        'usuarios_id',
    ];

    // Relaciones

    // $this->belongs_to('productos');
    //     $this->belongs_to('usuarios');
    //     $this->belongs_to('estados');
    //     $this->has_many('pedidos_favoritos');


    public function estado_pedidos() {
        return $this->belongsTo(User::class, 'estado_pedidos_id');
    }
    
    public function productos() {
        return $this->belongsTo(Producto::class, 'usuers_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'estado_pedidos_id');
    }

}
