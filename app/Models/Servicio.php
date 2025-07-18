<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Servicio extends Model {
     use HasFactory;
    protected $fillable = ['nombre','precio_hora'];

    public function ordenesPivot(): HasMany { return $this->hasMany(OrdenServicio::class); }
}