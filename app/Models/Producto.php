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
        'comentario',
    ];

    // Relaciones

    public function categorias() {
        return $this->belongsTo(Categoria::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }

    public function estado_pedidos() {
        return $this->hasOne(EstadoPedido::class);
    }

    public function precios() {
        return $this->hasMany(Precio::class);
    }
}
