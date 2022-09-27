<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{route('admin.roles.index')}}" class="px-4 py-2  hover:bg-gray-300 rounded-md">Volver</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.roles.store')}}">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                              Nombre: 
                            </label>
                            <br>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text">
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        
                        <br>

                          <div class="md:w-1/3">
                            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded" type="submit">
                              Crear
                            </button>
                          </div>
                          <div class="md:w-2/3"></div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
