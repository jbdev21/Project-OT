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
    {{-- <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                <table class="table">
                    <tr>
                        <th rowspan="2" width="10%">
                           <a class="btn btn-success btn-block" href="{{ route('admin.classer.edit', $class->id) }}?modal=1"><i class="fa fa-eye"></i> 수강변경</a>
                        </th>
                        <th>@lang('label.username')</th>
                        <th>@lang('label.korean_name')</th>
                        <th>@lang('label.english_name')</th>
                        <th>@lang('label.contact_number')</th>
                        <th>@lang('label.class_type')</th>
                        <th>@lang('label.time')</th>
                        <th>@lang('label.min')</th>
                        <th>@lang('label.days')</th>
                        <th>@lang('label.teacher')</th>
                        <th>@lang('label.duration')</th>
                        <th>@lang('label.number_of_sessions')</th>
                        <th>@lang('label.price')</th>
                        <th>@lang('label.payment_method')</th>
                        @if($class->note)
                        <th></th>
                        @endif
                    </tr>
                    <tr>
                        <td>{{ $class->user->username }}</td>
                        <td>{{$class->user->korean_name}}</td>
                        <td>{{$class->user->name}}</td>
                        <td>
                            {{$class->user->contact_number}}
                            @if($class->user->contact_number1)
                            <br>     {{$class->user->contact_number1}}
                            @endif
                        </td>
                        <td>{{$class->type}}</td>
                        <td>{{date_formater('time_format', $class->time)}}</td>
                        <td>{{ $class->minutes }}@lang('label.min')</td>
                        <td>
                            @foreach($class->day as $days) @lang('label.'. strtolower(str_limit($days->day_name, 3, ""))), @endforeach
                        </td>
                        <td>
                            @if($class->admin)
                                {{$class->admin->name}}
                            @else
                                <small style="color:Red"> @lang('label.no_teacher_assigned') </small> 
                                <a href="{{ route('admin.classer.edit', $class->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack"></i> @lang('button.assign')</a>
                            @endif
                        </td>
                        <td>
                            @php
                            if($class->getFirstSession())
                            {
                                $first_session = $class->getFirstSession();
                                $last_session = $class->getLastSession();
                                echo date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
                            }
                            @endphp
                        </td>
                        <td>
                            @if($class->classSession)
                                @php
                                    $total = count($class->getRemainingSession()) ? count($class->getRemainingSession()) : "<span style='color:red'>". count($class->getRemainingSession()) ."</span>" ;
                                    $total .= '/' . $class->classSession()->where('status', '!=', 'postponed')->count();
                                    echo  $total;
                                @endphp
                            @endif
                        </td>
                        <td>
                            {{  number_format($class->payment_price) }}@lang('label.won')
                        </td>
                        <td align="center">
                            @if($class->payment_method == "bank") <img class="img-responsive" src="{{ asset('image/icons/bank.png') }}"> @else <img class="img-responsive" src="{{ asset('image/icons/credit-card.png') }}"> @endif
                        </td>
                        @if($class->note)
                        <td>
                            <a tabindex="0" data-placement="left" class="btn btn-xs btn-default"  role="button" data-toggle="popover" data-trigger="focus" title="@lang('label.note')" data-content="{!! $class->note !!}" data-html="true">?</a>
                        </td>
                        @endif
                    </tr>
                </table>
          
                <class-show  classtype="{{ $class->type }}"   classid="{{$class->id}}" postponed_credits="{{ $class->postponed_credits }}" today="{{ Request::get('session') }}" rangedefault="@if($class->getLastSession()) {{ date('m/d/Y') }} - {{ date('m/d/Y', strtotime($class->getLastSession()->date_time)) }} @endif" defaultsession="{{ Request::get('session') }}" bookid="{{ $class->book_id }}" studentid="{{ $class->user_id }}" ></class-show>
           
        </div>
      
    </div>
    
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/tinymce-lang/ko_KR.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    <script src="/js/lang.js"></script>
   
    <script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/ko.js"></script>
    {{-- <script src="{{asset('js/daterangepicker.js')}}"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    
   
    <script>
            $('[data-toggle="popover"]').popover()
            var data = '<?php echo $holidays; ?>';
            var json = JSON.parse(data);
            $('#calendar_bernas').fullCalendar({
                lang: 'ko',
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
        $(document).ready(function() {
            
     
            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $(document).on('click', '.tr_days', function(){
                $('.tr_days').removeClass('activetr')
                $(this).addClass('activetr')
            })

            $('.select').select2();
            
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

             $("#reservation").daterangepicker({
                minDate: {{date('Y-m-d')}},
                opens: 'left',
                
             }, function (startDate, endDate, period) {
              $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
            });

            $('#tab-range-btn').click(function(){
                $('#type').val('range')
            })

            $('#tab-date-btn').click(function(){
                $('#type').val('date')
            })

        });
    
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        height : "200",
        selector: "textarea.my-editor",
        forced_root_block :false,
        branding:false,
        menubar:"",
        language : 'ko_KR',
        rooElement: false,
        plugins: [
          ""
        ],
       // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
       toolbar: false, 
       relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'S2 File Manager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

    tinymce.init(editor_config);

           
</script>
<body>
</html>