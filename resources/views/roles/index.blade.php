@extends('layouts.app')

@section('content')
{{-- <div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
           Roles
            
        </div>
        <p class="mssg">{{ session('mssg')}}</p>
        @foreach($roles as $rol)
        <div>
            <h4><a href="/roles/{{ $rol->id }}">{{ $rol->id}}</a></h4>
           <h4><a href="/roles/{{ $rol->id }}">{{ $rol->name}}</a></h4>
        </div>
        @endforeach
        <a href="/roles/main/create">Crear rol</a>
    </div>
</div> --}}
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
           Roles
           <img src="/img/roles.png" alt="roles foto">
        </div>
        <table class="table table-dark table-responsive" >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Permisos</th>
    </tr>
  </thead>
  <tbody>
    @foreach($roles as $role)
    <tr>

      <td><h4>{{ $role->id}}</td>
      <td><h4><a href="/roles/{{ $role->id }}">{{ $role->name}}</a></h4></td>
        <td>@foreach ($role->permissions as $rol_permission)
            {{$rol_permission->name}},
        @endforeach  
        </td>            

        <br>
        
    </form></td>
    </tr>
    @endforeach
    
    </tr>
  </tbody>

</table>
<a href="/roles/main/create">Crear rol</a>
    </div>
</div>
@endsection