<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" id="fav" type="image/png" href="{{asset('allthat.ico')}}"/>
    <title>{{ setting('site_title', 'LMS') }}</title>
    <script>
      
      const userLogged = {!! Auth::user() !!}
      var tabNoti = 0;
      var site_title = "{{ setting('site_title', 'LMS') }}"
      var fav = "{{asset('allthat.ico')}}"
      function addtabNoti()
      {
        tabNoti++;
        document.title = "(" +  tabNoti + ") " + site_title
        document.getElementById('fav').href = "{{asset('allthat.ico')}}";
      }

      function removetabNoti()
      {
        document.title = site_title
        document.getElementById('fav').href = fav;
      }
    </script>
    <!-- Styles -->
  
    <link href="{{ asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{ asset('css/admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <style>
        .x_panel{
            font-size:1em;
        }

        .info-tr{
            border:2px solid #1abb9c !important;
        }

       
    </style>
    <style type="text/css">
      .times{
        margin-top:13px;
      }

      .times li iframe{
         position:relative;
         top:4px;
      }

      .times li{
        margin-right:20px;
      }

      [v-cloak]{
        display:none;
      }

    </style>
    <script type="text/javascript">
        const baseUrl = '{{url('/')}}'
    </script>

  </head>    
    <body>
    <div class="x_panel" id="app">
        <a class="btn btn-warning" href="{{route('admin.classer.show', $class->id)}}?modal=1"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
        <br>
        <div class="row">
            <div class="col col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body class-details" >

                    <h4>수강내역 </h4>
                        <form action="{{route('admin.classer.update', $class->id)}}" method="post" data-parsley-validate class="form-horizontal">
                            {{csrf_field()}}
                            {{method_field("PUT")}}
                            <input type="hidden" name="modal" value="1">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">영문이름 <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->user->name }}"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.student_korean_name') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->user->korean_name }}"class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">분  
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->minutes }}"class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">주간수업횟수 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->days_in_week }}"class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.duration') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $duration }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.sessions') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $total_sessions }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.payment_method') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-control input-md disabled" style="padding:0px 0px 0px 5px">
                                    @if($class->payment_method == "bank")
                                        <img src="{{ asset('image/icons/bank.png') }}" >
                                    @else
                                        <img src="{{ asset('image/icons/credit-card.png') }}">;
                                    @endif
                                    {{ number_format($class->payment_price) }}@lang('label.won')
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.class_type') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="type">
                                        @forelse($course_types as $type)
                                            <option 
                                            @if($class->type == $type->name) selected @endif value="{{$type->id}}">
                                            {{$type->name}}
                                        </option>
                                        @empty
                                            <option> no type</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.teacher') *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="teacher">
                                        @forelse($teachers as $teacher)
                                            <option 
                                            @if($class->admin_id == $teacher->id) selected @endif value="{{$teacher->id}}">
                                            {{$teacher->name}}
                                        </option>
                                        @empty
                                            <option> @lang('label.no_teacher')</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.class_status') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="status">
                                        <option 
                                            @if($class->status == "pending") selected @endif value="pending">
                                            @lang('label.pending')
                                        </option>
                                        <option 
                                            @if($class->status == "ongoing") selected @endif value="ongoing">
                                            @lang('label.ongoing')
                                        </option>
                                        <option 
                                            @if($class->status == "ended") selected @endif value="ended">
                                            @lang('label.ended')
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">@lang('button.save')</button>
                                    <button type="button" id="enrollmentbtn"  class="btn btn-success">수강신청</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="panel-body  class-enrollment" style="display:none">

                    <h4>@lang('label.enrollment') </h4>
                        <form action="{{route('admin.classer.reenoll', $class->id)}}" method="post" data-parsley-validate class="form-horizontal">
                            {{csrf_field()}}
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.class_code') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" readonly value="{{ $class->class_code }}" name="name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">영문이름 <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->user->name }}"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.student_korean_name') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->user->korean_name }}"class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">분  
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->minutes }}"class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">주간수업횟수 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $class->days_in_week }}"class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.duration') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $duration }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.sessions') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" value="{{ $total_sessions }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.payment_method') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-control input-md disabled" style="padding:0px 0px 0px 5px">
                                    @if($class->payment_method == "bank")
                                        <img src="{{ asset('image/icons/bank.png') }}" >
                                    @else
                                        <img src="{{ asset('image/icons/credit-card.png') }}">;
                                    @endif
                                    {{ number_format($class->payment_price) }}@lang('label.won')
                                    </div>
                                    
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.class_type') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="type" readonly>
                                        @forelse($course_types as $type)
                                            <option 
                                            @if($class->type == $type->name) selected @endif value="{{$type->id}}">
                                            {{$type->name}}
                                        </option>
                                        @empty
                                            <option> no type</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.teacher') *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="teacher" readonly>
                                        @forelse($teachers as $teacher)
                                            <option 
                                            @if($class->admin_id == $teacher->id) selected @endif value="{{$teacher->id}}">
                                            {{$teacher->name}}
                                        </option>
                                        @empty
                                            <option> @lang('label.no_teacher')</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.class_status') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="status">
                                        <option 
                                            @if($class->status == "pending") selected @endif value="pending">
                                            @lang('label.pending')
                                        </option>
                                        <option 
                                            @if($class->status == "ongoing") selected @endif value="ongoing">
                                            @lang('label.ongoing')
                                        </option>
                                        <option 
                                            @if($class->status == "ended") selected @endif value="ended">
                                            @lang('label.ended')
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">시작일자 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  type="date" name="start_date" value="{{ date('Y-m-d', strtotime($class->getLastSession()->date_time . " + 1days")) }}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.time') 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select type='text' name="time" class="form-control " required>
                                        <option value="6:00AM" @if($class->time == "06:00:00") selected @endif >6:00 AM</option>
                                        <option value="6:10AM" @if($class->time == "06:10:00") selected @endif >6:10 AM</option>
                                        <option value="6:20AM" @if($class->time == "06:20:00") selected @endif >6:20 AM</option>
                                        <option value="6:30AM" @if($class->time == "06:30:00") selected @endif >6:30 AM</option>
                                        <option value="6:40AM" @if($class->time == "06:40:00") selected @endif >6:40 AM</option>
                                        <option value="6:50AM" @if($class->time == "06:50:00") selected @endif >6:50 AM</option>
                                        <option value="7:00AM" @if($class->time == "07:00:00") selected @endif >7:00 AM</option>
                                        <option value="7:10AM" @if($class->time == "07:10:00") selected @endif >7:10 AM</option>
                                        <option value="7:20AM" @if($class->time == "07:20:00") selected @endif >7:20 AM</option>
                                        <option value="7:30AM" @if($class->time == "07:30:00") selected @endif >7:30 AM</option>
                                        <option value="7:40AM" @if($class->time == "07:40:00") selected @endif >7:40 AM</option>
                                        <option value="7:50AM" @if($class->time == "07:50:00") selected @endif >7:50 AM</option>
                                        <option value="8:00AM" @if($class->time == "08:00:00") selected @endif >8:00 AM</option>
                                        <option value="8:10AM" @if($class->time == "08:10:00") selected @endif >8:10 AM</option>
                                        <option value="8:20AM" @if($class->time == "08:20:00") selected @endif >8:20 AM</option>
                                        <option value="8:30AM" @if($class->time == "08:30:00") selected @endif >8:30 AM</option>
                                        <option value="8:40AM" @if($class->time == "08:40:00") selected @endif >8:40 AM</option>
                                        <option value="8:50AM" @if($class->time == "08:50:00") selected @endif >8:50 AM</option>
                                        <option value="9:00AM" @if($class->time == "09:00:00") selected @endif >9:00 AM</option>
                                        <option value="9:10AM" @if($class->time == "09:10:00") selected @endif >9:10 AM</option>
                                        <option value="9:20AM" @if($class->time == "09:20:00") selected @endif >9:20 AM</option>
                                        <option value="9:30AM" @if($class->time == "09:30:00") selected @endif >9:30 AM</option>
                                        <option value="9:40AM" @if($class->time == "09:40:00") selected @endif >9:40 AM</option>
                                        <option value="9:50AM" @if($class->time == "09:50:00") selected @endif >9:50 AM</option>
                                        <option value="10:00AM" @if($class->time == "10:00:00") selected @endif >10:00 AM</option>
                                        <option value="10:10AM" @if($class->time == "10:10:00") selected @endif >10:10 AM</option>
                                        <option value="10:20AM" @if($class->time == "10:20:00") selected @endif >10:20 AM</option>
                                        <option value="10:30AM" @if($class->time == "10:30:00") selected @endif >10:30 AM</option>
                                        <option value="10:40AM" @if($class->time == "10:40:00") selected @endif >10:40 AM</option>
                                        <option value="10:50AM" @if($class->time == "10:50:00") selected @endif >10:50 AM</option>
                                        <option value="11:00AM" @if($class->time == "11:00:00") selected @endif >11:00 AM</option>
                                        <option value="11:10AM" @if($class->time == "11:10:00") selected @endif >11:10 AM</option>
                                        <option value="11:20AM" @if($class->time == "11:20:00") selected @endif >11:20 AM</option>
                                        <option value="11:30AM" @if($class->time == "11:30:00") selected @endif >11:30 AM</option>
                                        <option value="11:40AM" @if($class->time == "11:40:00") selected @endif >11:40 AM</option>
                                        <option value="11:50AM" @if($class->time == "11:50:00") selected @endif >11:50 AM</option>
                                        <option value="12:00AM" @if($class->time == "12:00:00") selected @endif >12:00 AM</option>
                                        <option value="12:10PM" @if($class->time == "12:10:00") selected @endif >12:10 PM</option>
                                        <option value="12:20PM" @if($class->time == "12:20:00") selected @endif >12:20 PM</option>
                                        <option value="12:30PM" @if($class->time == "12:30:00") selected @endif >12:30 PM</option>
                                        <option value="12:40PM" @if($class->time == "12:40:00") selected @endif >12:40 PM</option>
                                        <option value="12:50PM" @if($class->time == "12:50:00") selected @endif >12:50 PM</option>
                                        <option value="01:00PM" @if($class->time == "13:00:00") selected @endif >01:00 PM</option>
                                        <option value="01:10PM" @if($class->time == "13:10:00") selected @endif >01:10 PM</option>
                                        <option value="01:20PM" @if($class->time == "13:20:00") selected @endif >01:20 PM</option>
                                        <option value="01:30PM" @if($class->time == "13:30:00") selected @endif >01:30 PM</option>
                                        <option value="01:40PM" @if($class->time == "13:40:00") selected @endif >01:40 PM</option>
                                        <option value="01:50PM" @if($class->time == "13:50:00") selected @endif >01:50 PM</option>
                                        <option value="02:00PM" @if($class->time == "14:00:00") selected @endif >02:00 PM</option>
                                        <option value="02:10PM" @if($class->time == "14:10:00") selected @endif >02:10 PM</option>
                                        <option value="02:20PM" @if($class->time == "14:20:00") selected @endif >02:20 PM</option>
                                        <option value="02:30PM" @if($class->time == "14:30:00") selected @endif >02:30 PM</option>
                                        <option value="02:40PM" @if($class->time == "14:40:00") selected @endif >02:40 PM</option>
                                        <option value="02:50PM" @if($class->time == "14:50:00") selected @endif >02:50 PM</option>
                                        <option value="03:00PM" @if($class->time == "15:00:00") selected @endif >03:00 PM</option>
                                        <option value="03:10PM" @if($class->time == "15:10:00") selected @endif >03:10 PM</option>
                                        <option value="03:20PM" @if($class->time == "15:20:00") selected @endif >03:20 PM</option>
                                        <option value="03:30PM" @if($class->time == "15:30:00") selected @endif >03:30 PM</option>
                                        <option value="03:40PM" @if($class->time == "15:40:00") selected @endif >03:40 PM</option>
                                        <option value="03:50PM" @if($class->time == "15:50:00") selected @endif >03:50 PM</option>
                                        <option value="04:00PM" @if($class->time == "16:00:00") selected @endif >04:00 PM</option>
                                        <option value="04:10PM" @if($class->time == "16:10:00") selected @endif >04:10 PM</option>
                                        <option value="04:20PM" @if($class->time == "16:20:00") selected @endif >04:20 PM</option>
                                        <option value="04:30PM" @if($class->time == "16:30:00") selected @endif >04:30 PM</option>
                                        <option value="04:40PM" @if($class->time == "16:40:00") selected @endif >04:40 PM</option>
                                        <option value="04:50PM" @if($class->time == "16:50:00") selected @endif >04:50 PM</option>
                                        <option value="05:00PM" @if($class->time == "17:00:00") selected @endif >05:00 PM</option>
                                        <option value="05:10PM" @if($class->time == "17:10:00") selected @endif >05:10 PM</option>
                                        <option value="05:20PM" @if($class->time == "17:20:00") selected @endif >05:20 PM</option>
                                        <option value="05:30PM" @if($class->time == "17:30:00") selected @endif >05:30 PM</option>
                                        <option value="05:40PM" @if($class->time == "17:40:00") selected @endif >05:40 PM</option>
                                        <option value="05:50PM" @if($class->time == "17:50:00") selected @endif >05:50 PM</option>
                                        <option value="06:00PM" @if($class->time == "18:00:00") selected @endif >06:00 PM</option>
                                        <option value="06:10PM" @if($class->time == "18:10:00") selected @endif >06:10 PM</option>
                                        <option value="06:20PM" @if($class->time == "18:20:00") selected @endif >06:20 PM</option>
                                        <option value="06:30PM" @if($class->time == "18:30:00") selected @endif >06:30 PM</option>
                                        <option value="06:40PM" @if($class->time == "18:40:00") selected @endif >06:40 PM</option>
                                        <option value="06:50PM" @if($class->time == "18:50:00") selected @endif >06:50 PM</option>
                                        <option value="07:00PM" @if($class->time == "19:00:00") selected @endif >07:00 PM</option>
                                        <option value="07:10PM" @if($class->time == "19:10:00") selected @endif >07:10 PM</option>
                                        <option value="07:20PM" @if($class->time == "19:20:00") selected @endif >07:20 PM</option>
                                        <option value="07:30PM" @if($class->time == "19:30:00") selected @endif >07:30 PM</option>
                                        <option value="07:40PM" @if($class->time == "19:40:00") selected @endif >07:40 PM</option>
                                        <option value="07:50PM" @if($class->time == "19:50:00") selected @endif >07:50 PM</option>
                                        <option value="08:00PM" @if($class->time == "20:00:00") selected @endif >08:00 PM</option>
                                        <option value="08:10PM" @if($class->time == "20:10:00") selected @endif >08:10 PM</option>
                                        <option value="08:20PM" @if($class->time == "20:20:00") selected @endif >08:20 PM</option>
                                        <option value="08:30PM" @if($class->time == "20:30:00") selected @endif >08:30 PM</option>
                                        <option value="08:40PM" @if($class->time == "20:40:00") selected @endif >08:40 PM</option>
                                        <option value="08:50PM" @if($class->time == "20:50:00") selected @endif >08:50 PM</option>
                                        <option value="09:00PM" @if($class->time == "21:00:00") selected @endif >09:00 PM</option>
                                        <option value="09:10PM" @if($class->time == "21:10:00") selected @endif >09:10 PM</option>
                                        <option value="09:20PM" @if($class->time == "21:20:00") selected @endif >09:20 PM</option>
                                        <option value="09:30PM" @if($class->time == "21:30:00") selected @endif >09:30 PM</option>
                                        <option value="09:40PM" @if($class->time == "21:40:00") selected @endif >09:40 PM</option>
                                        <option value="09:50PM" @if($class->time == "21:50:00") selected @endif >09:50 PM</option>
                                        <option value="10:00PM" @if($class->time == "22:00:00") selected @endif >10:00 PM</option>
                                        <option value="10:10PM" @if($class->time == "22:10:00") selected @endif >10:10 PM</option>
                                        <option value="10:20PM" @if($class->time == "22:20:00") selected @endif >10:20 PM</option>
                                        <option value="10:30PM" @if($class->time == "22:30:00") selected @endif >10:30 PM</option>
                                        <option value="10:40PM" @if($class->time == "22:40:00") selected @endif >10:40 PM</option>
                                        <option value="10:50PM" @if($class->time == "22:50:00") selected @endif >10:50 PM</option>
                                        <option value="11:00PM" @if($class->time == "23:00:00") selected @endif >11:00 PM</option>
                                        <option value="11:10PM" @if($class->time == "23:10:00") selected @endif >11:10 PM</option>
                                        <option value="11:20PM" @if($class->time == "23:20:00") selected @endif >11:20 PM</option>
                                        <option value="11:30PM" @if($class->time == "23:30:00") selected @endif >11:30 PM</option>
                                        <option value="11:40PM" @if($class->time == "23:40:00") selected @endif >11:40 PM</option>
                                        <option value="11:50PM" @if($class->time == "23:50:00") selected @endif >11:50 PM</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">@lang('button.save')</button>
                                    <button type="button" id="enrollmentCancelbtn" class="btn btn-warning">@lang('button.cancel')</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
            <div class="col col-sm-6 other-form">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <h4 class="header">수강시간 </h4 class="header">
                        <form action="{{ route('admin.classer.changetime', $class->id) }}" method="post"> 
                            {{ csrf_field() }}  
                            <label for="first-name">@lang('label.time') <span class="required">*</span></label> 
                            <select type='text' name="time" class="form-control">
                                <option value="6:00AM" @if($class->time == "06:00:00") selected @endif >6:00 AM</option>
                                <option value="6:10AM" @if($class->time == "06:10:00") selected @endif >6:10 AM</option>
                                <option value="6:20AM" @if($class->time == "06:20:00") selected @endif >6:20 AM</option>
                                <option value="6:30AM" @if($class->time == "06:30:00") selected @endif >6:30 AM</option>
                                <option value="6:40AM" @if($class->time == "06:40:00") selected @endif >6:40 AM</option>
                                <option value="6:50AM" @if($class->time == "06:50:00") selected @endif >6:50 AM</option>
                                <option value="7:00AM" @if($class->time == "07:00:00") selected @endif >7:00 AM</option>
                                <option value="7:10AM" @if($class->time == "07:10:00") selected @endif >7:10 AM</option>
                                <option value="7:20AM" @if($class->time == "07:20:00") selected @endif >7:20 AM</option>
                                <option value="7:30AM" @if($class->time == "07:30:00") selected @endif >7:30 AM</option>
                                <option value="7:40AM" @if($class->time == "07:40:00") selected @endif >7:40 AM</option>
                                <option value="7:50AM" @if($class->time == "07:50:00") selected @endif >7:50 AM</option>
                                <option value="8:00AM" @if($class->time == "08:00:00") selected @endif >8:00 AM</option>
                                <option value="8:10AM" @if($class->time == "08:10:00") selected @endif >8:10 AM</option>
                                <option value="8:20AM" @if($class->time == "08:20:00") selected @endif >8:20 AM</option>
                                <option value="8:30AM" @if($class->time == "08:30:00") selected @endif >8:30 AM</option>
                                <option value="8:40AM" @if($class->time == "08:40:00") selected @endif >8:40 AM</option>
                                <option value="8:50AM" @if($class->time == "08:50:00") selected @endif >8:50 AM</option>
                                <option value="9:00AM" @if($class->time == "09:00:00") selected @endif >9:00 AM</option>
                                <option value="9:10AM" @if($class->time == "09:10:00") selected @endif >9:10 AM</option>
                                <option value="9:20AM" @if($class->time == "09:20:00") selected @endif >9:20 AM</option>
                                <option value="9:30AM" @if($class->time == "09:30:00") selected @endif >9:30 AM</option>
                                <option value="9:40AM" @if($class->time == "09:40:00") selected @endif >9:40 AM</option>
                                <option value="9:50AM" @if($class->time == "09:50:00") selected @endif >9:50 AM</option>
                                <option value="10:00AM" @if($class->time == "10:00:00") selected @endif >10:00 AM</option>
                                <option value="10:10AM" @if($class->time == "10:10:00") selected @endif >10:10 AM</option>
                                <option value="10:20AM" @if($class->time == "10:20:00") selected @endif >10:20 AM</option>
                                <option value="10:30AM" @if($class->time == "10:30:00") selected @endif >10:30 AM</option>
                                <option value="10:40AM" @if($class->time == "10:40:00") selected @endif >10:40 AM</option>
                                <option value="10:50AM" @if($class->time == "10:50:00") selected @endif >10:50 AM</option>
                                <option value="11:00AM" @if($class->time == "11:00:00") selected @endif >11:00 AM</option>
                                <option value="11:10AM" @if($class->time == "11:10:00") selected @endif >11:10 AM</option>
                                <option value="11:20AM" @if($class->time == "11:20:00") selected @endif >11:20 AM</option>
                                <option value="11:30AM" @if($class->time == "11:30:00") selected @endif >11:30 AM</option>
                                <option value="11:40AM" @if($class->time == "11:40:00") selected @endif >11:40 AM</option>
                                <option value="11:50AM" @if($class->time == "11:50:00") selected @endif >11:50 AM</option>
                                <option value="12:00AM" @if($class->time == "12:00:00") selected @endif >12:00 AM</option>
                                <option value="12:10PM" @if($class->time == "12:10:00") selected @endif >12:10 PM</option>
                                <option value="12:20PM" @if($class->time == "12:20:00") selected @endif >12:20 PM</option>
                                <option value="12:30PM" @if($class->time == "12:30:00") selected @endif >12:30 PM</option>
                                <option value="12:40PM" @if($class->time == "12:40:00") selected @endif >12:40 PM</option>
                                <option value="12:50PM" @if($class->time == "12:50:00") selected @endif >12:50 PM</option>
                                <option value="01:00PM" @if($class->time == "13:00:00") selected @endif >01:00 PM</option>
                                <option value="01:10PM" @if($class->time == "13:10:00") selected @endif >01:10 PM</option>
                                <option value="01:20PM" @if($class->time == "13:20:00") selected @endif >01:20 PM</option>
                                <option value="01:30PM" @if($class->time == "13:30:00") selected @endif >01:30 PM</option>
                                <option value="01:40PM" @if($class->time == "13:40:00") selected @endif >01:40 PM</option>
                                <option value="01:50PM" @if($class->time == "13:50:00") selected @endif >01:50 PM</option>
                                <option value="02:00PM" @if($class->time == "14:00:00") selected @endif >02:00 PM</option>
                                <option value="02:10PM" @if($class->time == "14:10:00") selected @endif >02:10 PM</option>
                                <option value="02:20PM" @if($class->time == "14:20:00") selected @endif >02:20 PM</option>
                                <option value="02:30PM" @if($class->time == "14:30:00") selected @endif >02:30 PM</option>
                                <option value="02:40PM" @if($class->time == "14:40:00") selected @endif >02:40 PM</option>
                                <option value="02:50PM" @if($class->time == "14:50:00") selected @endif >02:50 PM</option>
                                <option value="03:00PM" @if($class->time == "15:00:00") selected @endif >03:00 PM</option>
                                <option value="03:10PM" @if($class->time == "15:10:00") selected @endif >03:10 PM</option>
                                <option value="03:20PM" @if($class->time == "15:20:00") selected @endif >03:20 PM</option>
                                <option value="03:30PM" @if($class->time == "15:30:00") selected @endif >03:30 PM</option>
                                <option value="03:40PM" @if($class->time == "15:40:00") selected @endif >03:40 PM</option>
                                <option value="03:50PM" @if($class->time == "15:50:00") selected @endif >03:50 PM</option>
                                <option value="04:00PM" @if($class->time == "16:00:00") selected @endif >04:00 PM</option>
                                <option value="04:10PM" @if($class->time == "16:10:00") selected @endif >04:10 PM</option>
                                <option value="04:20PM" @if($class->time == "16:20:00") selected @endif >04:20 PM</option>
                                <option value="04:30PM" @if($class->time == "16:30:00") selected @endif >04:30 PM</option>
                                <option value="04:40PM" @if($class->time == "16:40:00") selected @endif >04:40 PM</option>
                                <option value="04:50PM" @if($class->time == "16:50:00") selected @endif >04:50 PM</option>
                                <option value="05:00PM" @if($class->time == "17:00:00") selected @endif >05:00 PM</option>
                                <option value="05:10PM" @if($class->time == "17:10:00") selected @endif >05:10 PM</option>
                                <option value="05:20PM" @if($class->time == "17:20:00") selected @endif >05:20 PM</option>
                                <option value="05:30PM" @if($class->time == "17:30:00") selected @endif >05:30 PM</option>
                                <option value="05:40PM" @if($class->time == "17:40:00") selected @endif >05:40 PM</option>
                                <option value="05:50PM" @if($class->time == "17:50:00") selected @endif >05:50 PM</option>
                                <option value="06:00PM" @if($class->time == "18:00:00") selected @endif >06:00 PM</option>
                                <option value="06:10PM" @if($class->time == "18:10:00") selected @endif >06:10 PM</option>
                                <option value="06:20PM" @if($class->time == "18:20:00") selected @endif >06:20 PM</option>
                                <option value="06:30PM" @if($class->time == "18:30:00") selected @endif >06:30 PM</option>
                                <option value="06:40PM" @if($class->time == "18:40:00") selected @endif >06:40 PM</option>
                                <option value="06:50PM" @if($class->time == "18:50:00") selected @endif >06:50 PM</option>
                                <option value="07:00PM" @if($class->time == "19:00:00") selected @endif >07:00 PM</option>
                                <option value="07:10PM" @if($class->time == "19:10:00") selected @endif >07:10 PM</option>
                                <option value="07:20PM" @if($class->time == "19:20:00") selected @endif >07:20 PM</option>
                                <option value="07:30PM" @if($class->time == "19:30:00") selected @endif >07:30 PM</option>
                                <option value="07:40PM" @if($class->time == "19:40:00") selected @endif >07:40 PM</option>
                                <option value="07:50PM" @if($class->time == "19:50:00") selected @endif >07:50 PM</option>
                                <option value="08:00PM" @if($class->time == "20:00:00") selected @endif >08:00 PM</option>
                                <option value="08:10PM" @if($class->time == "20:10:00") selected @endif >08:10 PM</option>
                                <option value="08:20PM" @if($class->time == "20:20:00") selected @endif >08:20 PM</option>
                                <option value="08:30PM" @if($class->time == "20:30:00") selected @endif >08:30 PM</option>
                                <option value="08:40PM" @if($class->time == "20:40:00") selected @endif >08:40 PM</option>
                                <option value="08:50PM" @if($class->time == "20:50:00") selected @endif >08:50 PM</option>
                                <option value="09:00PM" @if($class->time == "21:00:00") selected @endif >09:00 PM</option>
                                <option value="09:10PM" @if($class->time == "21:10:00") selected @endif >09:10 PM</option>
                                <option value="09:20PM" @if($class->time == "21:20:00") selected @endif >09:20 PM</option>
                                <option value="09:30PM" @if($class->time == "21:30:00") selected @endif >09:30 PM</option>
                                <option value="09:40PM" @if($class->time == "21:40:00") selected @endif >09:40 PM</option>
                                <option value="09:50PM" @if($class->time == "21:50:00") selected @endif >09:50 PM</option>
                                <option value="10:00PM" @if($class->time == "22:00:00") selected @endif >10:00 PM</option>
                                <option value="10:10PM" @if($class->time == "22:10:00") selected @endif >10:10 PM</option>
                                <option value="10:20PM" @if($class->time == "22:20:00") selected @endif >10:20 PM</option>
                                <option value="10:30PM" @if($class->time == "22:30:00") selected @endif >10:30 PM</option>
                                <option value="10:40PM" @if($class->time == "22:40:00") selected @endif >10:40 PM</option>
                                <option value="10:50PM" @if($class->time == "22:50:00") selected @endif >10:50 PM</option>
                                <option value="11:00PM" @if($class->time == "23:00:00") selected @endif >11:00 PM</option>
                                <option value="11:10PM" @if($class->time == "23:10:00") selected @endif >11:10 PM</option>
                                <option value="11:20PM" @if($class->time == "23:20:00") selected @endif >11:20 PM</option>
                                <option value="11:30PM" @if($class->time == "23:30:00") selected @endif >11:30 PM</option>
                                <option value="11:40PM" @if($class->time == "23:40:00") selected @endif >11:40 PM</option>
                                <option value="11:50PM" @if($class->time == "23:50:00") selected @endif >11:50 PM</option>
                            </select>
                            
                            <br>
                            <label for="first-name">@lang('label.affected_date') <span class="required">*</span></label> 
                            <input class="form-control" type="date" name="efffected_date" value="{{ date('Y-m-d') }}"> 
                            <br>
                            <button class="btn btn-success"> @lang('button.save')</button>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="header">수강기간</h4>
                            <form action="{{ route('admin.classer.changestartdate', $class->id) }}" method="post"> 
                                {{ csrf_field() }}  
                                <label for="first-name">@lang('label.affected_date') <span class="required">*</span></label> 
                                <input class="form-control" type="date" name="start_date" value="{{ $class->start_date }}"> 
                                <br>
                                <label><input name="only_remaining" type="checkbox"> @lang('label.apply_only_for_remaining_class')</label>
                                <br>
                                <br>
                                <button class="btn btn-success"> @lang('button.save')</button>
                            </form>
                    </div>
                </div>
                    <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="header">@lang('label.days')</h4>
                            <form action="{{ route('admin.classer.changeDays', $class->id) }}" method="post"> 
                                {{ csrf_field() }}  
                                <label>@lang('label.select_days')</label>
                                <br>
                                
                                @foreach($days as $day)
                                    <input type="checkbox" name="days[]" @if(in_array($day->day_number, $class_day->toArray())) checked  @endif  class="single-checkbox day-{{ $day->day_number }}" value="{{$day->id}}" id="{{$day->day_name}}" >
                                        <label for="{{$day->day_name}}">
                                        @lang('label.'. strtolower(str_limit($day->day_name,3, ''))) 
                                        </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                @endforeach
                                <br>
                                <br>
                                <label for="first-name">@lang('label.affected_date') <span class="required">*</span></label> 
                                <input class="form-control" type="date" name="affected_date" value="{{ date('Y-m-d') }}"> 
                                <br>
                                <button  class="btn btn-success"> @lang('button.save')</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/tinymce-lang/ko_KR.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    <script src="/js/lang.js"></script>

    <script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".single-checkbox").not(":checked").attr("disabled", true);

           
            $('#enrollmentbtn').click(function(){
                $('.class-details').hide();
                $('.class-enrollment').show()
                $('.other-form').hide();
            })

            $('#enrollmentCancelbtn').click(function(){
                 $('.class-details').show();
                $('.class-enrollment').hide()
                $('.other-form').show();
            })
            
            $(".single-checkbox").click(function() {
                var limit = {{ $class->days_in_week }}
                var bol = $(".single-checkbox:checked").length >= limit;
                $(".single-checkbox").not(":checked").attr("disabled",bol);
            });

        })
    </script>
    <body>
</html>