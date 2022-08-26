@extends('layouts.app')

@section('content')
<div class="rol-details">
    <h1>{{ $rol->rol }}</h1>
    <form action="/roles/{{ $rol->id }}" method="POST">  
        @csrf
        @method('DELETE')
        <button>Eliminar rol</button>
    </form>

</div>
<a href="/" class="back"><- Volver al inicio</a>
@endsection