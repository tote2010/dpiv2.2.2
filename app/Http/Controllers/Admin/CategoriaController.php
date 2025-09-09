<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    protected $categoriaService; 

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function toggleActive(Categoria $categoria)
    {
        // dd($producto);
        $this->categoriaService->toggleActive($categoria);
        return redirect()->route('admin.categorias.index')
            ->with('success', 'Estado actualizado exitosamente');
    }

}
