<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'user_id',
        'producto_id',
        'estado_pedido_id',
        'cantidad',
        'pliego',
        'tamano',
        'detalle',
        'precio_total_usd',
        'precio_total_ars',
        'es_favorito',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoPedido::class, 'estado_pedido_id');
    }

    public function adicionales()
    {
        return $this->belongsToMany(Adicional::class, 'pedido_adicionales')
            ->withPivot(['orden', 'precio_usd', 'precio_ars'])
            ->withTimestamps();
    }

    public function archivos()
    {
        return $this->hasMany(PedidoArchivo::class);
    }

    // protected $fillable = [
    //     'productos_id',
    //     'cantidad',
    //     'created_at',
    //     'usuarios_id',
    // ];

    // // Relaciones

    // // $this->belongs_to('productos');
    // //     $this->belongs_to('usuarios');
    // //     $this->belongs_to('estados');
    // //     $this->has_many('pedidos_favoritos');


    // public function estado_pedidos() {
    //     return $this->belongsTo(User::class, 'estado_pedidos_id');
    // }
    
    // public function productos() {
    //     return $this->belongsTo(Producto::class, 'usuers_id');
    // }

    // public function users() {
    //     return $this->belongsTo(User::class, 'estado_pedidos_id');
    // }

}
