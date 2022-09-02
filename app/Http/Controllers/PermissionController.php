<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;





class PermissionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $permisos = Permission::all();
        return view('permisos.index',
        ['permisos'=>$permisos,]);
    }

    public function create() {
        return view('permisos.create');
    }

    public function store(){
        $name = request('name');
        $permiso = Permission::create(['name' => $name]);
        
        $permiso->save();
        return redirect('/permisos/main');
    }

    public function edit($id){
        $permiso= Permission::find($id);
        return view('permisos.edit', ['permiso'=>$permiso]);
    }

    public function update(Request $req){
        //return $req->input();
        $data=Permission::find($req->id);
        $data->name=$req->name;
        $data->save();
        return redirect('/permisos/main')->with('mssg', 'Permiso editado');
    }

    public function destroy($id){
        $permiso = Permission::findOrFail($id);
        $permiso->delete();
        return redirect('/permisos/main');
    }
}
