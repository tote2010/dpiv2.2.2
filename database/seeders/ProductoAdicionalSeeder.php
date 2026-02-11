<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Adicional;
use Illuminate\Database\Seeder;

class ProductoAdicionalSeeder extends Seeder
{
    public function run(): void
    {
        $producto = Producto::where('nombre', 'Autoadhesivo')->first();
        $laminado = Adicional::where('nombre', 'Laminado Mate')->first();
        $medioCorte = Adicional::where('nombre', 'Medio Corte')->first();

        if (! $producto) {
            $this->command->warn('Producto Autoadhesivo no existe');
            return;
        }

        $data = [];

        if ($laminado) {
            $data[$laminado->id] = ['orden' => 1];
        }

        if ($medioCorte) {
            $data[$medioCorte->id] = ['orden' => 2];
        }

        $producto->adicionales()->syncWithoutDetaching($data);
    }
        // // 🔹 Productos base
        // $autoadhesivo = Producto::where('nombre', 'Autoadhesivo')->first();
        // $ilustracion  = Producto::where('nombre', 'Ilustración')->first();
        // $obra         = Producto::where('nombre', 'Papel Obra')->first();

        // // 🔹 Adicionales
        // $laminadoMate  = Adicional::where('nombre', 'Laminado Mate')->first();
        // $laminadoBrillo = Adicional::where('nombre', 'Laminado Brillo')->first();
        // $medioCorte    = Adicional::where('nombre', 'Medio Corte')->first();

        // // 🔸 Autoadhesivo → laminado + medio corte
        // if ($autoadhesivo) {
        //     $autoadhesivo->adicionales()->sync([
        //         $laminadoMate->id   => ['orden' => 1],
        //         $laminadoBrillo->id => ['orden' => 1],
        //         $medioCorte->id     => ['orden' => 2],
        //     ]);
        // }

        // // 🔸 Ilustración → solo laminados
        // if ($ilustracion) {
        //     $ilustracion->adicionales()->sync([
        //         $laminadoMate->id   => ['orden' => 1],
        //         $laminadoBrillo->id => ['orden' => 1],
        //     ]);
        // }

        // 🔸 Papel obra → no acepta adicionales
        // no se asocia nada (correcto)
    //}
}

