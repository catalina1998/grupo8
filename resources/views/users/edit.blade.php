@extends('layouts.app')

@section('content')
<h1>Editar usuario</h1>
<form action="/users/main/edited" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <h2>Nombre:</h2>
    <input type="text" name="name" value="{{$user->name}}"><br><br>
    <h2>Email:</h2>
    <input type="text" name="email" value="{{$user->email}}"><br><br>
    <!-- <input type="text" name="password" value=""><br><br> -->
    <button type="submit">Actualizar </button>
</form>

@endsection