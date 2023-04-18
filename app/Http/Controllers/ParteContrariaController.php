<?php

namespace App\Http\Controllers;

use App\Models\ParteContraria;
use Illuminate\Http\Request;

class ParteContrariaController extends Controller
{

    public function index()
    {
        $parteContrarias = ParteContraria::search(request('search'))->paginate(5);
        return view('caso.parteContraria.index',compact('parteContrarias'));
    }


    public function create()
    {
        return view('caso.parteContraria.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'dni_ruc' => 'required', 
            'empresa' => 'nullable',
            'email' => 'nullable', 
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'referencia' => 'nullable',
        ]);
        ParteContraria::create($validated);
        return to_route('caso.parteContraria.index')->with('message', 'Parte contraria registrado correctamente.');
    }

    public function show($id)
    {
        //
    }


    public function edit(ParteContraria $parteContrarium)
    {
        return view('caso.parteContraria.edit', compact('parteContrarium'));
    }


    public function update(Request $request, ParteContraria $parteContrarium)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'dni_ruc' => 'required',
            'empresa' => 'nullable',
            'email' => 'nullable',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'referencia' => 'nullable'
        ]);
        $parteContrarium->update($validated);

        return to_route('caso.parteContraria.index')->with('message', 'Parte contraria actualisado correctamente.');
    }

    public function destroy(ParteContraria $parteContrarium)
    {
        try{
            $parteContrarium->delete();
            return to_route('caso.parteContraria.index')->with('messagedestroy', 'Parte contraria eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Esta parte contraria esta asignado a un expedientes.');
        }
    }
}
