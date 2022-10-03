<?php

namespace App\Http\Controllers\Proyectos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backlog;
use App\Models\Proyecto;

class BacklogController extends Controller
{
    public function index(Proyecto $proyecto)
    {   
        $backlog = $proyecto->backlog;
        //return $backlog->descripcion;
        return view('proyectos.backlog.index', compact('backlog', 'proyecto'));
    } 
}
