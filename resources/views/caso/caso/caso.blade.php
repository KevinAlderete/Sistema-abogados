<x-admin-layout>

    <div class="w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col sm:flex-row  justify-between px-5 pt-5">
                    <div class="py-2">
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                            <li class="text-sm leading-normal">
                                <a class="opacity-50" href="{{ route('caso.caso.index') }}">Casos</a>
                            </li>
                            <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                                <a class="opacity-50 hover:opacity-100" href="{{ route('caso.caso.index') }}">Casos</a>
                            </li>
                            <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                                <a href="">Caso</a>
                            </li>
                        </ol>
                    </div>
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('caso.caso.file.create', $caso->id) }}" class="text-white font-bold px-5 py-2 gap-2 border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                            Ingresar documentos
                        </a>
                        <a href="{{ route('agenda.actividadCaso.create') }}" class="text-white justify-center font-bold px-5 py-2 gap-2 border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                            Agregar diligencia
                         </a>
                        <a href="{{ route('caso.caso.index') }}" class="text-white px-5 py-2 font-bold border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                            Atras
                        </a>
                    </div>
                </div>

                <div class="mx-5 flex justify-center">
                    <div class="w-full border border-slate-400 mt-3"></div>
                </div>
                
                
                
                <div class="overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md m-5 p-10">
                    <!--Main Col-->
                    <div>
                    
                        <div class="text-left">
                            
                            
                            <div class="flex justify-between w-full flex-wrap">
                                <h1 class="text-3xl font-bold pt-0">{{ $caso->n_caso }}</h1>
                                @if ($caso->estado == 'En proceso')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-600 px-3 py-1 text-sm font-semibold text-white">{{ $caso->estado }}</span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-red-600 px-3 py-1 text-sm font-semibold text-white">{{ $caso->estado }}</span>
                                @endif
                            </div>
                            
                            <div class="mx-auto lg:mx-0 w-full pt-3 border-b-4 border-green-600 opacity-50"></div>
                        </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <div class="pt-4 text-base flex items-center justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 16 16"> <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/> <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/> </svg>
                                            Cliente: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $caso->cliente->nombre }} {{ $caso->cliente->apellidos }}</span> 
                                    </div>

                                    <div class="pt-2 text-base flex items-center justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 20 20"> <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/> </svg>
                                            Fecha Inicio: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $caso->fecha_inicio }}</span> 
                                    </div>
                                    <div class="pt-2 text-base lg:text-base flex items-center justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 20 20"> <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/> </svg>
                                            Fecha Final: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $caso->fecha_final }}</span>
                                    </div>
                                    <div class="pt-2 text-base flex flex-col lg:text-base justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                            class="h-5 fill-current text-green-700 pr-2" viewBox="0 0 16 16"> <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/> <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/> </svg>
                                            Descripción: 
                                        </span>
                                        <p class="text-gray-700">{{ $caso->descripcion }}</p>
                                    </div>
                                </div>
                                <div>
                                    {{-- Asignar proceso--}}
                                    <div class="mt-4">
                                        <h2 class="font-bold">Proceso</h2>
                                        
                                        <div class="flex gap-3 mb-4 flex-wrap">
                                            @foreach ($cas_procesos as $cas_proceso)
                                                @if ($caso->id == $cas_proceso->id_caso)
                                                    <form method="POST" action="{{ route('caso.caso.proceso.remove', $cas_proceso->id) }}" class="boton-eliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-200 hover:bg-red-500 hover:scale-105 hover:text-red-200 rounded-full">
                                                            {{ $cas_proceso->procesos->nombre }} 
                                                        </button> 
                                                    </form>
                                                @endif
                                            @endforeach
                                        </div>
                    
                                        <div>
                                            <form method="POST" class="flex flex-row" action="{{ route('caso.caso.proceso', $caso->id) }}">
                                                @csrf
                                                <div class="block w-full items-center mb-5 sm:col-span-6">
                                                    <select id="id_proceso" name="id_proceso" autocomplete="Procesos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                                        @foreach ($procesos as $proceso)
                                                            <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="id_proceso" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Porcesos:</label>

                                                </div>
                                                <div class="sm:col-span-6 ">
                                                    <button class="rounded-md mb-4 ml-6 py-2 px-8 border border-gray-900 font-bold hover:border-blue-800 hover:text-blue-800 transition">Asignar</button> 
                                                </div>
                                            </form>  
                                        </div>
                                    </div>
                                    {{-- Asignar parte contraria --}}
                                    <div class="mt-4">
                                        <h2 class="font-bold">Parte contraria</h2>
                                        
                                        <div class="flex gap-3 mb-4 flex-wrap">
                                            @foreach ($cas_contrarias as $cas_contraria)
                                                @if ($caso->id == $cas_contraria->id_caso)
                                                    <form method="POST" action="{{ route('caso.caso.p_contrarias.remove', $cas_contraria->id) }}" class="boton-eliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-200 hover:bg-red-500 hover:scale-105 hover:text-red-200 rounded-full">
                                                            {{ $cas_contraria->pContraria->nombre }}
                                                        </button> 
                                                    </form>
                                                @endif
                                            @endforeach
                                        </div>
                    
                                        <div>
                                            <form method="POST" class="flex flex-row" action="{{ route('caso.caso.p_contrarias', $caso->id) }}">
                                                @csrf
                                                <div class="block w-full items-center mb-5 sm:col-span-6">
                                                    <select id="id_contraria" name="id_contraria" autocomplete="Submaterias" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                                        @foreach ($p_contrarias as $p_contraria)
                                                            <option value="{{ $p_contraria->id }}">{{ $p_contraria->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="id_contraria" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Parte Contraria:</label>

                                                </div>
                                                <div class="sm:col-span-6 ">
                                                    <button class="rounded-md mb-4 ml-6 py-2 px-8 border border-gray-900 font-bold hover:border-blue-800 hover:text-blue-800 transition">Asignar</button> 
                                                </div>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="pt-10 pb-1 flex space-x-4">
                                <a href="{{ route('caso.caso.edit', $caso->id) }}" class="bg-blue-700 hover:bg-blue-800 hover:scale-110 text-white font-bold py-2 px-4 rounded-full">
                                    Editar
                                </a> 

                                <form method="POST" action="{{ route('caso.caso.destroy', $caso->id) }}" class="boton-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-700 hover:bg-red-800 hover:scale-110 text-white font-bold py-2 px-4 rounded-full">
                                        Borrar
                                    </button> 
                                </form>
                            </div>
                             

                        </div>

                    </div>
                    <!-- file component -->
                    <div class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tipo de documento</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900 hidden sm:flex">Descripción</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center">Acciones</th>
                            </tr>
                        </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                @foreach ($cas_documentos as $cas_documento)
                                @if ($caso->id == $cas_documento->id_caso)
                                    <tr class="hover:bg-gray-50">
                                        <th class=" px-6 py-4 font-normal text-gray-900">
                                            
                                            <div class="text-sm">
                                            <div class="font-medium text-gray-700">{{ $cas_documento->tipo_documento }}</div>
                                            </div>
                                        </th>
                                        
                                        <td class="px-6 py-4 hidden sm:flex">
                                            {{ $cas_documento->descripcion}}    
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-4">
                                                <a target="_blank" href="{{ route('caso.caso.file.view', $cas_documento->uuid) }}" class="hover:text-orange-500 text-gray-600 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" 
                                                    height="24" fill="currentColor" class="bi bi-file-earmark-pdf" 
                                                    viewBox="0 0 16 16"> <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/> <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/> </svg>
                                                    
                                                    
                                                </a>
                                                <a href="{{ route('caso.caso.file.download', $cas_documento->uuid) }}" class="hover:text-orange-500 text-gray-600 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" 
                                                    height="24" fill="currentColor" class="bi bi-download" 
                                                    viewBox="0 0 16 16"> <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/> <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/> </svg>
                                                </a>

                                                <a href="{{ route('caso.caso.file.edit', $cas_documento->id) }}" class="hover:text-blue-500 text-gray-600 hover:scale-110">
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
                                                
                                                
                                                <form class="hover:text-red-500 text-gray-600 hover:scale-110 boton-eliminar" method="POST" action="{{ route('caso.caso.file.destroy', $cas_documento->id) }}">
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
                                
                                    @endif   
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</x-admin-layout>
