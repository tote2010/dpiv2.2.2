<?php 

namespace App\Services;

use App\Models\Producto;

class ProductoService
{
    public function getProductos()
    {
        return Producto::with('categorias')->get();
    }

    public function create(array $data)
    {
        return Producto::create($data);
    }

    public function update(Producto $producto, array $data)
    {      
        $producto->update($data);
        return $producto;
    }

    public function toggleActive(Producto $producto)
    {
        $producto->activo = !$producto->activo;
        $producto->save();
        return $producto;
    }
}