@extends('layouts.app2')

@section('content')
    <div class="content">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Cuadro que ocupa el 70% -->
                <div style="width: calc(70% - 20px); float: left; margin: 10px; background-color: #ccc;">
                    <h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
                    <div class="card">
                        <div class="card-header">
                            {{ trans('global.systemCalendar') }}
                        </div>

                        <div class="card-body">
                            <link rel='stylesheet'
                                href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

                            <div id='calendar'></div>


                        </div>
                    </div>
                </div>

                <!-- Cuadro que ocupa el 30% -->
                <div style="width: calc(30% - 20px); float: left; margin: 10px; background-color: #eee;">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <button type="button" onclick="alert('Cita Reservada')">Reservar Cita</button>
                        </div>
                    </div>
                </div>

                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
      $(document).ready(function () {
        // page is now ready, initialize the calendar...
        events ={!! json_encode($events) !!};
        $('#calendar').fullCalendar({
          // put your options and callbacks here
          events: events,
          defaultView: 'agendaWeek'
        })
      })
    </script>
@stop
{{-- @extends('layouts.app2') --}}

{{-- @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Inicio') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Cuadro que ocupa el 70% -->
            <div style="width: calc(70% - 20px); float: left; margin: 10px; background-color: #ccc;">

            </div>

            <!-- Cuadro que ocupa el 30% -->
            <div style="width: calc(30% - 20px); float: left; margin: 10px; background-color: #eee;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <button type="button" onclick="alert('Cita Reservada')">Reservar Cita</button>
                    </div>
                </div>
            </div>

            <div style="clear: both;"></div>
        </div>
    </div>
@endsection --}}
