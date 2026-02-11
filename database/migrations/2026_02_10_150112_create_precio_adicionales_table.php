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
        Schema::create('precio_adicionales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adicional_id')
                ->constrained('adicionales')
                ->cascadeOnDelete();

            $table->integer('cantidad_desde');
            $table->integer('cantidad_hasta');
            $table->decimal('precio_unitario', 10, 3);

            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio_adicionales');
    }
};
