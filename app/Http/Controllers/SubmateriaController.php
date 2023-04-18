<?php

namespace App\Http\Controllers;

use App\Models\Submaterias;
use Illuminate\Http\Request;

class SubmateriaController extends Controller
{
 
    public function index()
    {
        $submaterias = Submaterias::search(request('search'))->paginate(5);
        return view('conciliacion.submaterias.index', compact('submaterias'));
    }


    public function create()
    {
        return view('conciliacion.submaterias.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'materia' => 'required'
        ]);
        Submaterias::create($validated);
        return to_route('conciliacion.submaterias.index')->with('message', 'Sub-Materia registrada correctamente.');
    }


    public function show($id)
    {
        //
    }

    public function edit(Submaterias $submateria)
    {
        return view('conciliacion.submaterias.edit', compact('submateria'));
    }


    public function update(Request $request, Submaterias $submateria)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'materia' => 'required'
        ]);
        $submateria->update($validated);

        return to_route('conciliacion.submaterias.index')->with('message', 'Sub-Materia actualisada correctamente.');
    }

    public function destroy(Submaterias $submateria)
    {
        try{
            $submateria->delete();
            return to_route('conciliacion.submaterias.index')->with('messagedestroy', 'Sub-Materia eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Esta submateria esta asignado a un expedientes.');
        }
    }
}
