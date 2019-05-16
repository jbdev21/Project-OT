@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
    @if(is_desktop())
	
	  <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="box padding-sm">
                <div id="calendar_bernas"></div>
            </div>
        </div>
    </div>
    @else
        <div id="calendar_bernas"></div>
    @endif


@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <style type="text/css">
        #calendar_bernas h2{
            font-size: 28px;
            margin-top: 5px;
        }

         #calendar_bernas button{
            font-size: 12px;
         }

    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/ko.js"></script>
    <script>

        $(document).ready(function() {

            $('.select').select2();
            // page is now ready, initialize the calendar...
            var data = '<?php echo $class_sessions; ?>';
            var json = JSON.parse(data);
            $('#calendar_bernas').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                lang: 'ko',
                handleWindowResize: true,
                defaultDate: '{{date('Y-m-d')}}',

                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours


                events: json,

            })



        });
    </script>
@endsection
