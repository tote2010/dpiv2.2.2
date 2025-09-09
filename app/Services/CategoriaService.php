<?php 

namespace App\Services;

use App\Models\Categoria;

class CategoriaService
{
    public function create(array $data)
    {
        //
    }

    public function update(Categoria $categoria, array $data)
    {
        //
    }

    public function toggleActive(Categoria $categoria)
    {
        $categoria->activo = !$categoria->activo;
        $categoria->save();
        return $categoria;
    }
}