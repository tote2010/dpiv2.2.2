<?php 

namespace App\Services;

use App\Models\Categoria;

class CategoriaService
{
    public function create(array $data)
    {
        return Categoria::create($data);
    }

    public function update(Categoria $categoria, array $data)
    {
        $categoria->update($data);
        return $categoria;
    }

    public function toggleActive(Categoria $categoria)
    {
        $categoria->activo = !$categoria->activo;
        $categoria->save();
        return $categoria;
    }
}