@extends('layouts.app')

@section('content')
<h1>Editar permiso</h1>
<form action="/permisos/main/edited" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$permiso->id}}">
    <h2>Nombre:</h2>
    <input type="text" name="name" value="{{$permiso->name}}"><br><br>
    <!-- <input type="text" name="password" value=""><br><br> -->
    <button type="submit">Actualizar </button>
</form>

@endsection