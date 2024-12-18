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
            $table->foreignId('material_id')->constrained('materials')->onDelete('cascade');
            $table->string('estado', 50);
            $table->string('material_purpose');
            $table->boolean('material_requested');
            $table->foreignId('entrega_usuario_id')->nullable()->constrained('users');
            $table->foreignId('recepcion_usuario_id')->nullable()->constrained('users');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega')->nullable();
            $table->boolean('observaciones_entrega');
            $table->text('observaciones_texto')->nullable();
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