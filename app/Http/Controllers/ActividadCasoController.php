<?php

namespace App\Http\Controllers;

use App\Models\ActividadCaso;
use App\Models\Casos;
use Illuminate\Http\Request;

class ActividadCasoController extends Controller
{
    public function index()
    {
        $cas_actividades = ActividadCaso::search(request('search'))->paginate(5);
        $casos = Casos::all();
        return view('agenda.actividadCaso.index', compact('cas_actividades','casos'));
    }


    public function create()
    {
        $casos = Casos::all();
        return view('agenda.actividadCaso.create', compact('casos'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required', 
            'direccion' => 'nullable', 
            'descripcion' => 'nullable', 
            'fecha' => 'required', 
            'hora' => 'required',
            'id_caso' => 'required'
        ]);
        ActividadCaso::create($validated);
        return to_route('agenda.actividadCaso.index')->with('message', 'Actividad registrada correctamente.');
    }

    public function show($id)
    {
        //
    }


    public function edit(ActividadCaso $actividadCaso)
    {
        $casos = Casos::all();
        return view('agenda.actividadCaso.edit', compact('actividadCaso','casos'));
    }


    public function update(Request $request, ActividadCaso $actividadCaso)
    {
        
        $validated = $request->validate([
            'titulo' => 'required', 
            'direccion' => 'nullable', 
            'descripcion' => 'nullable', 
            'fecha' => 'required', 
            'hora' => 'required',
            'id_caso' => 'nullable'
        ]);
        $actividadCaso->update($validated);
        return to_route('agenda.actividadCaso.index')->with('message', 'Actividad actualizada correctamente.');
    }

    public function destroy( ActividadCaso $actividadCaso)
    {
        
        $actividadCaso->delete();
        return to_route('agenda.actividadCaso.index')->with('messagedestroy', 'Actividad eliminada correctamente.');
    }
}
