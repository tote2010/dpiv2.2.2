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
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('pedidos_id')->nullable();
            $table->foreignId('productos_id');
            $table->foreignId('productos_id2')->nullable();
            $table->foreignId('productos_id3')->nullable();
            $table->integer('cantidad');
            $table->string('file')->nullable();
            $table->text('detalle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
