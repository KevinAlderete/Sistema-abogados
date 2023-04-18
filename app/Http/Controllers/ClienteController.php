<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Expedientes;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes = Cliente::search(request('search'))->paginate(5);
        return view('clientes.index', compact('clientes'));
    }

 
    public function create()
    {
        return view('clientes.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required', 
            'genero' => 'nullable', 
            'dni_ruc' => 'required', 
            'empresa' => 'nullable',
            'email' => 'nullable', 
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'referencia' => 'nullable',
            'estado_cliente' => 'required'
        ]);
        Cliente::create($validated);
        return to_route('clientes.index')->with('message', 'Cliente registrado correctamente.');
    }

    public function show(Cliente $cliente)
    {
        $expedientes = Expedientes::all();
        return view('clientes.cliente', compact('cliente','expedientes'));
    }


    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        
        $validated = $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required',
            'genero' => 'nullable',
            'dni_ruc' => 'required',
            'empresa' => 'nullable',
            'email' => 'nullable',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'referencia' => 'nullable',
            'estado_cliente'=> 'required'
        ]);
        $cliente->update($validated);

        return to_route('clientes.index')->with('message', 'Permiso actualisado correctamente.');
    }


    public function destroy(Cliente $cliente)
    {
        try{
            $cliente->delete();
            return to_route('clientes.index')->with('messagedestroy', 'Cliente eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este cliente esta asignado a un expedientes.');
        }
    }
}
