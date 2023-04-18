<x-admin-layout>

    <div class="w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
                <div class="flex flex-col sm:flex-row justify-between px-5 pt-5">
                    <div class="py-2">
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="opacity-50" href="javascript:;">Gestión de usuarios</a>
                        </li>
                        <li class="text-sm leading-normal pl-2 before:float-left before:pr-2 before:content-['/'] before:opacity-50">
                            <a class="opacity-50 hover:opacity-100" href="{{ route('admin.permissions.index') }}">Permisos</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Editar permiso</li>
                        </ol>
                    </div>
                    <a href="{{ route('admin.permissions.index') }}" class="text-white font-bold justify-center px-5 py-2 border-solid flex bg-blue-700 hover:bg-blue-800 rounded-3xl">
                        Atras
                    </a>
                </div>

                <div class="mx-5 flex justify-center">
                    <div class="w-full border border-slate-400 mt-3"></div>
                </div>
                
                <!-- component -->
                <div class="overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md m-5 p-5">
                    <div class="flex flex-col gap-1 sm:gap-4 sm:flex-row">
                        <form method="POST" class="mt-11 w-full flex flex-col gap-1" action="{{ route('admin.permissions.update', $permission) }}">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col gap-1 sm:gap-4 sm:flex-row">
                                <div class="w-full flex flex-col gap-1">
                                    <div class="relative z-0 w-full mb-6 group">
                                    <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    placeholder="Nombre" 
                                    value="{{ $permission->name }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Permiso</label>
                                    
                                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-6 flex justify-center">
                                <button class="rounded-3xl overflow-hidden font-bold border border-blue-700 shadow-lg mb-4 py-2 px-9 bg-blue-700 text-white hover:bg-blue-800">Actualizar</button> 
                            </div>
                        </form>  
                    

                    <div class="relative z-0 w-full group">
                    <div class="flex gap-3 mb-4 flex-wrap">
                        @if ($permission->roles)
                            @foreach ($permission->roles as $permission_role)
                            <form method="POST" action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}" class="boton-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-200 hover:bg-red-500 hover:scale-105 hover:text-red-200 rounded-full">
                                    {{ $permission_role->name }} 
                                </button>
                            </form>
                            @endforeach
                        @endif
                    </div>

                    <div>
                        <form method="POST" class="flex flex-row" action="{{ route('admin.permissions.roles', $permission->id) }}">
                            @csrf
                            <div class="relative z-0 w-full group">
                                <select id="role" name="role" autocomplete="roles" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 duration-300 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-6">Roles</label>

                                @error('role') 
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-6 ">
                                <button class="rounded-md mb-4 ml-6 py-2 px-8 border border-gray-900 font-bold hover:border-blue-800 hover:text-blue-800 transition">Asignar</button> 
                            </div>
                        </form>  
                    </div>
                </div>
              </div>
              </div>
            </div>
        </div>
    </div>
</x-admin-layout>
