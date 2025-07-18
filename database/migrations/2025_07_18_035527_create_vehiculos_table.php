<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();
            $table->string('patente')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->year('anio');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('vehiculos'); }
};