<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $proyectos = Proyecto::paginate();

        return view('welcome', compact('proyectos'));
            
    }
}
