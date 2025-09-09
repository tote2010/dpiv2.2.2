<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ValorDolar;
use Illuminate\Http\Request;

class ValorDolarController extends Controller
{

    public function index()
    {
        $dolar = ValorDolar::orderBy('id', 'desc')->first();
        $valores = ValorDolar::orderBy('id', 'desc')->get();

        return view('admin.valorDolar.index', compact('dolar', 'valores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'valor' => 'required|numeric|min:0'
        ]);
        ValorDolar::create($validated);

        // return redirect()->route('admin.valorDolar.index')->with([
        //         'type' => 'success', 
        //         'message' => 'Valor del Dolar Actualizado con Éxit
        //     ']);


        // $dollarValue = new ValorDolar();
        // $dollarValue->value = $request->value;
        // $dollarValue->date = now();
        // $dollarValue->save();

        return response()->json([
            'success' => true,
    //         'dato' => $datos,
        ]);
    }

    // public function store(Request $request)
    // {
    //     // Validar los datos
    //     $validated = $request->validate([
    //         'valor' => 'required|float',
    //     ]);

    //     // Crear el registro
    //     //$dato = ValorDolar::create($validated);
    //     $dolar = new ValorDolar();
    //     $dolar->valor = $request;
    //     $dolar->save();
    //     //Consulta a la DB

    //     $datos = ValorDolar::orderBy('id', 'desc')->first();

    //     // Responder con el dato creado
    //     return response()->json([
    //         'success' => true,
    //         'dato' => $datos,
    //     ]);
    // }
    //return response()->json([
        //     'date' => $dollarValue->date->format('Y-m-d H:i:s'),
        //     'value' => $dollarValue->value
        //ValorDolar::orderBy('id', 'desc')-> ]);
    public function historial(string $id)
    {
        //
    }
  
}
