<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repuesto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio_unitario', 'stock_actual'];

    public function cotizaciones(): BelongsToMany
    {
        return $this->belongsToMany(Cotizacion::class, 'cotizaciones_repuestos')
                    ->withPivot('cantidad', 'precio_total');
    }
}