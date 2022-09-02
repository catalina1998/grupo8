@extends('layouts.app')

@section('content')

<form action="/roles/main/edited" method="POST">
    @csrf
    <h1>Nombre:</h1>
    <input type="hidden" name="id" value="{{$rol->id}}">
    <input type="text" name="rol" value="{{$rol->name}}"><br><br>
    <button type="submit">Actualizar </button>
</form><br>


    <div>
        <div class="mt-6 p-2 bg-slate-100">
            <h2 class="text-2xl font-semibold">Role Permissions</h2>
            <div class="flex space-x-2 mt-4 p-2">
                @if ($rol->permissions)
                    @foreach ($rol->permissions as $rol_permission)
                        <form  action="/roles/main/permissionsR" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="idRole" value="{{$rol->id}}">
                            <input type="hidden" name="permission" value="{{$rol_permission->name}}">
                            <button type="submit">{{ $rol_permission->name }}</button>
                        </form>
                    @endforeach
                @endif <br>
            </div>

                <form  action="/roles/main/permissions" method="POST">
                    @csrf
                    <input type="hidden" name="idRole" value="{{$rol->id}}">
                    <div class="sm:col-span-6">
                        <label for="permission"
                            class="block text-sm font-medium text-gray-700">Permission</label>
                        <select id="permission" name="permission" autocomplete="permission-name"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($permissions as $permission)
                                <option id="permission"value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                <button type="submit">Asignar</button>
            </form>
        </div>
    </div>

@endsection