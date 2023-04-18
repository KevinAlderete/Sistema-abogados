<x-admin-layout>    
  <style>
    .fc .fc-col-header-cell-cushion{
      text-transform: capitalize;
    }
    .fc .fc-toolbar.fc-header-toolbar{
      display: flex;
      flex-direction: column;
    }
    .fc .fc-toolbar-title{
      text-transform: uppercase;
      font-weight: bold;
      font-size: 1.5rem;
    }
    .fc .fc-button-group > .fc-button{
      background: rgba(59, 131, 246, 0.411);
      overflow: hidden;
      border-width: 1px;
      color: rgb(59, 130, 246);
      border-color: rgba(59, 131, 246, 0.3);
    }
    .fc .fc-button-group > .fc-button:hover{
      background: rgb(59, 130, 246);
      overflow: hidden;
      border-width: 1px;
      color: white;
      border-color: rgb(59, 130, 246);
    }
    .fc .fc-button-group > .fc-button:active{
      background: rgb(59, 130, 246);
      overflow: hidden;
      border-width: 1px;
      color: white;
      border-color: rgb(59, 130, 246);
    }
    .fc-direction-ltr .fc-button-group > .fc-button:not(:last-child){
      background: rgba(59, 131, 246, 0.411);
      overflow: hidden;
      border-width: 1px;
      color: rgb(59, 130, 246);
      border-color: rgba(59, 131, 246, 0.3);
    }

    .fc-direction-ltr .fc-button-group > .fc-button:not(:last-child):hover{
      background: rgb(59, 130, 246);
      overflow: hidden;
      border-width: 1px;
      color: white;
      border-color: rgb(59, 130, 246);
    }
    .fc-direction-ltr .fc-button-group > .fc-button:not(:last-child):active{
      background: rgb(59, 130, 246);
      overflow: hidden;
      border-width: 1px;
      color: white;
      border-color: rgb(59, 130, 246);
    }
    .fc .fc-button-primary:not(:disabled).fc-button-active, .fc .fc-button-primary:not(:disabled):active{
      background: rgb(59, 130, 246);
      overflow: hidden;
      border-width: 1px;
      color: white;
      border-color: rgb(59, 130, 246);
    }
    .fc .fc-button-primary:not(:disabled).fc-button-active:focus, .fc .fc-button-primary:not(:disabled):active:focus{
      box-shadow: none;
    }
    .fc-direction-ltr .fc-toolbar > * > :not(:first-child){
      background: rgb(59, 130, 246);
      overflow: hidden;
      border-width: 1px;
      border-color: rgb(59, 130, 246);
    }
    .fc .fc-daygrid-day-number{
      font-size: .7rem;
    }
    @media (min-width: 768px){
      .fc .fc-daygrid-day-number{
        font-size: 1rem;
      }
      .fc .fc-toolbar.fc-header-toolbar{
      flex-direction: row;
    }
    }

  </style>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg min-h-screen">
                <!-- component -->
              <div class="flex flex-col sm:flex-row justify-between px-5 pt-5">
                  <div class="py-2">
                      <!-- breadcrumb -->
                      <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg sm:mr-16">
                      <li class="text-sm leading-normal">
                          <a class="opacity-50" href="javascript:;">Agenda</a>
                      </li>
                      <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Calendario</li>
                    </ol>
                  </div>

                  <div class="flex gap-3 text-sm justify-center">
                    <a href="{{ route('agenda.actividad.create') }}" class="text-white font-bold px-3 py-2 overflow-hidden border border-blue-500 shadow-lg flex bg-blue-500 hover:bg-blue-700 rounded-3xl">
                      <span>Añadir actividad</span>
                    </a>
                    <a href="{{ route('agenda.actividadCaso.create') }}" class="text-white font-bold px-3 py-2 overflow-hidden border border-blue-500 shadow-lg flex bg-blue-500 hover:bg-blue-700 rounded-3xl">
                      <span>Añadir diligencia</span>
                    </a>
                    <a href="{{ route('agenda.actividadConciliacion.create') }}" class="text-white font-bold px-3 py-2 overflow-hidden border border-blue-500 shadow-lg flex bg-blue-500 hover:bg-blue-700 rounded-3xl">
                      <span>Reunión conciliación</span>
                    </a>
                  </div>
              </div>
              

              <div class="mx-5 flex justify-center">
                  <div class="w-full border border-slate-400 mt-3"></div>
              </div>    
              <div class="mx-5 flex flex-col sm:flex-row justify-end mt-5 gap-4 overflow-hidden rounded-lg border border-gray-300 bg-white shadow-md p-5">
                <div class="flex flex-row gap-2">
                  <div class="px-5 py-2 rounded-md bg-red-500"></div>
                  <span>Actividades</span>
                </div>
                <div class="flex flex-row gap-2">
                  <div class="px-5 py-2 rounded-md bg-green-500"></div>
                  <span>Diligencias</span>
                </div>
                <div class="flex flex-row gap-2">
                  <div class="px-5 py-2 rounded-md bg-blue-500"></div>
                  <span>Conciliaciones</span>
                </div>
                
              </div>  
              <div class="overflow-hidden rounded-lg border border-gray-300 bg-white shadow-md m-5 p-5">
                <div id="calendar">
            
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
               initialView: 'dayGridMonth',
               
               locales:'es',
               
               headerToolbar:{
                 left: 'prev,next today',
                 center: 'title',
                 right:'dayGridMonth,timeGridDay,listDay'
                }, 
             navLinks: true,
             selectable:true,
             selectMirror: true,
             dayMaxEvents: true,
     
             events: view,
             
             });
     
             calendar.render();
           });
        </script> 
        
      @endsection
</x-admin-layout>
