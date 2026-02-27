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
        Schema::create('pedido_adicionales', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('pedido_id')
                  ->constrained()
                  ->cascadeOnDelete();
        
            $table->foreignId('adicional_id')
                  ->constrained('adicionales');
        
            $table->integer('orden')->default(1);
        
            // Snapshot de precios
            $table->decimal('precio_usd', 10, 3);
            $table->decimal('precio_ars', 12, 3);
        
            $table->timestamps();
        
            $table->unique(['pedido_id', 'adicional_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_adicionales');
    }
};
