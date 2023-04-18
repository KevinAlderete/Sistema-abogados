<x-admin-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
            
            <!-- component -->
            <div class="flex flex-col sm:flex-row justify-between px-5 pt-5">
                <div class="py-2">
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50" href="javascript:;">Agenda</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Reunión conciliación</li>
                    </ol>
                </div>
                <a href="{{ route('agenda.actividadConciliacion.create') }}" class="text-white px-5 py-2 font-bold justify-center border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                    <span >Añadir actividad</span>
                </a>
            </div>

            <div class="mx-5 flex justify-center">
                <div class="w-full border border-slate-400 mt-3"></div>
            </div>

            <div class='mx-5 my-3 border border-gray-300 rounded'>
                
                <form method="GET">
                    <div class="shadow flex">
                        <input class="w-full rounded p-2 border-none" name="search" value="{{ request()->get('search') }}" type="text" placeholder="Buscar...">
                        <button type="submit" class="w-auto flex justify-end items-center text-blue p-2 hover:text-blue-700 hover:font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            width="16" height="16" fill="currentColor" 
                            class="bi bi-search" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
                        </button>
                    </div>
            </form>
            </div>
            

            <div class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actividad</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fecha</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Hora</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900 hidden sm:block text-center">Acciones</th>
                    </tr>
                </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($con_actividades as $con_actividad)
                            <tr class="hover:bg-gray-50">
                                <th class="px-6 py-4 font-normal text-gray-900">
                                    
                                    <div class="text-sm grid content-center">
                                        <div class="font-medium text-gray-700">
                                            {{ $con_actividad->titulo }}   
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $con_actividad->fecha }} 
                                </td>
                                <td class="px-6 py-4 hidden sm:block">
                                    {{ $con_actividad->hora }}    
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-4">
                                        <a href="{{ route('agenda.actividadConciliacion.edit', $con_actividad->id) }}" class="hover:text-blue-500 text-gray-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>

                                        
                                        
                                        
                                        <form class="hover:text-red-500 text-gray-600 hover:scale-110 boton-eliminar" method="POST" action="{{ route('agenda.actividadConciliacion.destroy', $con_actividad->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="h-6 w-6"
                                                    x-tooltip="tooltip"
                                                    >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                    />
                                                </svg>
                                            </button>
                                        </form>
                                        
                                        
                                    </div>
                                </td>
                            </tr>    
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div class="m-5 px-5 py-2 overflow-hidden rounded-lg border bg-white border-gray-200 shadow-md">
                {{ $con_actividades->links() }}
            </div> 
        </div>
    </div>
    
    
</x-admin-layout>
