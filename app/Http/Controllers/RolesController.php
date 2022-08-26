<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        $roles = Rol::all();
        return view('roles.index',
        ['roles'=>$roles,]);
    }

    public function show($id) {
        $rol = Rol::findOrFail($id);
        return view('roles.show', ['rol'=>$rol]);
    }

    public function create() {
        return view('roles.create');
    }

    public function store(){
        $rol=new Rol();
        $rol->rol = request('name');
        $rol->save();
        return redirect('/roles/main')->with('mssg', 'Rol creado');
    }

    public function destroy($id){
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return redirect('/roles/main')->with('mssg', 'Rol eliminado');
    }

    public function edit($id){
        $rol= Rol::find($id);
        return view('roles.edit', ['rol'=>$rol]);
    }
    
    public function update(Request $req){
        // return $req->input();
        $data=Rol::find($req->id);
        $data->rol=$req->rol;
        $data->save();
        return redirect('/roles/main')->with('mssg', 'Rol editado');
    }


}
