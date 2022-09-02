@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
           Permisos
        </div>
        <table class="table table-dark table-responsive" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>


      {{-- <th scope="col">Editar</th> --}}

    </tr>
  </thead>
  <tbody>
    @foreach($permisos as $permiso)
    <tr>

      <td><h4>{{ $permiso->id}}</td>
      <td>{{$permiso->name}}</td>
      <td><a href="/permisos/main/edit/{{$permiso->id}}"> Editar</a> 
        <form action="/permisos/{{$permiso->id}}" method="POST">  
        @csrf
        @method('DELETE')
        <button>Eliminar</button>
        <br>
    </form></td>
    </form></td>
    </tr>
    @endforeach
    </tr>
  </tbody>
</table>
<a href="/permisos/main/create">Crear permiso</a>
    </div>

</div>

@endsection

