<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\actividad;
use App\Models\ActividadCaso;
use App\Models\ActividadConciliacion;
use App\Models\Casos;
use App\Models\Cliente;
use App\Models\Expedientes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function dashCalendar(){
        $clientes=Cliente::count();
        $expedientes=Expedientes::count();
        $casos=Casos::count();
        $usuarios=User::count();
        $agendas = Actividad::all();
        $events = array();
        $clientesF = Cliente::where('genero', 'Femenino')->count();
        $clientesM = Cliente::where('genero', 'Masculino')->count();

        $countExpedientes = Expedientes::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

        $labels1 = $countExpedientes->keys();
        $data = $countExpedientes->values();

        $countCaso = Casos::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');
        $labels = $countCaso->keys();
        $data2 = $countCaso->values();

        foreach($agendas as $actividads){
            $events[]=[
                'title'=>$actividads->titulo,
                'start'=>$actividads->fecha." ".$actividads->hora,
                'end'=>$actividads->fecha." ".$actividads->hora,
            ];
        }

        
        $con_actividades = ActividadConciliacion::all();
        foreach($con_actividades as $con_actividad){

            $events[]=[
                'title'=>$con_actividad->titulo." ".$con_actividad->expediente->n_expediente,
                'start'=>$con_actividad->fecha." ".$con_actividad->hora,
                'end'=>$con_actividad->fecha." ".$con_actividad->hora,
            ];
            
        }

        $cas_actividades = ActividadCaso::all();
        foreach($cas_actividades as $cas_actividad){
            $events[]=[
                'title'=>$cas_actividad->titulo." ".$cas_actividad->caso->n_caso,
                'start'=>$cas_actividad->fecha." ".$cas_actividad->hora,
                'end'=>$cas_actividad->fecha." ".$cas_actividad->hora,
            ];
        }
        return view('dashboard', ['events'=>$events], compact('labels','labels1','data','data2','clientes', 'expedientes','casos','usuarios','clientesF', 'clientesM'));
    }


}
