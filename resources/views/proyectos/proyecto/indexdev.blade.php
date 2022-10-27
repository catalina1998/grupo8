{{-- Index para tus proyectos --}}
<x-proyectos-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="flex justify-end">
                    <a href="{{route('proyectos.admin.create')}}" class="px-4 py-2 bg-teal-400 hover:bg-teal-500 rounded-md">Nuevo</a>
                </div> --}}
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Nombre</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Estado</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Miembros</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900"></th>
                                            {{-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-semibold text-gray-900">
                                                <span >Acciones</span>
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($user->proyectos as $proyecto)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">{{$proyecto->id}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$proyecto->Nombre}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$proyecto->Estado}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @foreach ($proyecto->users as $proyecto_user)
                                                    <li>{{$proyecto_user->name}}</li>
                                                @endforeach  
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <a href="{{route('proyectos.backlog.sprints', [$proyecto->backlog, $proyecto->id])}}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md">Backlog</a>
                                            </td>
                                            {{-- <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <div class="inline-block text-left" x-data="{ menu: false }">
                                                    <button x-on:click="menu = ! menu" type="button" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                        <span class="sr-only"></span>
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                        </svg>
                                                    </button>
                                                    <div x-show="menu" x-on:click.away="menu = false" class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                        <div class="" role="none">
                                                            <a href="{{route('proyectos.admin.edit', $proyecto->id)}}" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                Editar
                                                            </a>
                                                        </div>
                                                        <div class="" role="none">
                                                            <form class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0" method="POST" action="{{route('proyectos.admin.destroy', $proyecto->id)}}" onsubmit="return confirm('Desea eliminar el rol?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">Eliminar</button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> --}}
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
