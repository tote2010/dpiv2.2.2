<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Adicional;
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
        $productos = Producto::with('categorias')
            ->orderBy('nombre')
            ->get();

        return view('admin.productos.index', compact('productos'));
    }
    
    public function create()
    {
        try
        {
            $categorias = Categoria::where('activo', true)
                ->orderBy('nombre')
                ->get();
            
            $adicionales = Adicional::where('activo', true)->get();
            // relaciones existentes (clave: adicional_id)
            // $productoAdicionales = $producto->adicionales
            //     ->keyBy('id');
                
            return view('admin.productos.create', compact('categorias', 'adicionales'));

        } catch (\Exception $e) {

            return redirect()->route('admin.productos.index')
                ->with('error', 'Error:' . $e->getMessage());

        }
    }

    public function store(ProductoStoreRequest $request, Producto $producto)
    {
        try 
        {
            //$this->productoService->create($request->validated());
            Producto::create($request->validated());

            return redirect()
                ->route('admin.productos.index')
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
    
    //public function edit(string $id)
    public function edit(Producto $producto)
    {
        try {
            //$producto = Producto::findOrFail($id);
            $categorias = Categoria::where('activo', 1)
                ->orderBy('nombre')
                ->get();

            $adicionales = Adicional::where('activo', true)
                ->orderBy('nombre')
                ->get();

            // relaciones existentes (clave: adicional_id)
            $productoAdicionales = $producto->adicionales
                ->keyBy('id');
                
            return view('admin.productos.edit', compact(
                        'producto', 
                        'categorias', 
                        'adicionales',
                        'productoAdicionales'));

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

            if ($producto->acepta_adicionales) {
            
                $adicionalesSync = [];

                foreach ($request->input('adicionales', []) as $id => $data) {
                    if (isset($data['activo'])) {
                        $adicionalesSync[$id] = [
                            'orden' => $data['orden'] ?? 1
                        ];
                    }
                }

                $producto->adicionales()->sync($adicionalesSync);

            } else {
                // Si deja de aceptar adicionales → limpiamos pivot
                $producto->adicionales()->detach();
            }

            return redirect()
                ->route('admin.productos.index')
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


    // ANALIZAR ESTE CÓDIGOS Y VER SI SE DEBE MOVER A UN SERVICIO O MODELO
    public function precioParaCantidad(int $cantidad)
    {
        return $this->precios()
            ->where('cantidad_desde', '<=', $cantidad)
            ->where(function ($q) use ($cantidad) {
                $q->where('cantidad_hasta', '>=', $cantidad)
                ->orWhereNull('cantidad_hasta');
            })
            ->orderBy('cantidad_desde', 'desc')
            ->first();
    }
}
