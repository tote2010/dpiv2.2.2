<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->integer('cantidad1');
            $table->integer('cantidad2')->nullable();
            $table->integer('cantidad3')->nullable();
            $table->integer('cantidad_horas1')->nullable();
            $table->integer('cantidad_horas2')->nullable();
            $table->integer('cantidad_horas3')->nullable();
            $table->integer('cantidad_kilos1')->nullable();
            $table->integer('cantidad_kilos2')->nullable();
            $table->integer('cantidad_kilos3')->nullable();
            $table->foreignId('medidas_impresion_id');
            $table->foreignId('papeles_id');
            $table->foreignId('medidas_papeles_id');
            $table->integer('entradas');
            $table->integer('chapas');
            $table->float('prueba_color', '6,2')->nullable();
            $table->float('original', '7,2')->nullable();
            $table->float('hs_impresion1', '5,2')->nullable();
            $table->float('hs_impresion2', '5,2')->nullable();
            $table->float('hs_impresion3', '5,2')->nullable();
            $table->float('hs_encuadernacion1', '5,2')->nullable();
            $table->float('hs_encuadernacion2', '5,2')->nullable();
            $table->float('hs_encuadernacion3', '5,2')->nullable();
            $table->float('corte1', '7,2')->nullable();
            $table->float('corte2', '7,2')->nullable();
            $table->float('corte3', '7,2')->nullable();
            $table->float('uv', '10,2')->nullable();
            $table->integer('laminado')->nullable();
            $table->integer('doblado')->nullable();
            $table->boolean('troquelado')->default(0);
            $table->float('cortante', '7,2')->nullable();
            $table->float('encuadernacion', '10,2')->nullable();
            $table->string('encuadernacion_tipo', '20')->nullable();
            $table->float('costo1', '10,2');
            $table->float('costo2', '10,2')->nullable();
            $table->float('costo3', '10,2')->nullable();
            $table->integer('utilidad1');
            $table->integer('utilidad2')->nullable();
            $table->integer('utilidad3')->nullable();
            $table->float('importe1', '10,2');
            $table->float('importe2', '10,2')->nullable();
            $table->float('importe3', '10,2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
