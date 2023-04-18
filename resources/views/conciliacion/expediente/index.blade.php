<x-admin-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
            
            <div class="flex flex-col sm:flex-row justify-between px-5 pt-5">
                <div class="py-2">
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50" href="javascript:;">Conciliación</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Expedientes</li>
                    </ol>
                </div>
                <a href="{{ route('conciliacion.expediente.create') }}" class="text-white justify-center px-5 font-bold py-2 overflow-hidden border border-blue-700 shadow-lg flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                    <span >Añadir expediente</span>
                </a>
            </div>

            <div class="mx-5 flex justify-center">
                <div class="w-full border border-slate-400 mt-3"></div>
            </div>

            <div class='mx-5 my-3'>
                
                <form method="GET">
                    <div class="shadow flex rounded-md border bg-white border-gray-300">
                        <input class="w-full rounded p-2 border-none" name="search" value="{{ request()->get('search') }}" type="text" placeholder="Buscar...">
                        <button type="submit" class="w-auto flex justify-end items-center text-blue p-2 hover:text-blue-700 hover:font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            width="16" height="16" fill="currentColor" 
                            class="bi bi-search" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- component -->
            <div class="overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md m-5 scroll-table-e">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-4 font-bold text-gray-900">N° Expediente</th>
                    <th scope="col" class="px-6 py-4 font-bold text-gray-900">Cliente</th>
                    <th scope="col" class="px-6 py-4 font-bold text-gray-900  hidden sm:flex">Estado</th>
                    <th scope="col" class="px-6 py-4 font-bold text-gray-900 text-center">Acciones</th>
                    </tr>
                </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($expedientes as $expediente)
                            <tr class="hover:bg-gray-50">
                                <th class="px-6 py-4 font-normal text-gray-900">
                                    
                                    <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{ $expediente->n_expediente }}</div>
                                    </div>
                                </th>
                                
                                <td class="px-6 py-4">
                                    {{ $expediente->cliente->nombre }} {{ $expediente->cliente->apellidos }}
                                </td>
                                <td class="px-6 py-4 hidden sm:flex">
                                    <div class="text-sm">
                                        @if ($expediente->estado == 'En proceso')
                                            <div class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-sm font-semibold text-green-600">
                                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                                {{ $expediente->estado }}   
                                            </div>
                                        @else
                                            <div class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-sm font-semibold text-red-600">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                                {{ $expediente->estado }}   
                                            </div>
                                        @endif
                                        
                                    </div>     
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-4 flex-col sm:flex-row">
                                        <a href="{{ route('conciliacion.expediente.show', $expediente->id) }}" class="hover:text-green-500 text-gray-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                            fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16"> 
                                            <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/> 
                                            </svg>
                                        </a>

                                        <a href="{{ route('conciliacion.expediente.edit', $expediente->id) }}" class="hover:text-blue-500 text-gray-600 hover:scale-110">
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
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                            />
                                            </svg>
                                        </a>
                                        
                                        
                                        <form class="hover:text-red-500 text-gray-600 hover:scale-110 boton-eliminar" method="POST" action="{{ route('conciliacion.expediente.destroy', $expediente->id) }}">
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
            <div class="overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md m-5 py-3 px-5">
                {{ $expedientes->links() }}
            </div> 
           
           
        </div>
    </div>
</x-admin-layout>