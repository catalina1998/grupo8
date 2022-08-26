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
        $pizza = Rol::findOrFail($id);
        $pizza->delete();
        return redirect('/roles/main')->with('mssg', 'Rol eliminado');
    }
}
