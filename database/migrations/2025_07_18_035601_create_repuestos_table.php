<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
 // database/migrations/xxxx_create_repuestos_table.php
Schema::create('repuestos', function (Blueprint $table) {
    $table->id();
    $table->string('codigo')->unique();
    $table->string('nombre');
    $table->decimal('precio_unitario', 8, 2);
    $table->integer('stock_actual')->default(0);
    $table->timestamps();
});
    }
    public function down(): void { Schema::dropIfExists('repuestos'); }
};