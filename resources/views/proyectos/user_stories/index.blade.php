<x-proyectos-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    
                    <a href="{{route('proyectos.dev.index')}}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Volver</a>
                </div><br>
                <h1>{{$sprint->descripcion}}</h1>
                <div class="flex justify-end">
                    <a href="{{route('proyectos.backlog.userstories.create', $sprint->id) }}" class="px-4 py-2 bg-teal-400 hover:bg-teal-500 rounded-md">Crear User Story</a>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">User Story</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Prioridad</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Usuario</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900">Estado</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900">Acciones</th>

                                            {{-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-semibold text-gray-900">
                                                <span >Acciones</span>
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($sprint->user_story as $user_story)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4  text-sm font-semibold text-gray-900 sm:pl-6">{{$user_story->id}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><textarea rows="3" cols="65">{{$user_story->descripcion}}</textarea></td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user_story->prioridad}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user_story->user_id}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$user_story->estado}}</td>
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
                                                            <a href="{{route('proyectos.backlog.userstories.edit', [$sprint->id, $user_story->id])}}" class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                Editar
                                                            </a>
                                                        </div>
                                                        <div class="" role="none">
                                                            <form class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0" method="POST" action="{{route('proyectos.backlog.userstories.delete', $user_story->id)}}" onsubmit="return confirm('Desea eliminar el rol?');">
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
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Copyright (c) 2011  Rally Software Development Corp.  All rights reserved -->
<head>
    <title>Kanban Board</title>
    <meta name="Name" content="App: Kanban Board"/>
    <meta name="Version" content="2013.04.09"/>
    <meta name="Vendor" content="Rally Software"/>
    <script type="text/javascript" src="/apps/1.32/sdk.js?apiVersion=1.41"></script>
    <script type="text/javascript">
        //this function will help us by getting our default project and workspace to help with external kanban development.
        var WORKSPACE_OID,PROJECT_OID,PROJECT_SCOPE_UP,PROJECT_SCOPE_DOWN;
        function projectParser(response) {
            var meta = response.QueryResult.Meta;
            var numberYankingRegex = /[^\d]/g;
            WORKSPACE_OID = meta.workspace.replace(numberYankingRegex, '');
            PROJECT_OID = meta.project.replace(numberYankingRegex, '');
        }
    </script>

    <script type="text/javascript">
        /*configure following if you plan to run the Kanban app externally
         rally.sdk.info.server = "https://community.rallydev.com/slm";*/
        // var WORKSPACE_OID = "1234";
        // var PROJECT_OID = "54678";
        // var PROJECT_SCOPE_UP = false;
        // var PROJECT_SCOPE_DOWN = true;
        /********************************/

        var projectOid = '__PROJECT_OID__';
        projectOid = projectOid.indexOf("__") !== -1 ? PROJECT_OID : projectOid;
        var workspaceOid = '__WORKSPACE_OID__';
        workspaceOid = workspaceOid.indexOf("__") !== -1 ? WORKSPACE_OID : workspaceOid;
        var projectScopeUp = '__PROJECT_SCOPING_UP__';
        projectScopeUp = projectScopeUp.indexOf("__") !== -1 ? PROJECT_SCOPE_UP : projectScopeUp;
        var projectScopeDown = '__PROJECT_SCOPING_DOWN__';
        projectScopeDown = projectScopeDown.indexOf("__") !== -1 ? PROJECT_SCOPE_DOWN : projectScopeDown;

        function onLoad() {
            var rallyDataSource = new rally.sdk.data.RallyDataSource(workspaceOid,
                    projectOid, projectScopeUp, projectScopeDown);

            rallyDataSource.projectOid = projectOid;
            rallyDataSource.workspaceOid = workspaceOid;
            rallyDataSource.projectScopeUp = projectScopeUp;
            rallyDataSource.projectScopeDown = projectScopeDown;

            var kanbanBoard;
            rallyDataSource.find({
                     key: 'WorkspaceConfiguration',
                     type: 'WorkspaceConfiguration',
                     fetch: 'DragDropRankingEnabled'
                 }, function(results) {
                     var isManualRankWorkspace = !results.WorkspaceConfiguration[0].DragDropRankingEnabled;
                     kanbanBoard = new KanbanBoard(rallyDataSource, isManualRankWorkspace);
                     kanbanBoard.display(dojo.body());
                 }
            );
        }
        rally.addOnLoad(onLoad);
    </script>

</head>
<body>
<div style="display:none">
    <div id="configPanel">
        <div id="configHelp"></div>
        <div id="stateDropdown"></div>
        <table id="configTable" cellspacing="15">
            <tbody id="configTableBody">
            <tr class="tableHeaderRow">
                <td>Column</td>
                <td>Display</td>
                <td>WIP Limit</td>
                <td>Schedule State Mapping</td>
            </tr>
            </tbody>
        </table>
        <div id="hideCardsCheckBox"></div>
        <div id="showTasksCheckBox"></div>
        <div id="showDefectsCheckBox"></div>
        <div>
            <span id="showAgeCheckBox"></span>
            <span id="showAgeTextBox"></span>
        </div>
        <div id="colorByArtifactTypeCheckBox"></div>
        <div id="msgContainer"></div>
    </div>
</div>
</body>
</x-proyectos-layout>

