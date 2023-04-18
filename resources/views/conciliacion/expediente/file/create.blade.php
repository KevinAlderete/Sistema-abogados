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
                                <a href="">Añadir documento</a>
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
                    
                    <form method="POST" class="flex flex-col gap-1" action="{{ route('conciliacion.expediente.file.store', $expediente->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-1 sm:gap-4 sm:flex-row">
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" placeholder="" id="tipo_documento" name="tipo_documento" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="tipo_documento" class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Tipo de documento</label>
                                    @error('tipo_documento') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                    

                                <div class="relative z-0 w-full mb-6 group">
                                    <select name="tipo_acta" id="tipo_acta" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected disabled>Tipo de Acta</option>
                                        <option value="Acuerdo total">Acuerdo total</option>
                                        <option value="Acuerdo parcial">Acuerdo parcial</option>
                                        <option value="Falta de acuerdo">Falta de acuerdo</option>
                                        <option value="Inasistencia de las partes">Inasistencia de las partes</option>
                                        <option value="Inasistencia de una de las partes">Inasistencia de una de las partes</option>

                                    </select>
                                    <label for="tipo_acta" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Acta de conciliación</label>

                                    @error('tipo_acta') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                    
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" placeholder="" id="n_acta" name="n_acta" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="n_acta" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">N° Acta</label>
                                    @error('n_acta') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" placeholder="" id="folio" name="folio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="folio" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Folio</label>
                                    @error('folio') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" placeholder="" id="descripcion" name="descripcion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="descripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Descripción</label>
                                    @error('descripcion') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" aria-describedby="documento_help" id="documento" name="documento" placeholder="" type="file">
                                    <label class="after:content-['*'] after:text-red-400 peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6" for="documento">Upload file</label>
                                    <p class="mt-1 text-sm text-gray-900" id="documento">PDF (Max. 15mb).</p>
                                    @error('documento') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                
                        <div class="sm:col-span-6 flex justify-center">
                            <button class="overflow-hidden border border-blue-700 shadow-lg rounded-3xl mb-4 py-2 px-9 bg-blue-700 text-white hover:bg-blue-800">Añadir</button> 
                        </div>
                    </form>
                </section>
                
                 
                </section>
                
                
            </div>
        </div>
    </div>
</x-admin-layout>