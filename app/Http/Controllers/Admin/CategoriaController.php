<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Services\CategoriaService;
use App\Http\Requests\CategoriaStoreRequest;

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
        return view('admin.categorias.create');
    }

    public function store(CategoriaStoreRequest $request)
    {
        //dd($request->all());
        $this->categoriaService->create($request->validated());
        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría creada exitosamente');
    }
 
    public function show(string $id)
    {
        //
    }

    public function edit(int $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));        
    }

    public function update(CategoriaStoreRequest $request, Categoria $categoria)
    {
        //dd($request->all());
        try {
            $this->categoriaService->update($categoria, $request->validated());            
            return redirect()->route('admin.categorias.index')
                ->with('success', 'Categoría actualizada exitosamente');

        } catch (\Exception $e) {
                return redirect()->route('admin.categorias.edit')
                ->with('error', 'Error:' . $e->getMessage());
        }
    }

    public function toggleActive(Categoria $categoria)
    {
        dd($categoria);
        $this->categoriaService->toggleActive($categoria);
        return redirect()->route('admin.categorias.index')
            ->with('success', 'Estado actualizado exitosamente');
    }

}
