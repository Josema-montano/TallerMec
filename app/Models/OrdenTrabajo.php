<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table = 'ordenes_trabajo';

    protected $fillable = [
        'vehiculo_id',
        'fecha_ingreso',
        'fecha_estimada_fin',
        'fecha_entrega',
        'estado',
        'descripcion_problema',
        'kilometraje',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'fecha_estimada_fin' => 'date',
        'fecha_entrega' => 'date',
    ];

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function serviciosPivot(): HasMany
    {
        return $this->hasMany(OrdenServicio::class);
    }

    public function cotizacion(): HasOne
    {
        return $this->hasOne(Cotizacion::class);
    }

    public function notificaciones(): HasMany
    {
        return $this->hasMany(Notificacion::class);
    }
}