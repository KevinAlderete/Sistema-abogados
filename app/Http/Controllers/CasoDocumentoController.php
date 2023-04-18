<?php

namespace App\Http\Controllers;

use App\Models\CasoDocumento;
use App\Models\Casos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CasoDocumentoController extends Controller
{

    public function index()
    {
        $cas_documentos =CasoDocumento::all();
        return view('caso.caso.caso',compact('cas_documentos'));
    }

    public function create(Casos $caso)
    {
        return view('caso.caso.file.create', compact('caso'));
    }

    public function store(Request $request, Casos $caso)
    {
        $cas_documento = $request->validate([
            'tipo_documento' => 'required',
            'descripcion' => 'nullable',
            'documento' => ['required', 'mimes:pdf', 'max:15200']
        ]);
        if($request->hasFile("documento")){
            $file=$request->file("documento");
            //$fileName=Str::slug(time().'_'.$file->getClientOriginalName());
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("documentoCaso/"),$fileName);
            $cas_documento =new CasoDocumento([
                "tipo_documento" =>$request->tipo_documento,
                "descripcion" =>$request->descripcion,
                "documento" =>$fileName,
            ]);
            $cas_documento['id_caso'] = $caso->id;
            $cas_documento['uuid'] = (string) Str::orderedUuid();
            $cas_documento->save();
        }

        return to_route('caso.caso.index')->with('message', 'Documento registrado correctamente.');
    }


    public function show($id)
    {
        //
    }


    public function edit(CasoDocumento $cas_documento, $id)
    {
        $cas_documentos=CasoDocumento::findOrFail($id);
        return view('caso.caso.file.edit', compact('cas_documento', 'cas_documentos'));
    }


    public function update(Request $request, $id)
    {
        $cas_documentos=CasoDocumento::findOrFail($id);
        if($request->hasFile("documento")){
            if (File::exists("documentoCaso/".$cas_documentos->documento)) {
                File::delete("documentoCaso/".$cas_documentos->documento);
            }
            $file=$request->file("documento");
            $cas_documentos->documento=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/documentoCaso"),$cas_documentos->documento);
            $request['documento']=$cas_documentos->documento;
        }
   
        $cas_documentos->update([
             "tipo_documento" =>$request->tipo_documento,
             "descripcion" =>$request->descripcion,
             "documento" =>$cas_documentos->documento,
        ]);
   
         return to_route('caso.caso.index')->with('message', 'Documento Actualisado correctamente.');
    }

    public function destroy($id)
    {
        $cas_documentos=CasoDocumento::findOrFail($id);

        if (File::exists("documentoCaso/".$cas_documentos->documento)) {
             File::delete("documentoCaso/".$cas_documentos->documento);
        }
        $cas_documentos->delete();
        return back()->with('messagedestroy', 'Documento eliminado correctamente.');
    }

    public function download($uuid){
        $cas_documento = CasoDocumento::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path("documentoCaso/" . $cas_documento->documento);
        return response()->download($pathToFile);
    }

    public function view($uuid){
        $cas_documento = CasoDocumento::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path("documentoCaso/" . $cas_documento->documento);
        return response()->file($pathToFile);
    }
}
