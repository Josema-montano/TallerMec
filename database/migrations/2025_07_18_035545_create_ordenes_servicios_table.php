<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ordenes_servicios', function (Blueprint $table) {
    $table->foreignId('orden_id')->constrained('ordenes_trabajo')->cascadeOnDelete();
    $table->foreignId('servicio_id')->constrained('servicios')->cascadeOnDelete();
    $table->unsignedTinyInteger('horas_trabajadas')->default(1);
    $table->decimal('precio_total', 10, 2);
    $table->timestamps();     
    $table->primary(['orden_id','servicio_id']);
});
    }
    public function down(): void { Schema::dropIfExists('ordenes_servicios'); }
};