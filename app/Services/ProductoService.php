<?php 

namespace App\Services;

use App\Models\Producto;
use Illuminate\Support\Facades\Hash;

class ProductoService
{
    public function getProductos()
    {
        return Producto::with('categorias')->get();
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = Producto::create($data);
        $user->syncRoles($data['roles'] ?? []);
        return $user;
    }

    public function update(Producto $user, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        $user->update($data);
        //$user->syncRoles($data['roles'] ?? []);
        return $user;
    }

    public function toggleActive(Producto $producto)
    {
        $producto->activo = !$producto->activo;
        $producto->save();
        return $producto;
    }
}