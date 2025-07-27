<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\ClientePortalController;


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin');

    Route::resource('clientes', ClienteController::class);
    Route::resource('vehiculos', VehiculoController::class);

    Route::resource('ordenes', OrdenTrabajoController::class)
        ->parameters(['ordenes' => 'orden']);

    Route::resource('repuestos', RepuestoController::class)
        ->parameters(['repuestos' => 'repuesto']);

    Route::resource('cotizaciones', CotizacionController::class)
        ->parameters(['cotizaciones' => 'cotizacion']);

    Route::get('cotizaciones/{cotizacion}/pdf', [CotizacionController::class, 'pdf'])
        ->name('cotizaciones.pdf');

    Route::resource('comentarios', \App\Http\Controllers\Admin\ComentarioController::class);
});

// Rutas del portal de cliente
Route::prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/', [ClientePortalController::class, 'index'])->name('index');
    Route::post('/reservar', [ClientePortalController::class, 'reservarServicio'])->name('reservar');
    Route::get('/mis-ordenes', [ClientePortalController::class, 'misOrdenes'])->name('mis-ordenes');
    Route::post('/comentario', [ClientePortalController::class, 'agregarComentario'])->name('comentario');
});
