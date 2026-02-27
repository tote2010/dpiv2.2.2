<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adicional;
use Illuminate\Http\Request;

class AdicionalController extends Controller
{
    
    public function index()
    {
        $adicionales = Adicional::orderBy('nombre')->get();

        return view('admin.adicionales.index', compact('adicionales'));
    }

    public function create()
    {
        return view('admin.adicionales.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'activo' => ['nullable'],
        ]);

        Adicional::create([
            'nombre' => $validated['nombre'],
            'activo' => $request->boolean('activo'),
        ]);
    
        return redirect()
            ->route('admin.adicionales.index')
            ->with('success', 'Adicional creado correctamente');
    }

    public function edit(Adicional $adicional)
    {
        return view('admin.adicionales.edit', compact('adicional'));
    }

    public function update(Request $request, Adicional $adicional)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
        ]);
    
        $adicional->update([
            'nombre' => $validated['nombre'],
            'activo' => $request->boolean('activo'),
        ]);
    
        return redirect()
            ->route('admin.adicionales.index')
            ->with('success', 'Adicional actualizado correctamente');
    }

    public function toggleActive(Adicional $adicional)
    {
        $adicional->activo = !$adicional->activo;
        $adicional->save();
    
        return redirect()->route('admin.adicionales.index')->with('success', 'Estado del adicional actualizado correctamente.');
    }   
}
