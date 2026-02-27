<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adicional;
use App\Models\PrecioAdicional;
use App\Models\ValorDolar;
use Illuminate\Http\Request;

class PrecioAdicionalController extends Controller
{
    public function index(Adicional $adicional)
    {
        $precios = $adicional->precios()
            ->orderBy('cantidad_desde')
            ->get();

        $dolar_actual = ValorDolar::orderBy('id', 'desc')
            ->first()
            ->valor;

        return view('admin.adicionales.precios.index', compact('adicional', 'precios'), 
            [
                'precios' => $precios,
                'dolar'   => $dolar_actual, // o como lo tengas
            ]);
    }

    public function create(Adicional $adicional)
    {
        return view('admin.adicionales.precios.create', compact('adicional'));
    }

    public function store(Request $request, Adicional $adicional)
    {
        $data = $request->validate([
            'cantidad_desde'  => ['required','integer','min:1'],
            'cantidad_hasta'  => ['nullable','integer','gte:cantidad_desde'],
            'precio_unitario' => ['required','numeric','min:0'],
        ]);

        if ($this->rangoSolapado(
            $adicional,
            $data['cantidad_desde'],
            $data['cantidad_hasta']
        )) {
            return back()
                ->withErrors(['cantidad_desde' => 'El rango se solapa con otro existente'])
                ->withInput();
        }

        $adicional->precios()->create($data);

        return redirect()
            ->route('admin.adicionales.precios.index', $adicional)
            ->with('success', 'Precio creado correctamente');
    }

    public function update(Request $request, Adicional $adicional, PrecioAdicional $precio)
    {
        abort_unless($precio->adicional_id === $adicional->id, 404);

        $data = $request->validate([
            'precio_unitario' => ['required', 'numeric', 'min:0'],
        ]);

        $precio->update($data);

        return back()->with('success', 'Precio actualizado');
    }

    private function rangoSolapado($adicional, $desde, $hasta, $exceptId = null)
    {
        return $adicional->precios()
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
