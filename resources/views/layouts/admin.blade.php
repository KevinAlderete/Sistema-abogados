<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" sizes="76x76" href="https://hectorpizarroabogados.com/wp-content/uploads/2023/02/logo-hector-jhoel-pizarro-abogado-pasco.png" />
        <title>PIZARRO-Sistema Administrativo</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
        <script src="{{ asset('js/alpinejs/alpinejscollapse.min.js') }}" async></script>
        <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('js/fullcalendarjs/fullcalendarjs.min.js') }}"></script>
        

        <script src="{{ asset('js/chartjs/chartjs.min.js') }}"></script>
        <style>
            .scroll-bar::-webkit-scrollbar {
                width: 10px;
                background: rgb(24, 32, 43);
            }

            .scroll-bar::-webkit-scrollbar-thumb {
                background: rgba(255,255,255, .2);
                border-radius: 10px;
            }
            @media (max-width: 640px) {
                .scroll-table-e{
                overflow: scroll;
            }
            .scroll-table-e::-webkit-scrollbar {
                height: 10px;
                width: 0px;
                background: rgb(235, 232, 232);
            }

            .scroll-table-e::-webkit-scrollbar-thumb {
                background: rgba(78, 75, 75, 0.2);
                border-radius: 10px;
            }
        }
        </style>
        
    </head>
    <body class="font-sans antialiased text-gray-900 bg-white">
        
        <div
            class="flex h-screen absolute overflow-y-hidden bg-white"
            x-data="setup()"
            x-init="$refs.loading.classList.add('hidden')"
            >
            <!-- Loading screen -->
            <div
            x-ref="loading"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
            >
            <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-white"></div>
            </div>
        </div>
        @if (Session::has('message'))
            
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get("message") }}'
                })
            </script>
        @endif

        @if (Session::has('messagedestroy'))
            
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get("messagedestroy") }}'
                })
            </script>
        @endif

        @if (Session::has('messageAlert'))
            
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get("messageAlert") }}'
                })
            </script>
        @endif
        
        
        <div class="flex h-screen bg-[#111827]">
            <!-- Desktop sidebar -->
            <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-900 md:block scroll-bar">
                <div>
                    <div class="text-white">
                        <div class="flex p-2  bg-gray-900 justify-center">
                            <div class="flex py-3 px-2 items-center">
                                <p class="font-bold text-xl uppercase">Administración</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="">
                                <img class="hidden h-32 w-32 sm:block object-cover mr-2 mb-4"
                                    src="https://hectorpizarroabogados.com/wp-content/uploads/2023/02/logo-hector-jhoel-pizarro-abogado-pasco.png" alt="">
                                
                            </div>
                        </div>
                        <div>
                            <ul class="mt-1 leading-10">
                                <li class="relative px-2 py-1 ">
                                    <x-admin-link class="flex whitespace-nowrap" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        <div class="inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span>Dashboard</span>
                                        </div>
                                    </x-admin-link>
                                </li>

                                
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <div class="inline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill h-5 w-5 mr-4" 
                                                viewBox="0 0 16 16"> 
                                                <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/> 
                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/> <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/> 
                                                </svg> 
                                                <span>Agenda</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3 text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>

                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium border-l-2"
                                            aria-label="submenu">

                                            <li>
                                                <x-admin-link :href="route('agenda.calendar.index')" :active="request()->routeIs('agenda.calendar.index')">
                                                  Calendario
                                                </x-admin-link>
                                                
                                            </li>
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('agenda.actividad.index')" :active="request()->routeIs('agenda.actividad.index')">
                                                    Actividad
                                                </x-admin-link>
                                            </li> 
                                            @role('|admin|encargado|asistente')
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('agenda.actividadConciliacion.index')" :active="request()->routeIs('agenda.actividadConciliacion.index')">
                                                    Reunión conciliación
                                                </x-admin-link>
                                            </li>
                                            @endrole
                                            @role('abogado|admin|encargado')
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('agenda.actividadCaso.index')" :active="request()->routeIs('agenda.actividadCaso.index')">
                                                    Diligencia
                                                </x-admin-link>
                                            </li>  
                                            @endrole
                                        </ul>
                                    </div>
                                </li>   
                                @role('encargado|admin|asistente|abogado')
                                <li class="relative px-2 py-1 ">
                                    <x-admin-link class="flex whitespace-nowrap" :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill h-5 w-5 mr-4" viewBox="0 0 16 16"> <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/> <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/> <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/> 
                                        </svg>
                                        Clientes
                                    </x-admin-link>
                                </li> 
                                @endrole  
                                @role('encargado|admin|asistente')
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <div class="inline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" class="bi bi-people-fill h-5 w-5"><path d="M280 40C280 17.91 297.9 0 320 0C342.1 0 360 17.91 360 40C360 62.09 342.1 80 320 80C297.9 80 280 62.09 280 40zM375.8 253C377.5 266.2 368.1 278.2 354.1 279.8C341.8 281.5 329.8 272.1 328.2 258.1L323.8 223.1H316.2L311.8 258.1C310.2 272.1 298.2 281.5 285 279.8C271.9 278.2 262.5 266.2 264.2 253L275.3 164.3L255.5 180.1C245.4 189.6 230.2 188.3 221.7 178.2C213.1 168 214.4 152.9 224.5 144.3L266 109.2C276.1 100.7 288.9 96 302.2 96H337.8C351.1 96 363.9 100.7 373.1 109.2L415.5 144.3C425.6 152.9 426.9 168 418.3 178.2C409.8 188.3 394.6 189.6 384.5 180.1L364.7 164.3L375.8 253zM80 258.7L140.3 339C149.7 351.6 167.7 353.8 179.9 343.8C190.4 335.1 193.1 319.1 186 308.3L164.6 272.5C155.9 258 159.9 239.3 173.7 229.7C187.6 220.1 206.5 222.9 216.1 236L263.5 294.1C279.3 313.1 288 338.6 288 364.1V480C288 497.7 273.7 512 256 512H160C150.3 512 141.1 507.6 135 499.1L14.02 348.8C4.946 337.4 0 323.3 0 308.8V103.1C0 81.91 17.91 63.1 40 63.1C62.09 63.1 80 81.91 80 103.1V258.7zM640 104V308.8C640 323.3 635.1 337.4 625.1 348.8L504.1 499.1C498.9 507.6 489.7 512 480 512H384C366.3 512 352 497.7 352 480V364.1C352 338.6 360.7 313.1 376.5 294.1L423 236C433.5 222.9 452.4 220.1 466.3 229.7C480.1 239.3 484.1 258 475.4 272.5L453.1 308.3C446.9 319.1 449.6 335.1 460.2 343.8C472.3 353.8 490.3 351.6 499.7 339L560 258.7V104C560 81.91 577.9 64 600 64C622.1 64 640 81.91 640 104V104z"/>
                                                </svg>
                                                <span class="ml-4">Conciliaciones</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3 text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>
                                    
                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium border-l-2"
                                            aria-label="submenu">

                                            <li>
                                                <x-admin-link :href="route('conciliacion.expediente.index')" :active="request()->routeIs('conciliacion.expediente.index')">
                                                  Expedientes
                                                </x-admin-link>
                                                
                                            </li>
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('conciliacion.invitado.index')" :active="request()->routeIs('conciliacion.invitado.index')">
                                                    Invitado
                                                </x-admin-link>
                                            </li>
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('conciliacion.conciliador.index')" :active="request()->routeIs('conciliacion.conciliador.index')">
                                                    Conciliador
                                                </x-admin-link>
                                            </li>  
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('conciliacion.submaterias.index')" :active="request()->routeIs('conciliacion.submaterias.index')">
                                                    Sub-Materias
                                                </x-admin-link>
                                            </li>                                            
                                            
                                        </ul>
                                    </div>
                                </li>   
                                @endrole  
                                @role('abogado|admin|encargado')
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <div class="inline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" class="bi bi-people-fill h-5 w-5"><path d="M280 40C280 17.91 297.9 0 320 0C342.1 0 360 17.91 360 40C360 62.09 342.1 80 320 80C297.9 80 280 62.09 280 40zM375.8 253C377.5 266.2 368.1 278.2 354.1 279.8C341.8 281.5 329.8 272.1 328.2 258.1L323.8 223.1H316.2L311.8 258.1C310.2 272.1 298.2 281.5 285 279.8C271.9 278.2 262.5 266.2 264.2 253L275.3 164.3L255.5 180.1C245.4 189.6 230.2 188.3 221.7 178.2C213.1 168 214.4 152.9 224.5 144.3L266 109.2C276.1 100.7 288.9 96 302.2 96H337.8C351.1 96 363.9 100.7 373.1 109.2L415.5 144.3C425.6 152.9 426.9 168 418.3 178.2C409.8 188.3 394.6 189.6 384.5 180.1L364.7 164.3L375.8 253zM80 258.7L140.3 339C149.7 351.6 167.7 353.8 179.9 343.8C190.4 335.1 193.1 319.1 186 308.3L164.6 272.5C155.9 258 159.9 239.3 173.7 229.7C187.6 220.1 206.5 222.9 216.1 236L263.5 294.1C279.3 313.1 288 338.6 288 364.1V480C288 497.7 273.7 512 256 512H160C150.3 512 141.1 507.6 135 499.1L14.02 348.8C4.946 337.4 0 323.3 0 308.8V103.1C0 81.91 17.91 63.1 40 63.1C62.09 63.1 80 81.91 80 103.1V258.7zM640 104V308.8C640 323.3 635.1 337.4 625.1 348.8L504.1 499.1C498.9 507.6 489.7 512 480 512H384C366.3 512 352 497.7 352 480V364.1C352 338.6 360.7 313.1 376.5 294.1L423 236C433.5 222.9 452.4 220.1 466.3 229.7C480.1 239.3 484.1 258 475.4 272.5L453.1 308.3C446.9 319.1 449.6 335.1 460.2 343.8C472.3 353.8 490.3 351.6 499.7 339L560 258.7V104C560 81.91 577.9 64 600 64C622.1 64 640 81.91 640 104V104z"/>
                                                </svg>
                                                <span class="ml-4">Casos</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3 text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>
                                    
                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium border-l-2"
                                            aria-label="submenu">

                                            <li>
                                                <x-admin-link :href="route('caso.caso.index')" :active="request()->routeIs('caso.caso.index')">
                                                  Caso
                                                </x-admin-link>
                                            </li>     
                                            <li>
                                                <x-admin-link :href="route('caso.tipoProceso.index')" :active="request()->routeIs('caso.tipoProceso.index')">
                                                  Tipo proceso
                                                </x-admin-link>
                                            </li>       
                                            <li>
                                                <x-admin-link :href="route('caso.parteContraria.index')" :active="request()->routeIs('caso.parteContraria.index')">
                                                  Parte Contraria
                                                </x-admin-link>
                                            </li>                               
                                        </ul>
                                    </div>
                                    
                                </li> 
                                @endrole
                                @role('admin')
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video3 h-5 w-5" 
                                            viewBox="0 0 16 16"> 
                                            <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z"/> 
                                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z"/> 
                                            </svg>
                                            <span class="ml-4">Gestión de usuarios</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>

                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="border-l-2 p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium" aria-label="submenu">

                                            <li>
                                                {{-- <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg> --}}
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                                                    Usuarios
                                                </x-admin-link>
                                            </li>  
                                            <li>
                                                <x-admin-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')">
                                                  Roles
                                                </x-admin-link>
                                                
                                            </li>
                                              
                                            <li class="hidden">
                                                <x-admin-link :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.index')">
                                                  Permisos
                                                </x-admin-link>
                                            </li>                                          
                                            
                                        </ul>
                                    </div>
                                </li>
                                @endrole 
                                
                                <li class="relative px-2 py-1">
                                    <form method="POST" class="flex items-center text-base font-normal rounded-lg text-white hover:bg-gray-700" action="{{ route('logout') }}">
                                        @csrf
                                        
                                        <x-dropdown-link class="flex whitespace-nowrap" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            <svg aria-hidden="true" class="w-6 h-6 text-white flex-shrink-0 transition duration-75 dark:text-white mr-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                            {{ __('Cerrar sesión') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Mobile sidebar -->
            <!-- Backdrop -->
            <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

            <aside
                class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-900 md:hidden"
                x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
                @keydown.escape="closeSideMenu">
                <div>
                    <div class="text-white">
                        <div class="flex p-2  bg-gray-900 justify-center">
                            <div class="flex py-3 px-2 items-center">
                                <p class="font-bold uppercase">Administración</p>
                            </div>
                        </div>
                        <div>
                            <ul class="mt-1 leading-10">
                                <li class="relative px-2 py-1 ">
                                    <x-admin-link class="flex whitespace-nowrap" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        <div class="inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span>Dashboard</span>
                                        </div>
                                    </x-admin-link>
                                </li>

                                
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <div class="inline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill h-5 w-5 mr-4" 
                                                viewBox="0 0 16 16"> 
                                                <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/> 
                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/> <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/> 
                                                </svg> 
                                                <span>Agenda</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3 text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>

                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium border-l-2"
                                            aria-label="submenu">

                                            <li>
                                                <x-admin-link :href="route('agenda.calendar.index')" :active="request()->routeIs('agenda.calendar.index')">
                                                  Calendario
                                                </x-admin-link>
                                                
                                            </li>
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('agenda.actividad.index')" :active="request()->routeIs('agenda.actividad.index')">
                                                    Actividad
                                                </x-admin-link>
                                            </li> 
                                            @role('|admin|encargado|asistente')
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('agenda.actividadConciliacion.index')" :active="request()->routeIs('agenda.actividadConciliacion.index')">
                                                    Reunión conciliación
                                                </x-admin-link>
                                            </li> 
                                            @endrole
                                            @role('abogado|admin|encargado')
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('agenda.actividadCaso.index')" :active="request()->routeIs('agenda.actividadCaso.index')">
                                                    Diligencia
                                                </x-admin-link>
                                            </li> 
                                            @endrole
                                        </ul>
                                    </div>
                                </li>   
                                @role('encargado|admin|asistente|abogado')
                                <li class="relative px-2 py-1 ">
                                    <x-admin-link class="flex whitespace-nowrap" :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill h-5 w-5 mr-4" viewBox="0 0 16 16"> <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/> <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/> <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/> 
                                        </svg>
                                        Clientes
                                    </x-admin-link>
                                </li>  
                                @endrole 
                                @role('encargado|admin|asistente')
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <div class="inline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" class="bi bi-people-fill h-5 w-5"><path d="M280 40C280 17.91 297.9 0 320 0C342.1 0 360 17.91 360 40C360 62.09 342.1 80 320 80C297.9 80 280 62.09 280 40zM375.8 253C377.5 266.2 368.1 278.2 354.1 279.8C341.8 281.5 329.8 272.1 328.2 258.1L323.8 223.1H316.2L311.8 258.1C310.2 272.1 298.2 281.5 285 279.8C271.9 278.2 262.5 266.2 264.2 253L275.3 164.3L255.5 180.1C245.4 189.6 230.2 188.3 221.7 178.2C213.1 168 214.4 152.9 224.5 144.3L266 109.2C276.1 100.7 288.9 96 302.2 96H337.8C351.1 96 363.9 100.7 373.1 109.2L415.5 144.3C425.6 152.9 426.9 168 418.3 178.2C409.8 188.3 394.6 189.6 384.5 180.1L364.7 164.3L375.8 253zM80 258.7L140.3 339C149.7 351.6 167.7 353.8 179.9 343.8C190.4 335.1 193.1 319.1 186 308.3L164.6 272.5C155.9 258 159.9 239.3 173.7 229.7C187.6 220.1 206.5 222.9 216.1 236L263.5 294.1C279.3 313.1 288 338.6 288 364.1V480C288 497.7 273.7 512 256 512H160C150.3 512 141.1 507.6 135 499.1L14.02 348.8C4.946 337.4 0 323.3 0 308.8V103.1C0 81.91 17.91 63.1 40 63.1C62.09 63.1 80 81.91 80 103.1V258.7zM640 104V308.8C640 323.3 635.1 337.4 625.1 348.8L504.1 499.1C498.9 507.6 489.7 512 480 512H384C366.3 512 352 497.7 352 480V364.1C352 338.6 360.7 313.1 376.5 294.1L423 236C433.5 222.9 452.4 220.1 466.3 229.7C480.1 239.3 484.1 258 475.4 272.5L453.1 308.3C446.9 319.1 449.6 335.1 460.2 343.8C472.3 353.8 490.3 351.6 499.7 339L560 258.7V104C560 81.91 577.9 64 600 64C622.1 64 640 81.91 640 104V104z"/>
                                                </svg>
                                                <span class="ml-4">Conciliaciones</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3 text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>

                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium border-l-2"
                                            aria-label="submenu">

                                            <li>
                                                <x-admin-link :href="route('conciliacion.expediente.index')" :active="request()->routeIs('conciliacion.expediente.index')">
                                                  Expedientes
                                                </x-admin-link>
                                                
                                            </li>
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('conciliacion.invitado.index')" :active="request()->routeIs('conciliacion.invitado.index')">
                                                    Invitado
                                                </x-admin-link>
                                            </li>
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('conciliacion.conciliador.index')" :active="request()->routeIs('conciliacion.conciliador.index')">
                                                    Conciliador
                                                </x-admin-link>
                                            </li>  
                                            <li>
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('conciliacion.submaterias.index')" :active="request()->routeIs('conciliacion.submaterias.index')">
                                                    Sub-Materias
                                                </x-admin-link>
                                            </li>                                            
                                            
                                        </ul>
                                    </div>
                                </li>    
                                @endrole 
                                @role('abogado|admin|encargado')
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <div class="inline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" class="bi bi-people-fill h-5 w-5"><path d="M280 40C280 17.91 297.9 0 320 0C342.1 0 360 17.91 360 40C360 62.09 342.1 80 320 80C297.9 80 280 62.09 280 40zM375.8 253C377.5 266.2 368.1 278.2 354.1 279.8C341.8 281.5 329.8 272.1 328.2 258.1L323.8 223.1H316.2L311.8 258.1C310.2 272.1 298.2 281.5 285 279.8C271.9 278.2 262.5 266.2 264.2 253L275.3 164.3L255.5 180.1C245.4 189.6 230.2 188.3 221.7 178.2C213.1 168 214.4 152.9 224.5 144.3L266 109.2C276.1 100.7 288.9 96 302.2 96H337.8C351.1 96 363.9 100.7 373.1 109.2L415.5 144.3C425.6 152.9 426.9 168 418.3 178.2C409.8 188.3 394.6 189.6 384.5 180.1L364.7 164.3L375.8 253zM80 258.7L140.3 339C149.7 351.6 167.7 353.8 179.9 343.8C190.4 335.1 193.1 319.1 186 308.3L164.6 272.5C155.9 258 159.9 239.3 173.7 229.7C187.6 220.1 206.5 222.9 216.1 236L263.5 294.1C279.3 313.1 288 338.6 288 364.1V480C288 497.7 273.7 512 256 512H160C150.3 512 141.1 507.6 135 499.1L14.02 348.8C4.946 337.4 0 323.3 0 308.8V103.1C0 81.91 17.91 63.1 40 63.1C62.09 63.1 80 81.91 80 103.1V258.7zM640 104V308.8C640 323.3 635.1 337.4 625.1 348.8L504.1 499.1C498.9 507.6 489.7 512 480 512H384C366.3 512 352 497.7 352 480V364.1C352 338.6 360.7 313.1 376.5 294.1L423 236C433.5 222.9 452.4 220.1 466.3 229.7C480.1 239.3 484.1 258 475.4 272.5L453.1 308.3C446.9 319.1 449.6 335.1 460.2 343.8C472.3 353.8 490.3 351.6 499.7 339L560 258.7V104C560 81.91 577.9 64 600 64C622.1 64 640 81.91 640 104V104z"/>
                                                </svg>
                                                <span class="ml-4">Casos</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3 text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>

                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium border-l-2"
                                            aria-label="submenu">

                                            <li>
                                                <x-admin-link :href="route('caso.caso.index')" :active="request()->routeIs('caso.caso.index')">
                                                  Caso
                                                </x-admin-link>
                                            </li>     
                                            <li>
                                                <x-admin-link :href="route('caso.tipoProceso.index')" :active="request()->routeIs('caso.tipoProceso.index')">
                                                  Tipo proceso
                                                </x-admin-link>
                                            </li>       
                                            <li>
                                                <x-admin-link :href="route('caso.parteContraria.index')" :active="request()->routeIs('caso.parteContraria.index')">
                                                  Parte Contraria
                                                </x-admin-link>
                                            </li>                               
                                        </ul>
                                    </div>
                                </li> 
                                @endrole
                                @role('admin')
                                <li class="relative px-2 py-1" x-data="{ expanded : false  }">
                                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                                        x-on:click="expanded = !expanded">
                                        <span class="inline-flex justify-between w-full pl-2 pr-4 py-2 text-sm font-semibold rounded-lg hover:bg-gray-600 hover:text-white text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video3 h-5 w-5" 
                                            viewBox="0 0 16 16"> 
                                            <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z"/> 
                                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z"/> 
                                            </svg>
                                            <span class="ml-4">Gestión de usuarios</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" x-show="expanded"
                                            class="ml-3  text-white w-4 h-4 mt-[3px]" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        
                                    </div>

                                    <div x-show="expanded" x-collapse.duration.600ms style="display:none;" class="ml-7">
                                        <ul class="border-l-2 p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium" aria-label="submenu">

                                            <li>
                                                {{-- <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg> --}}
                                                <x-admin-link class="flex-1 whitespace-nowrap" :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                                                    Usuarios
                                                </x-admin-link>
                                            </li>  
                                            <li>
                                                <x-admin-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')">
                                                  Roles
                                                </x-admin-link>
                                                
                                            </li>
                                              
                                            <li class="hidden">
                                                <x-admin-link :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.index')">
                                                  Permisos
                                                </x-admin-link>
                                            </li>                                          
                                            
                                        </ul>
                                    </div>
                                </li>
                                @endrole 
                                
                                <li class="relative px-2 py-1">
                                    <form method="POST" class="flex items-center text-base font-normal rounded-lg text-white hover:bg-gray-700" action="{{ route('logout') }}">
                                        @csrf
                                        
                                        <x-dropdown-link class="flex whitespace-nowrap" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            <svg aria-hidden="true" class="w-6 h-6 text-white flex-shrink-0 transition duration-75 dark:text-white mr-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                            {{ __('Cerrar sesión') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>


            <div class="flex flex-col flex-1 w-full overflow-y-auto">
                <header class="z-40 py-4  bg-gray-900">
                    <div class="flex items-center justify-between md:justify-end h-8 px-6">
                        <!-- Mobile hamburger -->
                        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                            @click="toggleSideMenu" aria-label="Menu">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </button>
    
                        <ul class="flex items-center justify-end flex-shrink-0 space-x-4 ">
                            <!-- Profile menu -->
                            <li>
                                <a href="{{route('agenda.calendar.index')}}" >
                                    <div class="p-2 bg-white text-blue-500 align-middle rounded-full hover:text-white hover:bg-blue-500 focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                                        class="bi bi-calendar-week h-6 w-6" viewBox="0 0 16 16"> <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/> <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/> </svg>
                                    </div>
                                </a>
                                    
                            </li>
                            <!-- Profile menu -->
                            <li class="relative" x-data="{ open: false }" x-on:click.outside="open = false">
                                <button
                                    class="p-2 bg-white text-blue-500 align-middle rounded-full hover:text-white hover:bg-blue-500 focus:outline-none "
                                    x-on:click="open = !open" aria-label="Account"
                                    aria-haspopup="true">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </button>
                                    <ul x-show="open" x-transition.opacity
                                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-blue-500 border border-blue-500 rounded-md shadow-md"
                                        aria-label="submenu">
                                        
                                        <li class="flex">
                                            <form method="POST" class="text-white inline-flex items-center w-full py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link class="flex whitespace-nowrap hover:bg-white transition-colors duration-150 hover:text-gray-800" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                    </svg>
                                                    <span>{{ __('Cerrar sesión') }}</span>
                                                </x-dropdown-link>
                                            </form>
                                        </li>
                                    </ul>
                                    
                                        
                                        
                                    
                            </li>
                        </ul>
    
                    </div>
                    
                </header>

                <!-- component -->
                <!-- This is an example component -->
                <main>
                    <div>
                        
                        {{ $slot }}
                        
                    </div>
                </main>
                
            </div>
        </div>

        

        
        <script type="text/javascript" async>
            $('.boton-eliminar').submit( function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás recuperar esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(34 197 94 / var(--tw-text-opacity))',
                    cancelButtonColor: 'rgb(239 68 68 / var(--tw-text-opacity))',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
        <script>
            function data() {
            
                return {
                
                    isSideMenuOpen: false,
                    toggleSideMenu() {
                        this.isSideMenuOpen = !this.isSideMenuOpen
                    },
                    closeSideMenu() {
                        this.isSideMenuOpen = false
                    },
                    isNotificationsMenuOpen: false,
                    toggleNotificationsMenu() {
                        this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                    },
                    closeNotificationsMenu() {
                        this.isNotificationsMenuOpen = false
                    },
                    isProfileMenuOpen: false,
                    toggleProfileMenu() {
                        this.isProfileMenuOpen = !this.isProfileMenuOpen
                    },
                    closeProfileMenu() {
                        this.isProfileMenuOpen = false
                    },
                    isPagesMenuOpen: false,
                    togglePagesMenu() {
                        this.isPagesMenuOpen = !this.isPagesMenuOpen
                    },
                
                }
            }
        </script>
        <script>
            const setup = () => {
              return {
                loading: true,
                isSidebarOpen: false,
                toggleSidbarMenu() {
                  this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                isSearchBoxOpen: false,
              }
            }
        </script>
        
        

        @yield('scripts')
        
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>
