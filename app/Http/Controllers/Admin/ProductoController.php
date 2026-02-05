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

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = Producto::with('categorias')->get();
        return view('admin.productos.index', compact('productos'));
    }
    
    public function create()
    {
        try
        {
            $categorias = Categoria::where('activo', 1)->orderBy('nombre')->get();
            return view('admin.productos.create', compact('categorias'));

        } catch (\Exception $e) {

            return redirect()->route('admin.productos.index')
                ->with('error', 'Error:' . $e->getMessage());

        }
    }

    public function store(ProductoStoreRequest $request, Producto $producto)
    {
        try 
        {
            $this->productoService->create($request->validated());
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
            $categorias = Categoria::where('activo', 1)->orderBy('nombre')->get();
            return view('admin.productos.edit', compact('producto', 'categorias'));
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.create')
                ->with('error', 'Error:' . $e->getMessage());
        }
    }
    
    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        try 
        {
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
        $this->productoService->toggleActive($producto);
        return redirect()->route('admin.productos.index')
            ->with('success', 'Estado actualizado exitosamente');
    }
}
