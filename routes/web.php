<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\OrdenTrabajoController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin');

    Route::resource('clientes', ClienteController::class);
    Route::resource('vehiculos', VehiculoController::class);

    Route::resource('ordenes', OrdenTrabajoController::class)
        ->parameters(['ordenes' => 'orden']);

    Route::resource('repuestos', RepuestoController::class)
        ->parameters(['repuestos' => 'repuesto']);

    // CRUD de Cotizaciones
    Route::resource('cotizaciones', CotizacionController::class)
        ->parameters(['cotizaciones' => 'cotizacion']);

    // Ruta personalizada para generar PDF
    Route::get('cotizaciones/{cotizacion}/pdf', [CotizacionController::class, 'pdf'])
        ->name('cotizaciones.pdf');
});
