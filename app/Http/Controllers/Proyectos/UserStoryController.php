<?php

namespace App\Http\Controllers\Proyectos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backlog;
use App\Models\Proyecto;
use App\Models\User_story;

class UserStoryController extends Controller
{
    public function index(Proyecto $proyecto, Backlog $backlog)
    {   
        //return $backlog->descripcion;
        return view('proyectos.user_stories.index', compact('proyecto', 'backlog'));
    } 

    public function create(Backlog $backlog)
    {
        //return $backlog;
        return view('proyectos.user_stories.create', compact('backlog'));
    }

    public function store(Request $request, Backlog $backlog)
    {
        //$validated = $request->validate(['Nombre' => ['required']]);
        //return $request->descripcion;
        $user_story=new User_story;
        $user_story->descripcion=$request->descripcion;
        $user_story->prioridad=$request->prioridad;
        $backlog->user_story()->save($user_story);
        return back();
        //return($proyecto);
        $user_story->save();
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

    public function edit(Backlog $backlog, User_story $user_story)
    {
        //$users=User::all();
        return view('proyectos.user_stories.edit', compact('backlog', 'user_story'));
    }

    public function update(Request $request, User_story $user_story)
    {
        //return $user_story;
        $data = User_story::find($user_story->id);
        //return $data;
        $data->descripcion=$request->descripcion;
        $data->prioridad=$request->prioridad;
        $data->save();

        return back();
    }

    public function destroy($id)
    {
        //return $id;
        $user_story = User_story::find($id)->delete();

        return back();
    }
}
