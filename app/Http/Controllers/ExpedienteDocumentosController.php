<?php

namespace App\Http\Controllers;

use App\Models\ExpedienteDocumento;
use App\Models\Expedientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ExpedienteDocumentosController extends Controller
{
    
    public function index()
    {
        $ex_documentos =ExpedienteDocumento::all();
        return view('conciliacion.expediente.expediente',compact('ex_documentos'));
    }

    
    public function create(Expedientes $expediente)
    {
        return view('conciliacion.expediente.file.create', compact('expediente'));
    }

    
    public function store(Request $request, Expedientes $expediente)
    {
        $ex_documento = $request->validate([
            'tipo_documento' => 'required', 
            'tipo_acta' => 'nullable',
            'n_acta' => 'nullable',
            'folio' => 'nullable',
            'descripcion' => 'nullable',
            'documento' => ['required', 'mimes:pdf', 'max:15200']
        ]);
        if($request->hasFile("documento")){
            $file=$request->file("documento");
            //$fileName=Str::slug(time().'_'.$file->getClientOriginalName());
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("documento/"),$fileName);
            $ex_documento =new ExpedienteDocumento([
                "tipo_documento" =>$request->tipo_documento,
                "tipo_acta" =>$request->tipo_acta,
                "n_acta" =>$request->n_acta,
                "folio" =>$request->folio,
                "descripcion" =>$request->descripcion,
                "documento" =>$fileName,
            ]);
            $ex_documento['id_expediente'] = $expediente->id;
            $ex_documento['uuid'] = (string) Str::orderedUuid();
            $ex_documento->save();
        }

        return to_route('conciliacion.expediente.index')->with('message', 'Documento registrado correctamente.');
    
    }

    public function show($id)
    {
        //
    }

    public function edit(ExpedienteDocumento $ex_documento, $id)
    {
        $ex_documentos=ExpedienteDocumento::findOrFail($id);
        return view('conciliacion.expediente.file.edit', compact('ex_documento', 'ex_documentos'));
    }

    public function update(Request $request, $id)
    {
        $ex_documento=ExpedienteDocumento::findOrFail($id);
        if($request->hasFile("documento")){
            if (File::exists("documento/".$ex_documento->documento)) {
                File::delete("documento/".$ex_documento->documento);
            }
            $file=$request->file("documento");
            $ex_documento->documento=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/documento"),$ex_documento->documento);
            $request['documento']=$ex_documento->documento;
        }
   
        $ex_documento->update([
             "tipo_documento" =>$request->tipo_documento,
             "tipo_acta" =>$request->tipo_acta,
             "n_acta" =>$request->n_acta,
             "folio" =>$request->folio,
             "descripcion" =>$request->descripcion,
             "documento" =>$ex_documento->documento,
        ]);
   
         return to_route('conciliacion.expediente.index')->with('message', 'Documento Actualisado correctamente.');
    }

    public function destroy($id)
    {
        $ex_documentos=ExpedienteDocumento::findOrFail($id);

        if (File::exists("documento/".$ex_documentos->documento)) {
             File::delete("documento/".$ex_documentos->documento);
        }
        $ex_documentos->delete();
        return back()->with('messagedestroy', 'Documento eliminado correctamente.');
    }

    public function download($uuid){
        $ex_documento = ExpedienteDocumento::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path("documento/" . $ex_documento->documento);
        return response()->download($pathToFile);
    }

    public function view($uuid){
        $ex_documento = ExpedienteDocumento::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path("documento/" . $ex_documento->documento);
        return response()->file($pathToFile);
    }
}


