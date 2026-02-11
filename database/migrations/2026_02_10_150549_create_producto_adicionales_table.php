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
        Schema::create('producto_adicionales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')
                ->constrained('productos')
                ->cascadeOnDelete();

            $table->foreignId('adicional_id')
                ->constrained('adicionales')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('orden');
            $table->boolean('obligatorio')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->unique(['producto_id', 'adicional_id', 'orden']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_adicionales');
    }
};
