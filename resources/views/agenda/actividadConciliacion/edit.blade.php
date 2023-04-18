<x-admin-layout>

    <div class="w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
                <div class="flex flex-col sm:flex-row justify-between px-5 pt-5">
                    <div class="py-2">
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="opacity-50" href="javascript:;">Agenda</a>
                        </li>
                        <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                            <a class="opacity-50 hover:opacity-100" href="{{ route('agenda.actividadConciliacion.index') }}">Reunión conciliacion</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Editar reunión</li>
                        </ol>
                    </div>
                    <a href="{{ route('agenda.actividadConciliacion.index') }}" class="text-white px-5 py-2 border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                        Atras
                    </a>
                </div>

                <div class="mx-5 flex justify-center">
                    <div class="w-full border border-slate-400 mt-3"></div>
                </div>
                
                <!-- component -->
                <div class="overflow-hidden rounded-lg border bg-white border-gray-200 shadow-md m-5 p-5">
                    <form method="POST" action="{{ route('agenda.actividadConciliacion.update', $actividadConciliacion ) }}">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-1 sm:gap-4 sm:flex-row">
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" 
                                      id="titulo" 
                                      name="titulo" 
                                      placeholder="" 
                                      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                      value="{{ $actividadConciliacion->titulo }}">
                                    <label for="titulo" class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Actividad</label>
                                    @error('titulo') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" 
                                      id="direccion" 
                                      name="direccion" 
                                      placeholder="" 
                                      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                      value="{{ $actividadConciliacion->direccion }}">
                                    <label for="direccion" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Dirección</label>
                                    @error('direccion') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="id_expediente" id="id_expediente" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" disabled selected>{{ $actividadConciliacion->expediente->n_expediente }}</option>
                                        @foreach ($expedientes as $expediente)
                                            <option value="{{ $expediente->id }}">{{ $expediente->n_expediente }}</option>
                                        @endforeach
                                    </select>
                                    <label for="id_expediente" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Expediente</label>
                                    @error('id_expediente') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="date" 
                                      id="fecha" 
                                      name="fecha" 
                                      placeholder="" 
                                      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                      value="{{ $actividadConciliacion->fecha }}">
                                    <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Fecha</label>
                                    @error('fecha') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="time" 
                                      id="hora" 
                                      name="hora" 
                                      placeholder="" 
                                      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                      value="{{ $actividadConciliacion->hora }}">
                                    <label for="hora" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Hora</label>
                                    @error('hora') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                
                                <div class="relative z-0 w-full mb-6 group">
                                    <textarea name="descripcion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer resize-none" id="descripcion" cols="30" rows="4" placeholder="">{{ $actividadConciliacion->descripcion }}</textarea>
                                    <label for="descripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Descripción</label>
                                    @error('descripcion') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>        
                          
                          
                        <div class="sm:col-span-6 flex justify-center">
                            <button class="rounded-3xl overflow-hidden border border-blue-700 shadow-lg mb-4 py-2 px-9 bg-blue-700 text-white hover:bg-blue-800">Actualizar</button> 
                          </div>
                      </form>
                </div>

                
              </div>
            </div>
        </div>
    </div>
</x-admin-layout>
