@extends('layouts.app')

@section('content')
<div class="rol-details">
    <h1>{{ $rol->rol }}</h1>
    <form action="/roles/{{ $rol->id }}" method="POST">  
        @csrf
        @method('DELETE')

        <button>Eliminar rol</button>
        <br>
    </form>
    <br>
    <a href="/roles/main/edit/{{$rol->id}}"> Editar</a>

</div>
<br>
<a href="/roles/main" class="back"><- Volver</a>
@endsection