@extends('layouts.app')

@section('content')
<center>
<h1>Crear permiso</h1>
<div class="wrapper crear-permiso">
  
  <form action="/permisos/main" method="POST" >
    @csrf
    <br>
    <input type="text" name="name" id="name"  style="text-align: center" placeholder="Nombre del permiso" required><br><br>
    <input type="submit" value="Crear permiso">
  </form>
</div>
</center>
@endsection