<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repuesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'precio_unitario',
        'stock_actual',
        'imagen', 
    ];

    
    public function imagenUrl(): string
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : asset('images/default-repuesto.png');
    }
}
