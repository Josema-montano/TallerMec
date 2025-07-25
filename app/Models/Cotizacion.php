<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

   protected $fillable = [
    'orden_id',
    'fecha',
    'total_servicio',
    'total',
    'aprobada',
];


    protected $casts = [
        'fecha' => 'date',
    ];

    public function orden()
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }

    public function repuestos()
    {
        return $this->belongsToMany(Repuesto::class, 'cotizaciones_repuestos')
                    ->withPivot('cantidad', 'precio_total');
    }
}
