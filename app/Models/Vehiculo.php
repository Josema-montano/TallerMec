<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Vehiculo extends Model {
     use HasFactory;
    protected $fillable = ['cliente_id','patente','marca','modelo','anio'];

    public function cliente(): BelongsTo { return $this->belongsTo(Cliente::class); }
    public function ordenesTrabajo(): HasMany { return $this->hasMany(OrdenTrabajo::class); }
}