<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cotizaciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('orden_id')->constrained('ordenes_trabajo')->cascadeOnDelete();
    $table->date('fecha');
    $table->decimal('total_servicio', 10, 2);   // Precio solo del servicio
    $table->decimal('total', 10, 2)->default(0); // Precio servicio + repuestos
    $table->boolean('aprobada')->default(false);
    $table->timestamps();
});

    }
    public function down(): void { Schema::dropIfExists('cotizaciones'); }
};