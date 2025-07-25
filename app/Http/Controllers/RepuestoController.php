<?php

namespace App\Http\Controllers;
use App\Models\Repuesto;
use Illuminate\Http\Request;

class RepuestoController extends Controller {
    public function index() { return view('repuestos.index', ['repuestos'=>Repuesto::paginate(15)]); }
    public function create() { return view('repuestos.create'); }
    public function store(Request $r) {
        $r->validate(['nombre'=>'required','codigo'=>'required|unique:repuestos','stock_actual'=>'required|integer','precio_unitario'=>'required|numeric']);
        Repuesto::create($r->all());
        return back()->with('success','Repuesto creado');
    }
    public function edit(Repuesto $repuesto) { return view('    repuestos.edit',compact('repuesto')); }
    public function update(Request $r, Repuesto $repuesto) {
        $r->validate(['nombre'=>'required','codigo'=>'required|unique:repuestos,codigo,'.$repuesto->id,'stock_actual'=>'required|integer','precio_unitario'=>'required|numeric']);
        $repuesto->update($r->all());
        return back()->with('success','Actualizado');
    }
    public function destroy(Repuesto $repuesto) { $repuesto->delete(); return back()->with('success','Eliminado'); }
}

