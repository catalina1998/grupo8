<x-proyectos-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    
                    <a href="{{route('proyectos.dev.index')}}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Volver</a>
                </div>

                
                
            </div>
            <h1>{{$backlog->descripcion}}</h1> <br><br>

            <a href="{{route('proyectos.backlog.sprints', [$backlog->id, $proyecto->id])}}" class="px-4 py-2 bg-teal-400 hover:bg-teal-500 rounded-md">Sprints</a>
        </div>
    </div>
</x-proyectos-layout>