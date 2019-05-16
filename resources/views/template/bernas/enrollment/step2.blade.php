@extends(theme('layout.app'))

@section('content')
<div class="page-heading" style="background-image: url('http://tortillastudio.com/wp-content/uploads/2016/05/blog_header.jpg');">
    <div class="container">
      <h1>등록</h1>
    </div>  
  </div>
<br>

<div class="container" style="min-height: 450px">
    <br>
          <div class="stepwizard">
				    <div class="stepwizard-row setup-panel" style="font-size: 20px;">
				        <div class="stepwizard-step">
				            <a href="{{route('enrollment.step1')}}" type="button" class="btn btn-primary btn-circle">1</a>
				            <p> @lang('label.course')</p>
				        </div>
				        <div class="stepwizard-step">
				            <a href="#step-2" type="button" class="btn btn-primary btn-circle">2</a>
				            <p>@lang('label.date_&_time')</p>
				        </div>
				        <div class="stepwizard-step">
				            <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
				            <p>@lang('label.payment')</p>
				        </div>
				        <div class="stepwizard-step">
				            <a href="#step-3" type="button" class="btn btn-default btn-circle">4</a>
				            <p>@lang('label.finish')</p>
				        </div>
				    </div>
			</div>
            <br>
			<div class="row course-result-list hidden-sm hidden-xs">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-2 col-xs-3 col-sm-2 text-center" style="padding-right: 0px; margin-right: 0px; ">
                             <img src="{{asset('image/image/'.(snake_case($course->coursetype->name)).'.png')}}" class="img-responsive center-block class-icons" style="width: 50%">
                            <label class="btn-number" style="font-size: 18px;">{{$course->days_in_week}}x (회차/주)</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="price">
                            @if(session('freecoupon'))
                                Free Class
                            @else
                                @if(Auth::user()->discount_amount) 
                                    <strike class="text-warning">{{number_format($price) }}</strike> 
                                    {{ number_format(get_discount($price)) }}원 <small style="font-size:12px">{{ Auth::user()->discount_reason }} </small>
                                @else 
                                    {{number_format($price) }} 원
                                @endif 
                                
                                
                                @if(session('coupon'))
                                    <span style="font-size:14px; color:black" ><i class="fa fa-tag"></i> {{ session('coupon.0')->amount}}@lang('label.won') </span>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#couponModal" style="font-size:14px;">@lang('label.have_a_coupon')</a>
                                @endif
                            @endif
                            </div>
                                <div class="row" style="font-size: 18px;">
                                    <div class="col-sm-2" >
                                        {{$course->minutes}} @lang('label.min')
                                    </div>
                                    <div class="col-sm-3">
                                        {{$months}} @lang('label.mos')
                                    </div>
                                    <div class="col-sm-2">
                                        @if(Request::get('sessions'))
                                            {{ Request::get('sessions') }} @lang('label.session')
                                        @else
                                            {{($course->days_in_week * $months) * 4}} @lang('label.session')
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        {{$course->postponed_credit * $months}}  연기
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


            </div>
			<form action="{{route('enrollment.step2.save')}}" method="post">
          {{csrf_field()}}
          @include('partials.error')
          <input name="course_id" value="{{$course->id}}" type="hidden">
          <input name="course_price" value="{{$course->price}}" type="hidden">
          <input name="course_type" value="{{$course->coursetype->name}}" type="hidden">
          <input name="credit" value="{{$course->postponed_credit}}" type="hidden">
         
          <input name="total_session" value="{{ ($course->days_in_week * $months) * 4}}" type="hidden">
          <input name="minutes" value="{{$course->minutes}}" type="hidden">
          
            @if(Request::get('sessions'))
                <input name="number_of_sessions" value="{{ Request::get('sessions') }}" type="hidden">
            @else
                <input name="number_of_sessions" value="{{ ($course->days_in_week * $months) * 4 }}" type="hidden">
            @endif
          
          <br>
          <h3 class="">@lang('label.what_day_you_want')</h3>
          <div class="row class-selection">

              <div class="col-md-12">
                  @php
                    $counter = 0;
                  @endphp
                  <div class="row">
                    @foreach($course->day as $day)
                        @if(is_desktop())
                        <div class="col-sm-2 col-xs-4 text-center ">
                            <input type="checkbox" name="days[]" class="day-{{ $day->day_number }} single-checkbox form-control" value="{{$day->id}}" id="{{$day->day_name}}" @if($course->days_in_week == count($course->days)) checked readonly @endif @if($counter < $course->days_in_week) checked @endif>
                                <label for="{{$day->day_name}}" class="class-btn btn btn-block btn-lg day-img" style="font-size: 20px; display: inline-block;">
                                <img  style="pointer-events: none;" src="{{asset('image/DaysIcons/'.strtolower(str_limit($day->day_name,3, '')).'.png')}}" class="img-responsive center-block class-icons-courses">
                                @lang('label.'. strtolower(str_limit($day->day_name,3, '')))
                                </label>
                        </div>
                        @else
                            <div class="col-xs-4 text-center ">
                            <input type="checkbox" name="days[]" class="day-{{ $day->day_number }} single-checkbox form-control" value="{{$day->id}}" id="{{$day->day_name}}" @if($course->days_in_week == count($course->days)) checked readonly @endif @if($counter < $course->days_in_week) checked @endif>
                                <label for="{{$day->day_name}}" class="class-btn btn btn-block btn-lg day-img" style="font-size: 20px; display: inline-block;">
                                <img  style="pointer-events: none;" src="{{asset('image/DaysIcons/'.strtolower(str_limit($day->day_name,3, '')).'.png')}}" class="img-responsive center-block class-icons-courses">
                                @lang('label.'. strtolower(str_limit($day->day_name,3, '')))
                                </label>
                        </div>
                        @endif
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                  </div>

              </div>
          </div>
          <Br>
          <hr>
          
        <div class="row">
            <div class="col-sm-6">
                <p>
                <h3 class="">@lang('label.when_do_you_want_to_start')</h3>
                <div class="form-group">
                    @if(is_desktop())
                        <div class='input-group date' id='datepicker'>
                            <input type='text' name="start_date" class="form-control" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    @else
                          <input type='date' value="{{ date('Y-md-d') }}" name="start_date" class="form-control" />
                    @endif
                  </div>
                </p>
            </div>
            <div class="col-sm-6">
                <p>
                    <h3 class="">@lang('label.what_time_do_you_want')</h3>
                    <select type='text' name="time" class="form-control" id="select2" style="padding:30px !important;">
                     
                            <option value="6:00AM">6:00 AM</option>
                            <option value="6:10AM">6:10 AM</option>
                            <option value="6:20AM">6:20 AM</option>
                            <option value="6:30AM">6:30 AM</option>
                            <option value="6:40AM">6:40 AM</option>
                            <option value="6:50AM">6:50 AM</option>
                            <option value="7:00AM">7:00 AM</option>
                            <option value="7:10AM">7:10 AM</option>
                            <option value="7:20AM">7:20 AM</option>
                            <option value="7:30AM">7:30 AM</option>
                            <option value="7:40AM">7:40 AM</option>
                            <option value="7:50AM">7:50 AM</option>
                            <option value="8:00AM">8:00 AM</option>
                            <option value="8:10AM">8:10 AM</option>
                            <option value="8:20AM">8:20 AM</option>
                            <option value="8:30AM">8:30 AM</option>
                            <option value="8:40AM">8:40 AM</option>
                            <option value="8:50AM">8:50 AM</option>
                            <option value="9:00AM">9:00 AM</option>
                            <option value="9:10AM">9:10 AM</option>
                            <option value="9:20AM">9:20 AM</option>
                            <option value="9:30AM">9:30 AM</option>
                            <option value="9:40AM">9:40 AM</option>
                            <option value="9:50AM">9:50 AM</option>
                            <option value="10:00AM">10:00 AM</option>
                            <option value="10:10AM">10:10 AM</option>
                            <option value="10:20AM">10:20 AM</option>
                            <option value="10:30AM">10:30 AM</option>
                            <option value="10:40AM">10:40 AM</option>
                            <option value="10:50AM">10:50 AM</option>
                            <option value="11:00AM">11:00 AM</option>
                            <option value="11:10AM">11:10 AM</option>
                            <option value="11:20AM">11:20 AM</option>
                            <option value="11:30AM">11:30 AM</option>
                            <option value="11:40AM">11:40 AM</option>
                            <option value="11:50AM">11:50 AM</option>
                            <option value="12:00AM">12:00 AM</option>
                            <option value="12:10PM">12:10 PM</option>
                            <option value="12:20PM">12:20 PM</option>
                            <option value="12:30PM">12:30 PM</option>
                            <option value="12:40PM">12:40 PM</option>
                            <option value="12:50PM">12:50 PM</option>
                            <option value="01:00PM">01:00 PM</option>
                            <option value="01:10PM">01:10 PM</option>
                            <option value="01:20PM">01:20 PM</option>
                            <option value="01:30PM">01:30 PM</option>
                            <option value="01:40PM">01:40 PM</option>
                            <option value="01:50PM">01:50 PM</option>
                            <option value="02:00PM">02:00 PM</option>
                            <option value="02:10PM">02:10 PM</option>
                            <option value="02:20PM">02:20 PM</option>
                            <option value="02:30PM">02:30 PM</option>
                            <option value="02:40PM">02:40 PM</option>
                            <option value="02:50PM">02:50 PM</option>
                            <option value="03:00PM">03:00 PM</option>
                            <option value="03:10PM">03:10 PM</option>
                            <option value="03:20PM">03:20 PM</option>
                            <option value="03:30PM">03:30 PM</option>
                            <option value="03:40PM">03:40 PM</option>
                            <option value="03:50PM">03:50 PM</option>
                            <option value="04:00PM">04:00 PM</option>
                            <option value="04:10PM">04:10 PM</option>
                            <option value="04:20PM">04:20 PM</option>
                            <option value="04:30PM">04:30 PM</option>
                            <option value="04:40PM">04:40 PM</option>
                            <option value="04:50PM">04:50 PM</option>
                            <option value="05:00PM">05:00 PM</option>
                            <option value="06:00PM">06:00 PM</option>
                            <option value="06:10PM">06:10 PM</option>
                            <option value="06:20PM">06:20 PM</option>
                            <option value="06:30PM">06:30 PM</option>
                            <option value="06:40PM">06:40 PM</option>
                            <option value="06:50PM">06:50 PM</option>
                            <option value="07:00PM">07:00 PM</option>
                            <option value="07:10PM">07:10 PM</option>
                            <option value="07:20PM">07:20 PM</option>
                            <option value="07:30PM">07:30 PM</option>
                            <option value="07:40PM">07:40 PM</option>
                            <option value="07:50PM">07:50 PM</option>
                            <option value="08:00PM">08:00 PM</option>
                            <option value="08:10PM">08:10 PM</option>
                            <option value="08:20PM">08:20 PM</option>
                            <option value="08:30PM">08:30 PM</option>
                            <option value="08:40PM">08:40 PM</option>
                            <option value="08:50PM">08:50 PM</option>
                            <option value="09:00PM">09:00 PM</option>
                            <option value="09:10PM">09:10 PM</option>
                            <option value="09:20PM">09:20 PM</option>
                            <option value="09:30PM">09:30 PM</option>
                            <option value="09:40PM">09:40 PM</option>
                            <option value="09:50PM">09:50 PM</option>
                            <option value="10:00PM">10:00 PM</option>
                            <option value="10:10PM">10:10 PM</option>
                            <option value="10:20PM">10:20 PM</option>
                            <option value="10:30PM">10:30 PM</option>
                            <option value="10:40PM">10:40 PM</option>
                            <option value="10:50PM">10:50 PM</option>
                            <option value="11:00PM">11:00 PM</option>
                            <option value="11:10PM">11:10 PM</option>
                            <option value="11:20PM">11:20 PM</option>
                            <option value="11:30PM">11:30 PM</option>
                            <option value="11:40PM">11:40 PM</option>
                            <option value="11:50PM">11:50 PM</option>
                        </select>
                </p>
            </div>
        </div>
          <hr>
        <div class="row" style="color: gray;">
            <div class="col-sm-6">
                <p> 
                   <h3 class="">강사 (선택사항)</h3> 
                   <input type="text" class="form-control" name="teacher" placeholder="미선택시 추천강사로 배정됩니다">
                    <small>*희망하시는 강사가 있는 경우 매니저와 강사스케줄 먼저 체크해 주세요</small>
                </p>
            </div>
            <div class="col-sm-6">
                <h3 class="">커리큘럼 (선택사항)</h3> 
                   <input type="text" class="form-control" name="curriculum" placeholder="(미선택시 정규회화과정으로 진행됩니다)">
                   
            </div>
        </div>

          
          <hr>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-forward"></i> @lang('button.proceed')</button>
            <br>
            <br>
            <a href="{{url('enrollment')}}"><i class="fa fa-reply-all"></i> @lang('button.or_cancel')</a>
        </div>
        </form>
</div>

<!-- Modal -->
<div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
     
      <div class="modal-body text-center">
        <form action="{{ route('enrollment.coupon.validate') }}" method="post" id="couponform">
            <label>@lang('label.coupon_code')</label>
            <input class="form-control" required name="code" id="couponCode">
            <br>
            <div class="alert alert-danger no-coupon" style="display:none">@lang('label.no_coupon_found')</div>
            <br>
            <button type="submit" class="btn btn-primary">@lang('button.submit')</button>
        </form>
      </div>
     
    </div>
  </div>
</div>
<div class="spacer"></div>

@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-datetimepicker.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap.css')}}" />
   
@endsection
@section('scripts')
    <script src="{{asset('site/js/moment.min.js')}}"></script>
    <script src="{{asset('site/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script>


  $(document).ready(function(){

        $('#couponform').submit(function(e){
            e.preventDefault();
            
            var code = $('#couponCode').val();
            
            axios.post('/enrollment/coupon/validate',{
                code: code,
                type:'discount'
            })
            .then( function(response){
                if(response.data)
                {
                    $('.no-coupon').hide() 
                    location.reload();
                }else{
                    $('.no-coupon').show()    
                }
            })
            .catch( function(error) {
                console.log( error )
            })
        })

        var day_num = {{ $course->days_in_week }}
        
        if(day_num == 4)
        {
            $('.day-1').prop('checked', true);
            $('.day-2').prop('checked', true);
            $('.day-3').prop('checked', true);
            $('.day-4').prop('checked', true);
            $('.day-5').prop('checked', false);
        }else if(day_num == 3){
            $('.day-1').prop('checked', true);
            $('.day-2').prop('checked', false);
            $('.day-3').prop('checked', true);
            $('.day-4').prop('checked', false);
            $('.day-5').prop('checked', true);
        }else if(day_num == 2){
            $('.day-1').prop('checked', false);
            $('.day-2').prop('checked', true);
            $('.day-3').prop('checked', false);
            $('.day-4').prop('checked', true);
            $('.day-5').prop('checked', false);
        }else{

            $('.day-1').prop('checked', true);
            $('.day-2').prop('checked', true);
            $('.day-3').prop('checked', true);
            $('.day-4').prop('checked', true);
            $('.day-5').prop('checked', true);

        }

        $(".single-checkbox").not(":checked").attr("disabled", true);

        $('#select2').select2({
          theme: "bootstrap"
        });

        $('#datepicker').datetimepicker({
            format: 'YYYY/MM/DD',
            minDate: new Date(),
            defaultDate: new Date()
        });
        
        $(".single-checkbox").change(function() {
            var limit = {{ $course->days_in_week }}
            var bol = $(".single-checkbox:checked").length >= limit;
            $(".single-checkbox").not(":checked").attr("disabled",bol);
        });

    })


    </script>
@endsection
