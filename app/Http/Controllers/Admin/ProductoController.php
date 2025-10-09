<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Services\ProductoService;
use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;

class ProductoController extends Controller
{
    protected $productoService;

    public function __contruct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = Producto::with('categorias')->get();
        //$productos = $this->productoService->all();
        return view('admin.productos.index', compact('productos'));
    }
    
    public function create()
    {
        try
        {
            $categorias = Categoria::all();
            return view('admin.productos.create', compact('categorias'));
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.index')
                ->with('error', 'Error:' . $e->getMessage());
        }
    }

    
    public function store(ProductoStoreRequest $request, Producto $producto)
    {
        try {
            //dd($request->all());
            $this->productoService->create($producto, $request->validated());
            return redirect()->route('admin.productos.index')
                ->with('success', 'Producto creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.create')
                ->with('error', 'Error:' . $e->getMessage());
        }
    }
    
    public function show(string $id)
    {
        //
    }
    
    public function edit(string $id)
    {
        try {
            $producto = Producto::findOrFail($id);
            // $categorias = Categoria::all();
            return view('admin.productos.edit', compact('producto'));
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.index')
                ->with('error', 'Error:' . $e->getMessage());
        }
    }
    
    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        try {
            //$producto = Producto::findOrFail($id);
            $this->productoService->update($producto, $request->validated());
            return redirect()->route('admin.productos.index')
                ->with('success', 'Producto actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.edit')
                ->with('error', 'Error:' . $e->getMessage());
        }
    }
   
    public function destroy(string $id)
    {
        //
    }

    public function toggleActive(Producto $producto)
    {
        // dd($producto);
        $this->productoService->toggleActive($producto);
        return redirect()->route('admin.productos.index')
            ->with('success', 'Estado actualizado exitosamente');
    }
}
