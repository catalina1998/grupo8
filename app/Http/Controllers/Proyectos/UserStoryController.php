<?php

namespace App\Http\Controllers\Proyectos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backlog;
use App\Models\Proyecto;
use App\Models\User_story;
use App\Models\Sprint;

class UserStoryController extends Controller
{
    public function index(Sprint $sprint)
    {   
        //return $sprint->backlog()->id;
        return view('proyectos.user_stories.index', compact('sprint'));
    } 

    public function create(Sprint $sprint)
    {
        //return $backlog;
        return view('proyectos.user_stories.create', compact('sprint'));
    }

    public function store(Request $request, Sprint $sprint)
    {
        //$validated = $request->validate(['Nombre' => ['required']]);
        //return $request->descripcion;
        $user_story=new User_story;
        $user_story->descripcion=$request->descripcion;
        $user_story->prioridad=$request->prioridad;
        $user_story->user_id=auth()->user()->id;
        $user_story->estado='TO DO';
        //return $sprint;
        //return auth()->user();
        $sprint->user_story()->save($user_story);
        //$user->user_story()->save($user_story);
        return back();
        //return($proyecto);
        $user_story->save();
    }

    public function edit(Sprint $sprint, User_story $user_story)
    {
        //$users=User::all();
        return view('proyectos.user_stories.edit', compact('sprint', 'user_story'));
    }

    public function update(Request $request, User_story $user_story)
    {
        //return $user_story;
        $data = User_story::find($user_story->id);
        //return $request;
        $data->descripcion=$request->descripcion;
        $data->prioridad=$request->prioridad;
        $data->estado=$request->estado;
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
