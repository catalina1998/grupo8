<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{route('admin.users.index')}}" class="px-4 py-2  hover:bg-gray-300 rounded-md">Volver</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('admin.users.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mt-6 p-2 bg-slate-100">
                          <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                              Nombre: 
                            </label>
                            
                            <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text" value="{{$user->name}}">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Email: 
                              </label>
                              
                              <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="email" value="{{$user->email}}">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Contrasenha: 
                              </label>
                              
                              <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" name="password" type="password" value="{{$user->password}}">
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                          <div class="md:w-1/3">
                            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit">
                              Editar
                            </button>
                          </div>
                        </div>
                    </form>
                    <div class="mt-6 p-2 bg-slate-100">
                        <h2 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Rol (click para remover)</h2>
                        <div  class="flex space-x-2 mt-4 p-2">
                    @if ($user->roles)


                    @foreach ($user->roles as $user_role)
                    
                        <form class="px-4 py-2 bg-red-700 hover:bg-red-700 text-white rounded-md" method="POST"
                            action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ $user_role->name }}</button>
                        </form>
                    @endforeach
                @endif

                       
                        </div>
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="role" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Asignar rol</label>
                                    <select id="role" name="role" autocomplete="role-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Asignar</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
