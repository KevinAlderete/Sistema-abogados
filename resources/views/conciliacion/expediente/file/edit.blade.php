<x-admin-layout>

    <div class="w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
                <div class="flex flex-col sm:flex-row justify-between px-5 pt-5">
                    <div class="py-2">
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                            <li class="text-sm leading-normal">
                                <a class="opacity-50" href="">Conciliación</a>
                            </li>
                            <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                                <a class="opacity-50 hover:opacity-100" href="{{ route('conciliacion.expediente.index') }}">Expedientes</a>
                            </li>
                            <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                                <a class="opacity-50 hover:opacity-100" href="{{ url()->previous() }}">Expediente</a>
                            </li>
                            <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                                <a href="">Editar documento</a>
                            </li>
                        </ol>
                    </div>
                    <div class="flex gap-4">
                        
                        <a href="{{ url()->previous() }}" class="text-white w-full justify-center px-5 py-2 border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                            Atras
                        </a>
                    </div>
                </div>

                <div class="mx-5 flex justify-center">
                    <div class="w-full border border-slate-400 mt-3"></div>
                </div>

                <section class="overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md m-5 p-5">
                    <form method="POST" action="{{ route('conciliacion.expediente.file.update', $ex_documentos->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-1 sm:gap-4 sm:flex-row">
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input id="tipo_documento" value="{{ $ex_documentos->tipo_documento }}" name="tipo_documento" placeholder="" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6" for="tipo_documento">Tipo de Documento</label>
                                    
                                    @error('tipo_documento') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                    

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="tipo_acta" id="tipo_acta" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="{{ $ex_documentos->tipo_acta }}" selected>{{ $ex_documentos->tipo_acta }}</option>
                                        <option value="Acuerdo total">Acuerdo total</option>
                                        <option value="Inasistencia">Inasistencia</option>
                                        <option value="Falta de acuerdo">Falta de acuerdo</option>
                                        <option value="Acuerdo parcial">Acuerdo parcial</option>

                                    </select>
                                    <label for="tipo_acta" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Tipo de acta</label>

                                    @error('tipo_acta') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <textarea name="descripcion" id="descripcion" placeholder="" class="block py-2.5 resize-none px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">{{ $ex_documentos->descripcion }}</textarea>
                                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6" for="descripcion">Descripción</label>
                                    
                                    @error('descripcion') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                
                                <div class="relative z-0 w-full mb-6 group">
                                    <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" aria-describedby="documento_help" id="documento" name="documento" type="file">
                                    <label class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6" for="documento">Documento</label>
                                    
                                    <p class="mt-1 text-sm text-gray-900" id="documento">PDF (Max. 15mb).</p>
                                    @error('documento') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-6 flex justify-center">
                            <button class="overflow-hidden border border-blue-700 shadow-lg rounded-3xl mb-4 py-2 px-9 bg-blue-700 text-white hover:bg-blue-800">Actualizar</button> 
                        </div>
                    </form>
                </section>
                
                 
                </section>
                
                
            </div>
        </div>
    </div>
</x-admin-layout>