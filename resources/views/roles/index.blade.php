@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
           Roles
            <img src="/img/roles.png" alt="roles foto">
        </div>
        <p class="mssg">{{ session('mssg')}}</p>
        @foreach($roles as $rol)
        <div>
           <h4><a href="/roles/{{ $rol->id }}">{{ $rol->rol}}</a></h4>
        </div>
        @endforeach
        <a href="/roles/main/create">Crear rol</a>
    </div>
</div>
@endsection