<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\ActividadCaso;
use App\Models\ActividadConciliacion;
use Illuminate\Http\Request;

class calendarController extends Controller
{
    public function index()
    {
        $events = array();
        $agendas = Actividad::all();
        foreach($agendas as $actividads){
            $events[]=[
                'title'=>$actividads->titulo,
                'start'=>$actividads->fecha." ".$actividads->hora,
                'end'=>$actividads->fecha." ".$actividads->hora,
                "color"=>"rgb(239, 68, 68)",
                "textColor"=>"black"
            ];
        }

        $con_actividades = ActividadConciliacion::all();
        foreach($con_actividades as $con_actividad){
            $events[]=[
                'title'=>$con_actividad->titulo." del expediente ".$con_actividad->expediente->n_expediente,
                'start'=>$con_actividad->fecha." ".$con_actividad->hora,
                'end'=>$con_actividad->fecha." ".$con_actividad->hora,
                "color"=>"rgb(59, 130, 246)",
                "textColor"=>"black"
            ];
        }

        $cas_actividades = ActividadCaso::all();
        foreach($cas_actividades as $cas_actividad){
            $events[]=[
                'title'=>$cas_actividad->titulo." del expediente ".$cas_actividad->caso->n_caso,
                'start'=>$cas_actividad->fecha." ".$cas_actividad->hora,
                'end'=>$cas_actividad->fecha." ".$cas_actividad->hora,
                "color"=>"rgb(34, 197, 94)",
                "textColor"=>"black"
            ];
        }
        
        return view('agenda.calendar.index', ['events'=>$events]);
        
    }

    
}
