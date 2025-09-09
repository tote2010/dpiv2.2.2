<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrecioUpdateRequest;
use App\Models\Precio;
use App\Models\PreciosCantidad;
use App\Models\ValorDolar;
use App\Services\PrecioService;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
 
    protected $precioService;

    public function __construct(PrecioService $precioService)
    {
        $this->precioService = $precioService;
    }

    public function index()
    {
        $precios = $this->precioService->getPrecios();
        $dolar = ValorDolar::orderBy('id', 'desc')->first()->valor;

        return view('admin.precios.index', compact('precios', 'dolar'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // try {
        //     $producto = $this->precioService->agregarProductoConPrecios(
        //         [
        //             'nombre' => $validated['nombre'],
        //             'descripcion' => $validated['descripcion'],
        //         ],
        //         $validated['precios']
        //     );
    
        //     return response()->json(['message' => 'Producto creado con éxito', 'producto' => $producto], 201);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(int $id)
    {
        $precios = Precio::find($id);//$this->precioService->getPreciosByProducto($producto_id);
        //dd($precios);
        return view('admin.precios.edit', compact('precios'));
    }

    public function update(PrecioUpdateRequest $request, Precio $precio)
    {
        $validated = $request->validate([
                        'precio' => 'required',
                    ]);

        $precio = $this->precioService->update($precio, $request->validated()); //Precio::updated($precio);
        return redirect()->route('admin.precios.index')->with('success', 'Precio Actualizado Exitosamente');
    }

    public function toggleActive(Precio $precio)
    {
        // dd($producto);
        $this->precioService->toggleActive($precio);
        return redirect()->route('admin.categorias.index')
            ->with('success', 'Estado actualizado exitosamente');
    }
}
