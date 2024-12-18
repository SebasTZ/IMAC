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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->string('descripcion');
            $table->string('estado', 50);
            $table->decimal('costo', 8, 2);
            $table->string('material_purpose');
            $table->boolean('material_received');
            $table->string('tipo_comprobante');
            $table->foreignId('trabajo_usuario_id')->nullable()->constrained('users');
            $table->date('fecha_ingreso'); // Add this line
            $table->date('fecha_culminacion')->nullable(); // Add this line
            $table->boolean('observaciones')->default(false); // Add this line
            $table->text('observacion_texto')->nullable(); // Add this line
            $table->boolean('conformidad_cliente')->default(true); // Add this line
            $table->text('conformidad_texto')->nullable(); // Add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};