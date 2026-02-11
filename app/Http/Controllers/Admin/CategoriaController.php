<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Services\CategoriaService;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    protected $categoriaService; 

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        //$categorias = Categoria::all();
        //IA
        $categorias = Categoria::orderBy('nombre')->get();
        
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    //public function store(CategoriaStoreRequest $request)
    //public function store(Request $request)
    public function store(StoreCategoriaRequest $request)
    {
        //$this->categoriaService->create($request->validated());

        //IA
        // $data = $request->validate([
        //     'nombre' => ['required', 'string', 'max:255', 'unique:categorias,nombre'],
        //     'activo' => ['required', 'boolean'],
        // ]);

        try {
            
            Categoria::create($request->validated());

            return redirect()
                ->route('admin.categorias.index')
                ->with('success', 'Categoría creada exitosamente');

        } catch (\Exception $e) {

            return redirect()->route('admin.categorias.create')
                ->with('error', 'Error:' . $e->getMessage());

        }
    }
 
    public function show(string $id)
    {
        //
    }

    //public function edit(int $id)
    public function edit(Categoria $categoria)
    {
        //$categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));        
    }

    //public function update(CategoriaStoreRequest $request, Categoria $categoria)
    //public function update(Request $request, Categoria $categoria)
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        try {
            //$this->categoriaService->update($categoria, $request->validated());
            
            //IA
            // $data = $request->validate([
            //     'nombre' => ['required', 'string', 'max:255', 'unique:categorias,nombre,' . $categoria->id],
            //     'activo' => ['required', 'boolean'],
            // ]);
            
            $categoria->update($request->validated());

            return redirect()
                ->route('admin.categorias.index')
                ->with('success', 'Categoría actualizada exitosamente');

        } catch (\Exception $e) {
            
                return redirect()->route('admin.categorias.edit')
                ->with('error', 'Error:' . $e->getMessage());

        }
    }

    public function toggleActive(Categoria $categoria)
    {
        //dd($categoria);
        //$this->categoriaService->toggleActive($categoria);

        //IA
        try {

            $categoria->update([
                'activo' => ! $categoria->activo
            ]);

            return redirect()
                ->route('admin.categorias.index')
                ->with('success', 'Estado actualizado exitosamente');
            
        } catch (\Exception $e) {

            return redirect()->route('admin.categorias.index')
                ->with('error', 'Error:' . $e->getMessage());

        }
    }

}
