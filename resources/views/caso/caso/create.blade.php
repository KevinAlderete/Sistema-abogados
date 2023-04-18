<x-admin-layout>

    <div class="w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
                <div class="flex justify-between px-5 pt-5">
                    <div class="py-2">
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="opacity-50" href="">Casos</a>
                        </li>
                        <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                            <a class="opacity-50 hover:opacity-100" href="{{ route('caso.caso.index') }}">Casos</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Añadir caso</li>
                        </ol>
                    </div>
                    <a href="{{ route('caso.caso.index') }}" class="text-white px-5 py-2 border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                        Atras
                    </a>
                </div>

                <div class="mx-5 flex justify-center">
                    <div class="w-full border border-slate-400 mt-3"></div>
                </div>
                
                <!-- component -->
                <div class="overflow-hidden rounded-lg border bg-white border-gray-200 shadow-md m-5 p-5">
                    <form method="POST" class="flex flex-col gap-1" action="{{ route('caso.caso.store') }}">
                        @csrf
                        <div class="flex flex-col gap-1 sm:gap-4 sm:flex-row">
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" placeholder="" id="n_caso" name="n_caso" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="n_caso" class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">N° Expediente</label>
                                    @error('n_caso') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="date" placeholder="" id="fecha_inicio" name="fecha_inicio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="fecha_inicio" class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Fecha inicio</label>
                                    @error('fecha_inicio') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="date" placeholder="" id="fecha_final" name="fecha_final" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="fecha_final" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Fecha final</label>
                                    @error('fecha_final') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="id_cliente" id="id_cliente" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected disabled>Selecionar Cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellidos }}</option>
                                        @endforeach
                                    </select>
                                    <label for="id_cliente" class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Cliente</label>
                                    @error('id_cliente') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="estado" id="estado" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="En proceso">En proceso</option>
                                        <option value="Archivado">Archivado</option>
                                    </select>
                                    <label for="estado" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Estado</label>
                                    @error('estado') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <textarea  name="descripcion" class="resize-none block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" id="descripcion" cols="30" rows="6" placeholder=""></textarea>
                                    <label for="descripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Descripción</label>
                                    
                                    @error('descripcion') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-6 flex justify-center">
                            <button class="overflow-hidden border border-blue-700 shadow-lg rounded-3xl mb-4 py-2 px-9 bg-blue-700 text-white hover:bg-blue-800">Añadir</button> 
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>