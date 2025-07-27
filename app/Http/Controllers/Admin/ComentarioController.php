<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::with(['cliente', 'orden.vehiculo'])->latest()->paginate(10);
        return view('admin.comentarios.index', compact('comentarios'));
    }

    // Puedes añadir métodos para ver, editar o eliminar comentarios si es necesario
}
