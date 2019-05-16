<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                Class Code: {{$class->class_code}}
            </div>
            <div class="row">
                <div class="col-sm-3">
                        <h2 class="">{{$class->user->username}}</h2>
                        <div class="row">

                            <div class="col-xs-12">
                                <label>
                                    @if($class->user)
                                    {{$class->user->korean_name}}
                                    <br>
                                    {{$class->user->name}}
                                    <br>
                                  

                                </label>
                                <br>
                                
                                {{$class->user->email}}
                                  @endif

                            </div>


                        </div>

                    <hr>

                    <h5 class="">Class Information</h5>
                    <table class="table">
                        <tr>
                            <td>Teacher:</td>
                            <td>
                                @if($class->admin)
                                    {{$class->admin->name}}
                                @else
                                    <small style="color:Red"> No Teacher Assigned</small>
                                    <button class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack"></i> Assign</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Class Type:</td>
                            <td> {{$class->type}}</td>
                        </tr>
                        <tr>
                            <td>Class Days:</td>
                            <td>@foreach($class->day as $days){{$days->day_name}}<Br> @endforeach</td>
                        </tr>
                        <tr>
                            <td>Time:</td>
                            <td>{{date_formater('time_format', $class->time)}}</td>
                        </tr>
                        <tr>
                            <td>Minute per Class:</td>
                            <td>{{$class->minutes}}<small>mins.</small></td>
                        </tr>
                        <tr>

                            <td>Number of Months:</td>
                            <td>{{$class->num_months}} <small>mos.</small></td>
                        </tr>
                        <tr>
                            <td>Number of Session:</td>
                            <td>
                                {{count($class->classSession()->where('status','ready')->get())}} / {{$class->total_sessions}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-9">
                        <div id="calendar_bernas"></div>
                </div>


                </div>
            </div>
        </div>
    </div>


@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
@endsection

@section('scripts')


    <script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
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
                defaultDate: '{{date('Y-m-d')}}',

                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours


                events: json,

            })

            $('.edit-postponed').click(function(){
                var id = $(this).data('id');
                var datess = $(this).data('date');
                var reason = $(this).data('reason');
                var edit_deduction = $(this).data('deduction')
                $('#edit_reason').val(reason);
                $("#edit_id").val(id);
                $('#edit_date').val(datess);

                if(edit_deduction == 1){
                    $('#edit_credit_1').prop('checked', true);
                    $('#edit_deduction').val(1);
                }else{
                    $('#edit_credit_0').prop('checked', true);
                    $('#edit_deduction').val(0);
                }

                $('.add-postpone-div').hide();
                $('.edit-postpone-div').fadeIn();
            });

            $('.close-edit').click(function(){
                $('.add-postpone-div').fadeIn();
                $('.edit-postpone-div').hide();
            })

        });
    </script>
@endsection
