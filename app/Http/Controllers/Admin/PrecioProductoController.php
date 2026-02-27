<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\PrecioProducto;
use App\Models\ValorDolar;
use Illuminate\Http\Request;

class PrecioProductoController extends Controller
{
    public function index(Producto $producto)
    {
        $precios = $producto->precios()
            ->orderBy('cantidad_desde')
            ->get();
            
        $dolar_actual = ValorDolar::orderBy('id', 'desc')
            ->first()
            ->valor;

        return view('admin.productos.precios.index', compact('producto', 'precios'), 
            [
                'precios' => $precios,
                'dolar'   => $dolar_actual, // o como lo tengas
            ]);
    }

    public function create(Producto $producto)
    {
        return view('admin.productos.precios.create', compact('producto'));
    }

    public function store(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'cantidad_desde'  => ['required','integer','min:1'],
            'cantidad_hasta'  => ['nullable','integer','gte:cantidad_desde'],
            'precio_unitario' => ['required','numeric','min:0'],
        ]);

        if ($this->rangoSolapado(
            $producto,
            $data['cantidad_desde'],
            $data['cantidad_hasta']
        )) {
            return back()
                ->withErrors(['cantidad_desde' => 'El rango se solapa con otro existente'])
                ->withInput();
        }

        $producto->precios()->create($data);

        return redirect()
            ->route('admin.productos.precios.index', $producto)
            ->with('success', 'Precio creado correctamente');
    }

    public function update(Request $request, Producto $producto, PrecioProducto $precio)
    {
        abort_unless($precio->producto_id === $producto->id, 404);

        $data = $request->validate([
            'precio_unitario' => ['required', 'numeric', 'min:0'],
        ]);

        $precio->update($data);

        return back()->with('success', 'Precio actualizado');
    }

    private function rangoSolapado($producto, $desde, $hasta, $exceptId = null)
    {
        return $producto->precios()
            ->when($exceptId, fn ($q) => $q->where('id', '!=', $exceptId))
            ->where(function ($q) use ($desde, $hasta) {
                $q->whereBetween('cantidad_desde', [$desde, $hasta ?? PHP_INT_MAX])
                ->orWhereBetween('cantidad_hasta', [$desde, $hasta ?? PHP_INT_MAX])
                ->orWhere(function ($q) use ($desde, $hasta) {
                    $q->where('cantidad_desde', '<=', $desde)
                        ->where(function ($q) use ($hasta) {
                            $q->where('cantidad_hasta', '>=', $hasta)
                            ->orWhereNull('cantidad_hasta');
                        });
                });
            })
            ->exists();
    }
}
