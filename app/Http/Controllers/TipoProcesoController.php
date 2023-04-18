<?php

namespace App\Http\Controllers;

use App\Models\TipoProceso;
use Illuminate\Http\Request;

class TipoProcesoController extends Controller
{

    public function index()
    {
        $procesos = TipoProceso::all();
        return view('caso.tipoProceso.index', compact('procesos'));
    }


    public function create()
    {
        return view('caso.tipoProceso.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required'
        ]);
        TipoProceso::create($validated);
        return to_route('caso.tipoProceso.index')->with('message', 'Proceso registrada correctamente.');
    }

    public function show($id)
    {
        //
    }

    public function edit(TipoProceso $tipoProceso)
    {
        return view('caso.tipoProceso.edit', compact('tipoProceso'));
    }

    public function update(Request $request, TipoProceso $tipoProceso)
    {
        $validated = $request->validate([
            'nombre' => 'required'
        ]);
        $tipoProceso->update($validated);

        return to_route('caso.tipoProceso.index')->with('message', 'Proceso actualisada correctamente.');
    }

    public function destroy(TipoProceso $tipoProceso)
    {
        try{
            $tipoProceso->delete();
            return to_route('caso.tipoProceso.index')->with('messagedestroy', 'Proceso eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este proceso esta asignado a un expedientes.');
        }
    }
}
