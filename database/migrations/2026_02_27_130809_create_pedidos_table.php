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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();
        
            $table->foreignId('producto_id')
                  ->constrained('productos');
        
            $table->foreignId('estado_pedido_id')
                  ->constrained('estados_pedidos');
        
            $table->integer('cantidad');
        
            // Offset only (editable por admin/gestión)
            $table->integer('pliego')->nullable();
        
            // Info descriptiva
            $table->string('tamano')->nullable();
            $table->text('detalle')->nullable();
        
            // Snapshot de precios
            $table->decimal('precio_total_usd', 10, 2);
            $table->decimal('precio_total_ars', 12, 2);
        
            // Flags de negocio
            $table->boolean('es_favorito')->default(false);
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
