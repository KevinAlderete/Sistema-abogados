<?php

namespace App\Http\Controllers;

use App\Models\Conciliador;
use Illuminate\Http\Request;

class ConciliadorController extends Controller
{

    public function index()
    {
        $conciliadores = Conciliador::search(request('search'))->paginate(5);
        return view('conciliacion.conciliador.index',compact('conciliadores'));
    }


    public function create()
    {
        return view('conciliacion.conciliador.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'dni' => 'nullable', 
        ]);
        Conciliador::create($validated);
        return to_route('conciliacion.conciliador.index')->with('message', 'Conciliador registrado correctamente.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Conciliador $conciliador)
    {
        return view('conciliacion.conciliador.edit', compact('conciliador'));
    }


    public function update(Request $request, Conciliador $conciliador)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'dni' => 'nullable',
        ]);
        $conciliador->update($validated);

        return to_route('conciliacion.conciliador.index')->with('message', 'Invitado actualisado correctamente.');
    }


    public function destroy(Conciliador $conciliador)
    {
        try{
            $conciliador->delete();
            return to_route('conciliacion.conciliador.index')->with('messagedestroy', 'Conciliador eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este conciliador esta asignado a un expedientes.');
        }
    }
}
