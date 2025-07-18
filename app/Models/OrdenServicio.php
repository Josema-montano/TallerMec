<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrdenServicio extends Pivot {
     use HasFactory;
    protected $table = 'ordenes_servicios';
    public $incrementing = false;
    protected $fillable = ['orden_id','servicio_id','horas_trabajadas','precio_total'];
}