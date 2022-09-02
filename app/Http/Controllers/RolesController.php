<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
        $roles = Role::all();
        return view('roles.index',
        ['roles'=>$roles,]);
    }

    public function show($id) {
        $rol = Role::findOrFail($id);
        return view('roles.show', ['rol'=>$rol]);
    }

    public function create() {
        return view('roles.create');
    }

    public function store(){
        $name = request('name');
        $role = Role::create(['name' => $name]);
        
        $role->save();
        return redirect('/roles/main');
    }

    public function destroy($id){
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect('/roles/main')->with('mssg', 'Rol eliminado');
    }

    public function edit($id){
        $permissions = Permission::all();
        $rol= Role::find($id);
        return view('roles.edit', ['rol'=>$rol], ['permissions'=>$permissions]);
    }
    
    public function update(Request $req){
        // return $req->input();
        $data=Role::find($req->id);
        $data->name=$req->rol;
        $data->save();
        return redirect('/roles/main')->with('mssg', 'Rol editado');
    }

    public function givePermission(Request $request)
    {
        //return $request->input();
        $role=Role::find($request->idRole);
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Request $req)
    {
        // return $req->input();
        $role=Role::find($req->idRole);
        if($role->hasPermissionTo($req->permission)){
            $role->revokePermissionTo($req->permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }


}
