<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'categorias_id',
        'comentarios',
    ];

    // Relaciones

    public function categorias() {
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class, 'productos_id');
    }

    public function estado_pedidos() {
        return $this->hasOne(EstadoPedido::class, 'productos_id');
    }

    public function precios() {
        return $this->hasMany(Precio::class, 'productos_id');
    }
}
