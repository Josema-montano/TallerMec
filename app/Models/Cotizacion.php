<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cotizacion extends Model {
     use HasFactory;
     protected $table = 'cotizaciones';
    protected $fillable = ['orden_id','fecha','total_estimado','aprobada'];

    public function orden(): BelongsTo { return $this->belongsTo(OrdenTrabajo::class); }
    public function repuestos(): BelongsToMany {
        return $this->belongsToMany(Repuesto::class,'cotizaciones_repuestos')
                    ->withPivot('cantidad','precio_total');
    }
}