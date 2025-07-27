<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden_id',
        'cliente_id',
        'comentario',
        'calificacion',
        'fecha_comentario'
    ];

    protected $casts = [
        'fecha_comentario' => 'datetime',
    ];

    public function orden(): BelongsTo
    {
        return $this->belongsTo(OrdenTrabajo::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}