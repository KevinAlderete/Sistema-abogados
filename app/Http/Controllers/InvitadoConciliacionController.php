<?php

namespace App\Http\Controllers;

use App\Models\Expedientes;
use App\Models\InvitadoConciliacion;
use Illuminate\Http\Request;

class InvitadoConciliacionController extends Controller
{
    public function index()
    {
        $con_invitados = InvitadoConciliacion::search(request('search'))->paginate(5);
        return view('conciliacion.invitado.index',compact('con_invitados'));
    }

   
    public function create()
    {
        return view('conciliacion.invitado.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'dni_ruc' => 'nullable', 
            'empresa' => 'nullable',
            'email' => 'nullable', 
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'referencia' => 'nullable',
        ]);
        InvitadoConciliacion::create($validated);
        return to_route('conciliacion.invitado.index')->with('message', 'Invitado registrado correctamente.');
    }

    public function show($id)
    {
        //
    }


    public function edit(InvitadoConciliacion $invitado)
    {
        return view('conciliacion.invitado.edit', compact('invitado'));
    }


    public function update(Request $request, InvitadoConciliacion $invitado)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'dni_ruc' => 'nullable',
            'empresa' => 'nullable',
            'email' => 'nullable',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'referencia' => 'nullable'
        ]);
        $invitado->update($validated);

        return to_route('conciliacion.invitado.index')->with('message', 'Invitado actualisado correctamente.');
    }


    public function destroy(InvitadoConciliacion $invitado)
    {
        try{
            $invitado->delete();
            return to_route('conciliacion.invitado.index')->with('messagedestroy', 'Invitado eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este invitado esta asignado a un expedientes.');
        }
    }
}
