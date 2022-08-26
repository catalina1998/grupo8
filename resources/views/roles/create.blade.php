@extends('layouts.app')

@section('content')
<div class="wrapper crear-rol">
  <h1>Crear rol</h1>
  <form action="/roles/main" method="POST">
    @csrf
    <label for="name">Nombre del rol:  </label>
    <input type="text" name="name" id="name" required>
    <input type="submit" value="Crear rol">
  </form>
</div>
@endsection