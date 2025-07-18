<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Notificacion extends Model {
     use HasFactory;
    protected $table = 'notificaciones'; 
    protected $fillable = ['orden_id','tipo','fecha_envio','enviada'];

    public function orden(): BelongsTo { return $this->belongsTo(OrdenTrabajo::class); }
}