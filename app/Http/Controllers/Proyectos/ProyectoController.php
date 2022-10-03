<?php

namespace App\Http\Controllers\Proyectos;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backlog;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        return view('proyectos.proyecto.index', compact('proyectos'));
    }
    public function indexdev()
    {
        $user = auth()->user();
        return view('proyectos.proyecto.indexdev', compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('proyectos.proyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validated = $request->validate(['Nombre' => ['required']]);
        //return $request->Nombre;
        $proyecto=new Proyecto;
        $proyecto->Nombre=$request->Nombre;
        //return($proyecto);
        $proyecto->save();
        $backlog= new Backlog;
        $backlog->descripcion=$request->Nombre.' Backlog';
        $proyecto->backlog()->save($backlog);
        //return $backlog->descripcion;
        //$proyecto->backlog()->
        //return $proyecto;
        // Proyecto::create($validated);
        // return($validated);
        return redirect()->route('proyectos.admin.index')
            ->with('success', 'Proyecto created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $users=User::all();
        return view('proyectos.proyecto.edit', compact('proyecto', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //return $request;
        $data = Proyecto::find($proyecto->id);
        $data->Nombre=$request->Nombre;
        $data->Estado=$request->Estado;
        $data->save();

         return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return back();
    }


    public function assignUser(Request $request, Proyecto $proyecto)
    {
        //return $request->user;
        foreach ($proyecto->users as $proyecto_user){
            if($request->user==$proyecto_user->id){
                return back();
            }
        }
        $proyecto->users()->attach($request->user);
        return back();
    }

    public function removeUser(Proyecto $proyecto, User $user)
    {
        //return $proyecto;
        $proyecto->users()->detach($user->id);
        return back();
    }
}
