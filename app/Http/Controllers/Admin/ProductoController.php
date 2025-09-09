<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
//use App\Http\Controllers\Admin\ProductoController;
use App\Services\ProductoService;
use Illuminate\Http\Request;

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
