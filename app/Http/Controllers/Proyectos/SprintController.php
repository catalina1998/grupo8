<?php

namespace App\Http\Controllers\Proyectos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backlog;
use App\Models\Proyecto;
use App\Models\Sprint;
use Carbon\Carbon;



class SprintController extends Controller
{
    public function index(Backlog $backlog, Proyecto $proyecto)
    {   
        //return $backlog->descripcion;
        return view('proyectos.sprints.index', compact('proyecto', 'backlog'));
    } 

    public function create(Backlog $backlog )
    {
        $date=Carbon::now();
        //return $date;
        //return $backlog;
        return view('proyectos.sprints.create', compact('backlog', 'date'));
    }

    public function store(Request $request, Backlog $backlog)
    {
        //$validated = $request->validate(['Nombre' => ['required']]);
        //return $request->descripcion;
        $sprint=new Sprint;
        $date=Carbon::now();
        //return $request->descripcion;
        $sprint->descripcion=$request->descripcion;
        $sprint->inicio=Carbon::parse($request->inicio);
        $sprint->fin=Carbon::parse($request->fin);
        //$fecha_valida= ($sprint->inicio)->gt($sprint->fin);
        //return $sprint->inicio->lt($date);
        if($sprint->inicio->gt($sprint->fin) || $sprint->inicio->lt($date))
        {
            return 'fecha introducida no es valida';
        }
        //return [$sprint->inicio, $sprint->fin];
        $backlog->sprint()->save($sprint);
        return back();
        //return($proyecto);
    }
}
