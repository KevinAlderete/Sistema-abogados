<?php

namespace App\Http\Controllers;

use App\Models\Caso_has_PContraria;
use App\Models\caso_has_proceso;
use App\Models\Caso_has_proceso as ModelsCaso_has_proceso;
use App\Models\CasoDocumento;
use App\Models\Casos;
use App\Models\Cliente;
use App\Models\ParteContraria;
use App\Models\TipoProceso;
use Illuminate\Http\Request;

class CasosController extends Controller
{

    public function index()
    {
        $casos = Casos::search(request('search'))->paginate(5);
        $clientes = Cliente::all();
        return view('caso.caso.index', compact('casos','clientes'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        return view('caso.caso.create', compact('clientes'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'n_caso' => 'required', 
            'fecha_inicio' => 'required',
            'fecha_final' => 'nullable',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'id_cliente' => 'required'
        ]);
        Casos::create($validated);
        return to_route('caso.caso.index')->with('message', 'Caso registrado correctamente.');
    }


    public function show(Casos $caso)
    {
        $procesos = TipoProceso::all();
        $cas_procesos = Caso_has_proceso::all();
        $p_contrarias = ParteContraria::all();
        $cas_contrarias = Caso_has_PContraria::all();
        $cas_documentos = CasoDocumento::all();
        return view('caso.caso.caso', compact('caso','procesos','cas_procesos','p_contrarias','cas_contrarias','cas_documentos'));
    }


    public function edit(Casos $caso)
    {
        $clientes = Cliente::all();
        return view('caso.caso.edit', compact('caso','clientes'));
    }


    public function update(Request $request, Casos $caso)
    {
        $validated = $request->validate([
            'n_caso' => 'required', 
            'fecha_inicio' => 'required',
            'fecha_final' => 'nullable',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'id_cliente' => 'nullable'
        ]);
        $caso->update($validated);
        return to_route('caso.caso.index')->with('message', 'Caso Actualisado correctamente.');
    }

    public function destroy(Casos $caso)
    {
        try{
            $caso->delete();
            return to_route('caso.caso.index')->with('messagedestroy', 'Caso eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'No puede eliminar! Antes elimine sus conexiones.');
        }
    }

    public function assignProceso(Request $request, Casos $caso)
    {

        $validated = $request->input();
        $validated['id_caso'] = $caso->id;
        Caso_has_proceso::create($validated);
        return back()->with('message', 'Proceso asignado.');
    }

    public function removeProceso(Caso_has_proceso $cas_proceso)
    {
        $cas_proceso->delete();
        return back()->with('messagedestroy', 'Proceso Removido.');

    }

    public function assignPContraria(Request $request, Casos $caso)
    {
        $validated = $request->input();
        $validated['id_caso'] = $caso->id;
        Caso_has_PContraria::create($validated);
        return back()->with('message', 'Parte contraria asignada.');
    }

    public function removePContraria(Caso_has_PContraria $cas_contraria)
    {
        $cas_contraria->delete();
        return back()->with('messagedestroy', 'Parte contraria Removido.');

    }
}
