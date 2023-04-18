<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    
    public function index()
    {
        $actividades = Actividad::search(request('search'))->paginate(5);
        return view('agenda.actividad.index', compact('actividades'));
    }

 
    public function create()
    {
        return view('agenda.actividad.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required', 
            'direccion' => 'nullable', 
            'descripcion' => 'nullable', 
            'fecha' => 'required', 
            'hora' => 'required'
        ]);
        Actividad::create($validated);
        return to_route('agenda.actividad.index')->with('message', 'Actividad registrada correctamente.');
    }


    public function show($id)
    {
        //
    }

    public function edit(Actividad $actividad)
    {
        return view('agenda.actividad.edit', compact('actividad'));
    }


    public function update(Request $request, Actividad $actividad)
    {
        $validated = $request->validate([
            'titulo' => 'required', 
            'direccion' => 'nullable', 
            'descripcion' => 'nullable', 
            'fecha' => 'required', 
            'hora' => 'required'
        ]);
        $actividad->update($validated);
        return to_route('agenda.actividad.index')->with('message', 'Actividad actualizada correctamente.');
    }


    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return to_route('agenda.actividad.index')->with('messagedestroy', 'Actividad eliminada correctamente.');
    }
}
