<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordenes_trabajo')->cascadeOnDelete();
            $table->enum('tipo', ['presupuesto_listo','terminado','otro']);
            $table->dateTime('fecha_envio')->nullable();
            $table->boolean('enviada')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('notificaciones'); }
};