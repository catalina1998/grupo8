@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
           Users
        </div>
        <table class="table table-dark table-responsive" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>

      <td><h4>{{ $user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>user role</td>
      <td><a href="/users/main/edit/{{$user->id}}"> Editar</a></td>
      <td><form action="/users/{{$user->id}}" method="POST">  
        @csrf
        @method('DELETE')
        <button>Eliminar usuario</button>
        <br>
    </form></td>
    </tr>
    @endforeach
    </tr>
  </tbody>
</table>
    </div>
</div>

@endsection

