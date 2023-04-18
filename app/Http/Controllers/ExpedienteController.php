<?php

namespace App\Http\Controllers;

use App\Models\Expedientes;
use App\Models\Cliente;
use App\Models\Conciliador;
use App\Models\Expediente_has_conciliador;
use App\Models\expediente_has_invitado;
use App\Models\Expediente_has_submateria;
use App\Models\ExpedienteDocumento;
use App\Models\InvitadoConciliacion;
use App\Models\Submaterias;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{

    public function index()
    {
        $expedientes = Expedientes::search(request('search'))->paginate(5);
        $clientes = Cliente::all();
        $ex_submaterias = Expediente_has_submateria::all();
        return view('conciliacion.expediente.index', compact('expedientes','clientes','ex_submaterias'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        return view('conciliacion.expediente.create', compact('clientes'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'n_expediente' => 'required', 
            'fecha_inicio' => 'required',
            'fecha_final' => 'nullable',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'id_cliente' => 'required'
        ]);
        Expedientes::create($validated);
        return to_route('conciliacion.expediente.index')->with('message', 'Expediente registrado correctamente.');
    }


    public function show(Expedientes $expediente)
    {
        $submaterias = Submaterias::all();
        $invitados = InvitadoConciliacion::all();
        $conciliadores = Conciliador::all();
        $ex_invitados = expediente_has_invitado::all();
        $ex_submaterias = Expediente_has_submateria::all();
        $ex_conciliadores = Expediente_has_conciliador::all();
        $ex_documentos =ExpedienteDocumento::all();
        return view('conciliacion.expediente.expediente', compact('expediente','submaterias','invitados','conciliadores', 'ex_invitados', 'ex_submaterias','ex_documentos','ex_conciliadores'));
    }

    public function edit(Expedientes $expediente)
    {
        $clientes = Cliente::all();
        return view('conciliacion.expediente.edit', compact('expediente','clientes'));
    }

    public function update(Request $request, Expedientes $expediente)
    {
        $validated = $request->validate([
            'n_expediente' => 'required', 
            'fecha_inicio' => 'required',
            'fecha_final' => 'nullable',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'id_cliente' => 'nullable'
        ]);
        $expediente->update($validated);
        return to_route('conciliacion.expediente.index')->with('message', 'Expediente Actualisado correctamente.');
    }

    public function destroy(Expedientes $expediente)
    {
        try{
            $expediente->delete();
            return to_route('conciliacion.expediente.index')->with('messagedestroy', 'Expediente eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'No puede eliminar! Tiene asignado recursos.');
        }
    }

    public function assignSubmateria(Request $request, Expedientes $expediente)
    {
        $validated = $request->input();
        $validated['id_expediente'] = $expediente->id;
        Expediente_has_submateria::create($validated);
        return back()->with('message', 'Submateria asignado.');
    }

    public function removeSubmateria(Expediente_has_submateria $ex_submateria)
    {
        $ex_submateria->delete();
        return back()->with('messagedestroy', 'Submateria Removido.');

    }

    public function assignInvitado(Request $request, Expedientes $expediente)
    {
        $validated = $request->input();
        $validated['id_expediente'] = $expediente->id;
        expediente_has_invitado::create($validated);
        return back()->with('message', 'invitado asignado.');
    }

    public function removeInvitado(expediente_has_invitado $ex_invitado)
    {
        $ex_invitado->delete();
        return back()->with('messagedestroy', 'invitado Removido.');

    }

    public function assignConciliador(Request $request, Expedientes $expediente)
    {
        $validated = $request->input();
        $validated['id_expediente'] = $expediente->id;
        Expediente_has_conciliador::create($validated);
        return back()->with('message', 'Conciliador asignado.');
    }

    public function removeConciliador(Expediente_has_conciliador $ex_conciliador)
    {
        $ex_conciliador->delete();
        return back()->with('messagedestroy', 'Conciliador Removido.');

    }

    
}
