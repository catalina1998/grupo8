<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $users = User::all();
        return view('users.index',
        ['users'=>$users,]);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users/main');
    }

    public function edit($id){
        $user= User::find($id);
        return view('users.edit', ['user'=>$user]);
    }

    public function update(Request $req){
        //return $req->input();
        $data=User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        //$data->password=$req->password;
        $data->save();
        return redirect('/users/main');
    }
}
