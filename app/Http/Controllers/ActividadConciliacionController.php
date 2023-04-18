<?php

namespace App\Http\Controllers;


use App\Models\ActividadConciliacion;
use App\Models\Expedientes;
use Illuminate\Http\Request;

class ActividadConciliacionController extends Controller
{

    public function index()
    {
        $con_actividades = ActividadConciliacion::search(request('search'))->paginate(5);
        $expedientes = Expedientes::all();
        return view('agenda.actividadConciliacion.index', compact('con_actividades','expedientes'));
    }


    public function create()
    {
        $expedientes = Expedientes::all();
        return view('agenda.actividadConciliacion.create', compact('expedientes'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required', 
            'direccion' => 'nullable', 
            'descripcion' => 'nullable', 
            'fecha' => 'required', 
            'hora' => 'required',
            'id_expediente' => 'required'
        ]);
        ActividadConciliacion::create($validated);
        return to_route('agenda.actividadConciliacion.index')->with('message', 'Actividad registrada correctamente.');
    }

    public function show($id)
    {
        //
    }


    public function edit(ActividadConciliacion $actividadConciliacion)
    {
        $expedientes = Expedientes::all();
        return view('agenda.actividadConciliacion.edit', compact('actividadConciliacion','expedientes'));
    }


    public function update(Request $request, ActividadConciliacion $actividadConciliacion)
    {
        
        $validated = $request->validate([
            'titulo' => 'required', 
            'direccion' => 'nullable', 
            'descripcion' => 'nullable', 
            'fecha' => 'required', 
            'hora' => 'required',
            'id_expediente' => 'nullable'
        ]);
        $actividadConciliacion->update($validated);
        return to_route('agenda.actividadConciliacion.index')->with('message', 'Actividad actualizada correctamente.');
    }

    public function destroy( ActividadConciliacion $actividadConciliacion)
    {
        
        $actividadConciliacion->delete();
        return to_route('agenda.actividadConciliacion.index')->with('messagedestroy', 'Actividad eliminada correctamente.');
    }
}
