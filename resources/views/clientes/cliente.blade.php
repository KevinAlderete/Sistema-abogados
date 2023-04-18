<x-admin-layout>

    <div class="w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-5 pt-5">
                    <div class="py-2">
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                            <li class="text-sm leading-normal">
                                <a class="opacity-50" href="{{ route('clientes.index') }}">Clientes</a>
                            </li>
                            <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                                <a href="">Cliente</a>
                            </li>
                        </ol>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="text-white px-5 py-2 border-solid flex bg-blue-500 hover:bg-blue-700 rounded-3xl">
                        Atras
                    </a>
                </div>

                <div class="mx-5 flex justify-center">
                    <div class="w-full border border-slate-400 mt-3"></div>
                </div>
                
                
                <div class="overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md m-5">
                    <!--Main Col-->
                    
                    
                        <div class="p-10 text-left">
                            
                            <h1 class="text-3xl font-bold pt-0">{{ $cliente->nombre }}</h1>
                            <div class="flex justify-between w-full">
                                <span>{{ $cliente->apellidos }}</span>
                                @if ($cliente->estado_cliente == 'Activo')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-600 px-3 py-1 text-sm font-semibold text-white">{{ $cliente->estado_cliente }}</span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-red-600 px-3 py-1 text-sm font-semibold text-white">{{ $cliente->estado_cliente }}</span>
                                @endif
                            </div>
                            <div class="mx-auto lg:mx-0 w-full pt-3 border-b-4 border-green-600 opacity-50"></div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    
                                    <div class="pt-4 text-base flex items-center justify-start flex-wrap">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 16 16"> <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/> <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/> </svg>
                                            Entidad: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->empresa }}</span> 
                                    </div>

                                    <div class="pt-2 text-base flex items-center justify-start flex-wrap">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                            class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 16 16"> <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/> <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/> </svg>
                                            DNI ó RUC: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->dni_ruc }}</span> 
                                    </div>
                                    <div class="pt-2 text-base lg:text-base flex items-center justify-start flex-wrap">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                            class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/> </svg>
                                            Género: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->genero }}</span>
                                    </div>
                                    <div class="pt-2 text-base lg:text-base flex items-center justify-start flex-wrap">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                            class="h-6 pr-1 w-6 fill-current text-green-700" viewBox="0 0 16 16"> 
                                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/> <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/> </svg>
                                            Telefono: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->telefono }}</span>
                                    </div>
                                    <div class="pt-2 text-base lg:text-base flex items-center justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg class="h-6 pr-1 w-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            zoomAndPan="magnify" viewBox="0 0 30 30.000001" 
                                            preserveAspectRatio="xMidYMid meet" version="1.0">
                                            <defs><clipPath id="id1"><path d="M 3.460938 6.5625 L 26.539062 6.5625 L 26.539062 24.707031 L 3.460938 24.707031 Z M 3.460938 6.5625 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path d="M 24.230469 11.101562 L 15 16.769531 L 5.769531 11.101562 L 5.769531 8.832031 L 15 14.503906 L 24.230469 8.832031 Z M 24.230469 6.5625 L 5.769531 6.5625 C 4.492188 6.5625 3.472656 7.578125 3.472656 8.832031 L 3.460938 22.441406 C 3.460938 23.695312 4.492188 24.707031 5.769531 24.707031 L 24.230469 24.707031 C 25.507812 24.707031 26.539062 23.695312 26.539062 22.441406 L 26.539062 8.832031 C 26.539062 7.578125 25.507812 6.5625 24.230469 6.5625 " fill-opacity="1" fill-rule="nonzero"/></g></svg>
                                            Correo: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->email }}</span>
                                    </div>
                                    <div class="pt-2 text-base lg:text-base flex items-center flex-wrap justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 pr-1 w-6 fill-current text-green-700" 
                                            viewBox="0 0 20 20"> <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/> </svg>
                                            Fecha de inscripción: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->created_at->format('d-m-Y') }}</span>
                                    </div>
                                    <div class="pt-2 text-base lg:text-base flex items-center justify-start flex-wrap">
                                        <span class="font-bold flex items-center">
                                            <svg class="h-4 fill-current text-green-700 pr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z"/></svg>
                                            Dirección: 
                                        </span>
                                        <span class="pl-2 text-gray-700">{{ $cliente->direccion }}</span>
                                    </div>
                                    <div class="pt-2 text-base flex flex-col lg:text-base justify-start">
                                        <span class="font-bold flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                            class="h-5 fill-current text-green-700 pr-2" viewBox="0 0 16 16"> <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/> <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/> </svg>
                                            Referencia: 
                                        </span>
                                        <p class="text-gray-700">{{ $cliente->referencia }}</p>
                                    </div>

                                    
                                </div>
                                <div>
                                    <div class="sm:pt-4 text-base flex items-center justify-start font-bold"><span>Procesos</span></div>
                                    <div class="flex flex-col gap-2">
                                    @foreach ($expedientes as $expediente)
                                        @if ($cliente->id == $expediente->id_cliente)
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" 
                                                fill="currentColor" class="bi bi-journal-bookmark-fill w-5 h-5 text-green-700" 
                                                viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/> <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/> <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/> </svg>
                                                <div class="">{{ $expediente->n_expediente }}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                
                            </div>
                            <div class="pt-10 pb-1 flex space-x-4">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                                    Editar
                                </a> 

                                <form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}" class="boton-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full">
                                        Borrar
                                    </button> 
                                </form>
                            </div>
                        </div>

                    

                    
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
