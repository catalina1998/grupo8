<x-proyectos-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    
                    <a href="{{route('proyectos.dev.index')}}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Volver</a>
                </div><br>

                <h1>{{$backlog->descripcion}}</h1>
                <div class="flex justify-end">
                    <a href="{{route('proyectos.backlog.sprints.create', $backlog->id) }}" class="px-4 py-2 bg-teal-400 hover:bg-teal-500 rounded-md">Nuevo Sprint</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Sprint</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Fecha de inicio</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Fecha de fin</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900">Acciones</th>
                                            {{-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-semibold text-gray-900">
                                                <span >Acciones</span>
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($backlog->sprint as $sprint)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4  text-sm font-semibold text-gray-900 sm:pl-6">{{$sprint->id}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><textarea rows="3" cols="65">{{$sprint->descripcion}}</textarea></td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$sprint->inicio}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$sprint->fin}}</td>
                                            <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <div class="inline-block text-left" x-data="{ menu: false }">
                                                    <button x-on:click="menu = ! menu" type="button" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                        <span class="sr-only"></span>
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                        </svg>
                                                    </button>
                                                    <div x-show="menu" x-on:click.away="menu = false" class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                        <div class="" role="none">
                                                            <a href="{{route('proyectos.backlog.sprints.edit', [$sprint->id, $backlog->id]) }}" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0" >
                                                                Editar
                                                            </a>
                                                        </div>
                                                        <div class="" role="none">
                                                            <a href="{{ route('proyectos.sprint.userstories', $sprint->id) }}" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                User Stories
                                                            </a>
                                                        </div>
                                                        <div class="" role="none">
                                                            <form class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0" method="POST" action="{{route('proyectos.backlog.sprints.delete', $sprint->id) }}" onsubmit="return confirm('Desea eliminar el sprint?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">Eliminar</button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>   
        </div>
    </div> 
</x-proyectos-layout>