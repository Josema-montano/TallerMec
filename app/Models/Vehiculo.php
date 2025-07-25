<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'patente',
        'marca',
        'modelo',
        'anio',
        'vin',
        'color',
        'imagen',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function ordenesTrabajo(): HasMany
    {
        return $this->hasMany(OrdenTrabajo::class);
    }

    
    public function imagenUrl(): string
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : asset('images/default-vehiculo.png');
    }
}