<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cotizaciones_repuestos', function (Blueprint $table) {
            $table->foreignId('cotizacion_id')->constrained('cotizaciones')->cascadeOnDelete();
            $table->foreignId('repuesto_id')->constrained('repuestos')->cascadeOnDelete();
            $table->unsignedSmallInteger('cantidad');
            $table->decimal('precio_total', 10, 2);
            $table->primary(['cotizacion_id','repuesto_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('cotizaciones_repuestos'); }
};