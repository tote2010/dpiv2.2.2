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
        'acepta_adicionales',
        'comentarios',
        'activo',
    ];

    protected $casts = [
        'acepta_adicionales' => 'boolean',
        'activo' => 'boolean',
    ];

    // Relaciones

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }

    public function adicionales()
    {
        return $this->belongsToMany(
            Adicional::class,
            'producto_adicionales',
            'producto_id',
            'adicional_id'
        )->withPivot('orden')->withTimestamps()
         ->orderBy('producto_adicionales.orden');
    }

    public function precios()
    {
        return $this->hasMany(PrecioProducto::class);
    }

    public function adicionalesPrincipales()
    {
        return $this->adicionales()->wherePivot('orden', 1);
    }

    public function adicionalesSecundarios()
    {
        return $this->adicionales()->wherePivot('orden', 2);
    }

    public function aceptaAdicionales()
    {
        return $this->acepta_adicionales;
    }

    // public function pedidos() {
    //     return $this->hasMany(Pedido::class, 'productos_id');
    // }

    // public function estado_pedidos() {
    //     return $this->hasOne(EstadoPedido::class, 'productos_id');
    // }

    // public function precios() {
    //     return $this->hasMany(Precio::class, 'productos_id');
    // }
}
