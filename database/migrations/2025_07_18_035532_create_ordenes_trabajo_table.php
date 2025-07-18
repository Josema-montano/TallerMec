<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ordenes_trabajo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->cascadeOnDelete();
            $table->date('fecha_ingreso');
            $table->text('descripcion_problema');
            $table->enum('estado', ['pendiente','en_proceso','finalizado','cancelado'])->default('pendiente');
            $table->date('fecha_estimada_fin')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('ordenes_trabajo'); }
};