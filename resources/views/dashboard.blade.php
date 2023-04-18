<x-admin-layout>
<style>
            .fc-list-table tbody {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
            .fc .fc-list-table tr > * {
                border: none;
                width: 100%;
            }
            .fc-list-event-graphic{
                display: none;
            }

            .fc-list-event {
                background-color: #105267;
                display: flex;
                flex-direction: column;
                border-radius: 20px;
                align-items: center;
                align-self: center;
                text-align: center;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
                width: 160px;
                height: 130px;

            }
            
            .fc-list-event-time{
                font-weight: bold;
                color: #fff;
                font-size: 1.3rem;
            }
            .fc .fc-list-table tbody > tr:first-child th {
                background: none;
                align-items: center;
                
            }
            .fc .fc-list-table tbody > tr:first-child {
                align-self: center;
                
            }
            .fc .fc-list-table tbody > tr:first-child th div {
                background: none;
                font-weight: normal;
                display: flex;
                flex-direction: column;
                text-transform: uppercase;
                
            }

            .fc .fc-list-table tbody > tr:first-child th div::before {
                content: 'ACTIVIDADES';
                font-weight: bold;
            }
            .fc .fc-list-event-title a{
                color: #fff;
            }
            .fc .fc-view-harness-active > .fc-view{
                padding: 10px 0;
                height: 170px;
                border: none;
            }
            .fc .fc-scroller-liquid{
                overflow: scroll !important;
            }
            .fc .fc-scroller-liquid::-webkit-scrollbar {
                height: 8px;
                background: rgb(255, 255, 255);
            }
            .fc .fc-scroller-liquid::-webkit-scrollbar-thumb {
                background: rgba(90, 89, 89, 0.5);
                border-radius: 10px;
            }
            .fc-toolbar-chunk:first-child{
                text-transform: uppercase;
                font-size: .7rem;
            }
            .fc-liquid-hack .fc-toolbar-ltr:first-child{
                margin-bottom: .5em !important;
            }
            .fc .fc-list-event:hover td{
                background: none;
            }
            @media (min-width: 640px) {
                .fc-list-table tbody {
                    flex-direction: row;
                }
            }
            
</style>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 text-black-900 dark:text-black-100 space-y-4">
                <div class="w-full flex flex-col gap-4">
                    <div class="bg-white rounded-lg p-4 flex flex-col sm:grid sm:grid-cols-2 gap-4 xl:grid-cols-4 border border-gray-300 shadow-md">
                        <div class="bg-[#105267] text-white rounded-2xl p-5 flex flex-row justify-between">
                            <div class="flex flex-col gap-1">
                                <span class="text-lg">Clientes</span>
                                <span class="font-bold text-2xl">{{ $clientes }}</span>
                                <a href="{{ route('clientes.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 flex p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                    fill="currentColor" class="self-center text-white bi bi-people h-9 w-9 " viewBox="0 0 16 16"> 
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/> 
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="bg-[#105267] text-white rounded-2xl p-5 flex flex-row justify-between">
                            <div class="flex flex-col gap-1">
                                <span class="text-lg">Conciliaciones</span>
                                <span class="font-bold text-2xl">{{ $expedientes }}</span>
                                <a href="{{ route('conciliacion.expediente.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 flex p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                    fill="currentColor" class="bi bi-journal h-9 w-9 self-center text-white" viewBox="0 0 16 16"> <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/> <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/> </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#105267] text-white rounded-2xl p-5 flex flex-row justify-between">
                            <div class="flex flex-col gap-1">
                                <span class="text-lg">Casos</span>
                                <span class="font-bold text-2xl">{{ $casos }}</span>
                                <a href="{{ route('caso.caso.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 flex p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                    fill="currentColor" class="bi bi-journals h-9 w-9 self-center text-white" viewBox="0 0 16 16"> <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/> <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/> </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#105267] text-white rounded-2xl p-5 flex flex-row justify-between">
                            <div class="flex flex-col gap-1">
                                <span class="text-lg">Usuarios</span>
                                <span class="font-bold text-2xl">{{ $usuarios }}</span>
                                <a href="{{ route('admin.users.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-green-500 flex p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                    fill="currentColor" class="bi bi-person-circle h-9 w-9 self-center text-white" viewBox="0 0 16 16"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/> </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full overflow-hidden rounded-lg border bg-white border-gray-300 shadow-md p-4 ">
                    
                        <div id="calendar">
                
                        </div>
                    </div>
                    
                </div>
                <div class="flex flex-col lg:grid lg:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-4">
                        <div class="overflow-hidden rounded-lg border border-gray-300 bg-white shadow-md p-4">
                            <canvas id="myChartLine"></canvas>
                        </div>
                        <div class="overflow-hidden rounded-lg border border-gray-300 bg-white shadow-md p-4">
                            <canvas id="myChartLine2"></canvas>
                        </div>
                    </div>
                    <div class="overflow-hidden rounded-lg border border-gray-300 bg-white shadow-md p-4">
                        <canvas id="myChart"></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
          <script>
          document.addEventListener('DOMContentLoaded', function() {
            var view = @json($events);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 200,
                locales:'es',
                initialView: 'listDay',
                headerToolbar:{
                    right:''
                }, 
                events: view 
            });
     
             calendar.render();
           });
        </script> 

        <script>
            const ctx = document.getElementById('myChart');
        
            new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Hombres', 'Mujeres'],
                datasets: [{
                    data: [{{$clientesM}}, {{$clientesF}}],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Clientes x Genero'
                }
                }
            }
            });
        </script>
        <script>
            var labels =  {{ Js::from($labels) }};
           
            var countExpedientes =  {{ Js::from($data) }};
            
            const line = document.getElementById('myChartLine');
            

            new Chart(line, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'N° de conciliaciones',
                        data: countExpedientes,
                        borderWidth: 2,
                        borderColor: 'rgba(34, 197, 94)',
                        backgroundColor: 'rgba(34, 197, 94, 0.315)',
                        fill: true
                    }
                ],
                },
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Resumen de Conciliaciones'
                    }
                    }
                },
            });
        </script>
        <script>
            
            var labels1 =  {{ Js::from($labels1) }};
            var countCaso =  {{ Js::from($data2) }};
            const line2 = document.getElementById('myChartLine2');

            new Chart(line2, {
                type: 'line',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'N° de casos',
                        data: countCaso,
                        borderWidth: 2,
                        borderColor: '#105267',
                        backgroundColor: '#10536746',
                        fill: true
                    }
                ],
                },
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Resumen de Casos'
                    }
                    }
                },
            });
        </script>
      @endsection
</x-admin-layout>