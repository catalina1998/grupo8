<x-proyectos-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{route('proyectos.admin.index')}}" class="px-4 py-2 bg-gray-300 hover:bg-gray-500 rounded-md">Volver</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('proyectos.admin.update', $proyecto->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mt-6 p-2 bg-slate-100">
                          <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                              Nombre: 
                            </label>
                            
                            <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Nombre" name="Nombre" type="text" value="{{$proyecto->Nombre}}">
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Estado: 
                              </label>
                              
                              <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Estado" name="Estado" type="text" value="{{$proyecto->Estado}}">
                              @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="md:w-1/3">
                            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit">
                              Editar
                            </button>
                          </div>
                        </div>
                        
                        <br>


                          <div class="md:w-2/3"></div>
                        
                      </form>
                      <div class="mt-6 p-2 bg-slate-100">
                        <h2 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Usuarios (click para remover)</h2>
                         <div  class="flex space-x-2 mt-4 p-2">
                            @if ($proyecto->users)
                                @foreach ($proyecto->users as $proyecto_user)
                                    <form class="px-4 py-2 bg-red-700 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('proyectos.admin.users.remove', [$proyecto->id, $proyecto_user->id]) }}"
                                    onsubmit="return confirm('Seguro que desea remover al usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $proyecto_user->name }}</button>
                                    </form>

                                @endforeach
                            @endif
                        </div> 
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="{{ route('proyectos.admin.users', $proyecto->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="permission"
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Agregar usuario</label>
                                    <select id="user" name="user" autocomplete="user-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                        </div>
                                <div class="sm:col-span-6 pt-5">
                                    <button type="submit"
                                    class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded">Asignar</button>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</x-proyectos-layout>
