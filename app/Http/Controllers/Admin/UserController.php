<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.role', compact('user', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $value=0;

        foreach ($user->roles as $user_role){
            $value=$value+1;
        }

        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }
        if ($value>0){
            return back()->with('message', 'Solo 1 rol por usuario');
        }
        
        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back();
    }

    public function update(Request $req, User $user){
        //return $user;
        $data=User::find($user->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->password=Hash::make($req->password);
        $data->save();
        return back();
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        return back();
    }
}
