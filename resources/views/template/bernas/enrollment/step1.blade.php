@extends(theme('layout.app'))

@section('content')
<div class="page-heading" style="background-image: url('http://tortillastudio.com/wp-content/uploads/2016/05/blog_header.jpg');">
    <div class="container">
      <h1>등록</h1>
    </div>  
  </div>

<div class="container">
  <br>
  <br>
  <div class="stepwizard">
    <div class="stepwizard-row setup-panel" style="font-size: 20px;">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p> @lang('label.course')</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
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
  <br>
  {{-- <div id="loader" class="text-center" style="margin-top: 50px;">
    <img src="{{ asset('loaders/35.gif') }}">
  </div>  --}}
  <div style="display: block;" id="course-panel">
    <form action="{{route('enrollment.step1post')}}" method="post">

      {{csrf_field()}}
      @if(count($coursetypes))
      <div class="class-selection">
        <section>
            <div class="row">
              <div class="col-sm-7">
                <div class="head">
                  <span class="number" style="background-color:#05b247; color: #fff;">1</span> <label>@lang('label.class_type')</label>
                </div>
                  <div class="row">
                    @foreach($coursetypes as $coursetype)
                      @if(is_desktop())
                        <div class="col-sm-6 col-xs-6" >
                          <input type="radio" @if($defaultCourse->course_type_id == $coursetype->id) checked @endif class="type" name="type" value="{{$coursetype->id}}" id="{{$coursetype->id}}">
                          <label  href="" for="{{$coursetype->id}}"  style="white-space: normal; display: inline-block;"  class="class-btn btn btn-block btn-lg btn-wrap-text">
                            <img style="pointer-events: none;" src="{{asset('image/image/'.(snake_case($coursetype->name)).'.png')}}" class="img-responsive center-block class-icons-course">
                            <h5 class="hidden-sm hidden-xs">@lang('label.'. snake_case($coursetype->name))</h5>
                            <div style=" font-size: 12px" class="visible-xs visible-sm">@lang('label.'. snake_case($coursetype->name))</div>
                          </label>
                        </div>
                      @else
                        <div class="col-xs-6" >
                              <input type="radio" @if($defaultCourse->course_type_id == $coursetype->id) checked @endif class="type" name="type" value="{{$coursetype->id}}" id="{{$coursetype->id}}">
                              <label  href="" for="{{$coursetype->id}}"  style="white-space: normal; display: inline-block;"  class="class-btn btn btn-block btn-lg btn-wrap-text">
                              <img style="pointer-events: none;" src="{{asset('image/image/'.(snake_case($coursetype->name)).'.png')}}" class="img-responsive center-block class-icons-course">
                              <div style=" font-size: 12px" class="visible-xs visible-sm">@lang('label.'. snake_case($coursetype->name))</div>
                            </label>
                        </div>
                      @endif
                    @endforeach
                  </div>
                        <br>
                        <br>
              </div>

              <div class="col-sm-5">
            
                 <div class="head">
                  
                  <span class="number" style="background-color:#05b247; color: #fff;">2</span> <label>@lang('label.weekly_agenda')</label>
                  </div>
                  <select name="minute" class="select-agenda" id="minutes">
                      <option></option>
                  </select> 
                  <br>
                  <br>
                  <br>
                  <div class="head">
                    <span class="number" style="background-color:#05b247; color: #fff;">3</span> <label>@lang('label.days_agenda')</label>
                  </div>
                  <select class="select-agenda" name="days_in_week" id="daysweeks">
                      <option>
                      </option>
                  </select> 

              </div>
            </div>
            <hr>
            <div class="row">
              <div class="head text-center">
                <span class="number" style="background-color:#05b247; color: #fff;">4</span> <label>@lang('label.number_of_months')</label>
              </div>
              <br>
              <div class="col-sm-3 col-xs-6 text-center" >
                  <input type="radio" checked class="type" value="1" name="months" id="month1">
                  <label for="month1" href="" style="white-space: normal;  display: inline-block;"  class="class-btn btn btn-block btn-lg">
                    <img src="{{asset('image/icons/register.png')}}" class="img-responsive center-block" style="width:45%;  pointer-events: none;" alt="">
                    <h4>@lang('label.1_month')</h4>
                    @if(is_desktop())
                      <div class="price" id="month_price"><small><i>?</i></small></div>
                    @else
                      <div class="price" style="font-size:16px;" id="month_price"><small><i>?</i></small></div>
                    @endif
                    <br>
                    <div style="margin:10px;"></div>
                  </label>
              </div>
              <div class="col-sm-3 col-xs-6 text-center" >
                  <input type="radio" class="type" value="3" id="month3" name="months"  id="month3">
                  <label for="month3" href="" style="white-space: normal;  display: inline-block;"  class="class-btn btn btn-block btn-lg">
                    <img src="{{asset('image/icons/register.png')}}" class="img-responsive center-block" style="width:45%;  pointer-events: none;" alt="">
                    <h4>@lang('label.3_months')</h4>
                    @if(is_desktop())
                    <div class="price" id="three_price"><small><i>?</i></small></div>
                    @else

                    <div class="price" style="font-size:16px" id="three_price"><small><i>?</i></small></div>
                    @endif
                    <div  id="three_percent_placeholder" style="display:none">
                      <br>
                      <div style="margin:10px;"></div>
                    </div>
                    <div style="background-color: green; padding:5px; color:white" id="three_percent"> ?% @lang('label.discount')</div>
                  </label>
              </div>
              <div class="col-sm-3 col-xs-6 text-center" >
                 <input type="radio" class="type" value="6" id="month6" name="months" >
                  <label for="month6" href="" style="white-space: normal;  display: inline-block;"  class="class-btn btn btn-block btn-lg">
                  <img src="{{asset('image/icons/register.png')}}" class="img-responsive center-block" style="width:45%;  pointer-events: none;" alt="">
                  <h4>@lang('label.6_months')</h4>
                  @if(is_desktop())
                    <div class="price" id="six_price"><small><i>?</i></small></div>
                  @else
                    <div class="price" style="font-size:16px;" id="six_price"><small><i>?</i></small></div>
                  @endif
                  <div  id="six_percent_placeholder" style="display:none">
                    <br>
                    <div style="margin:10px;"></div>
                  </div>
                  <div style="background-color: green; padding:5px; color:white" id="six_percent"> ?% @lang('label.discount')</div>
                  </label>
              </div>
              <div class="col-sm-3 col-xs-6 text-center" >
                 <input type="radio" class="type" value="12" id="month12" name="months"  >
                  <label for="month12" style="white-space: normal;  display: inline-block;"  href="" class="class-btn btn btn-block btn-lg">
                    <img src="{{asset('image/icons/register.png')}}" class="img-responsive center-block" style="width:45%;  pointer-events: none;" alt="">
                    <h4>@lang('label.12_months')</h4>
                    @if(is_desktop())
                      <div class="price" id="twelve_price"><small><i>?</i></small></div>
                    @else
                      <div class="price" style="font-size:16px;" id="twelve_price"><small><i>?</i></small></div>
                    @endif
                    <div  id="twelve_percent_placeholder" style="display:none">
                        <br>
                        <div style="margin:10px;"></div>
                      </div>
                    <div style="background-color: green; padding:5px; color:white" id="twelve_percent"> ?% @lang('label.discount')</div>
                  </label>
              </div>
            </div>
        </section>
      </div>
      <button type="submit" id="proceed" disabled class="btn btn-success btn-lg center-block" style="width: 50%; padding-top:25px;padding-bottom:25px;" id="submit" ><i class="fa fa-check-circle"></i> @lang('button.proceed')</button>

      @endif
    </form>
  </div>

  <div class="spacer"></div>
</div>
@endsection

@section('styles')
  <style type="text/css">
    .class-selection section{
      margin-left: 0px;
    }

    .select-agenda{
      padding-top: 30px;
      padding-bottom: 30px;
      font-size: 20px;
      width: 100%;
      border-radius: 5px;
      padding-left: 10px;
      padding-right: 10px;
      border:2px solid #e0e2e1;
    }

    .select-agenda:hover{
      border:2px solid #05b247;
    }

    .select-agenda:focus{
      border:2px solid #05b247 !important;
    }

    .month-box{
      border:2px solid #b5b6b7;
      padding: 20px;
    }

  .select-agenda:hover{
      border:2px solid #05b247;
    }

    .select-agenda:focus{
      border:2px solid #05b247 !important;
    }
  </style>
@endsection

@section('scripts')

  <script type="text/javascript">
      $(document).ready(function(){
        $('#loader').hide()
        $('#course-panel').show();


        var $coursetype = '{{ $defaultCourse->coursetype->id}}';
        
        var $minute = '{{ $defaultCourse->minutes}}'

        var $daysweek = '{{ $defaultCourse->days_in_week}}'
        
        loadDefault()
          
        var labelID;

        $('.btn-img').click(function() {
              labelID = $(this).attr('for');
              alert(labelID)
              $('#'+labelID).trigger('click');
        });

        function loadDefault()
        {
            //clearing minutes select 
            $('#minutes').find('option').remove().end()

            //clearing daysweeks select 
            $('#daysweeks').find('option').remove().end()

             $.get('{{url("course/getminutes")}}/' + $coursetype, function(response) {
                  if(response.length){  
                      $('#minutes').find('option').remove().end()
                      minutes = response;
                      //console.log(minute)
                      $.each(minutes,function(key, value) 
                        {
                            if(value.minutes == $minute){
                              $('#minutes').append('<option selected value=' + value.minutes + '>' + value.minutes + ' @lang('label.minutes')</option>');
                            }else{
                              $('#minutes').append('<option value=' + value.minutes + '>' + value.minutes + ' @lang('label.minutes')</option>');
                            }
                        });
                    }
                  })

              // populate days in a week
              $.get('{{url("course/daysweek")}}/' + $coursetype, function(response) {
                  if(response.length){
                    $('#daysweeks').find('option').remove().end()
                    daysweeks = response;
                    //console.log(daysweek)
                    $.each(daysweeks,function(key, value) 
                      {
                        if(value.days_in_week == $daysweek){
                          $('#daysweeks').append('<option selected value=' + value.days_in_week + '> 주' + value.days_in_week + '회</option>');
                        }else{
                          $('#daysweeks').append('<option value=' + value.days_in_week + '>주' + value.days_in_week + '회</option>');
                        }
                    });
                  }
              })

              setPrice()
        }



        function populateDropDown()
        {
          
            $('#minutes').find('option').remove().end()

            //clearing daysweeks select 
            $('#daysweeks').find('option').remove().end()

            $.get('{{url("course/getminutes")}}/' + $coursetype, function(response) {
                  if(response.length){  
                     $('#minutes').find('option').remove().end()
                      var minutes = response;
                      
                      $minute = minutes[0].minutes;
                      
                      $('#minutes').find('option').remove().end()
                      $.each(minutes,function(key, value) 
                        {
                            $('#minutes').append('<option value=' + value.minutes + '>' + value.minutes + ' @lang('label.minutes')</option>');
                        });

                    }

                  })

              // populate days in a week
              $.get('{{url("course/daysweek")}}/' + $coursetype, function(response) {
                  if(response.length){
                    var daysweeks = response;

                    $daysweek = daysweeks[0].days_in_week;
                    
                    
                    $('#daysweeks').find('option').remove().end()
                  
                    $.each(daysweeks,function(key, value) 
                      {
                        $('#daysweeks').append('<option value=' + value.days_in_week + '>주' + value.days_in_week + ' 회</option>');
                    });


                  }
              })
         
        }


        $('input[name=type]').change(function(){
            $coursetype = $(this).val()
            populateDropDown()

            setTimeout(function(){
             // console.log('Days Per Week:' + $daysweek)
             // console.log('Minutes:' + $minute)
              setPrice()
            }, 800)
      
            
            
        })


        $('#minutes').change(function(){
            $minute = $(this).val()
            setPrice()
        })

        $('#daysweeks').change(function(){
            $daysweek = $(this).val()
            setPrice()
        })

        function setPrice()
        {
            if($coursetype && $minute && $daysweek){
                $.get('{{url("course/getcourse")}}/' + $coursetype + '/' + $daysweek + "/" + $minute, function(response){
                    //var url = '{{url("course/getcourse")}}/' + coursetype + '/' + daysweek + "/" + minute
                    
                    if(response){
                      $('#month_price').html( response.price ? numberWithCommas(response.price) + '@lang("label.won")'  : "?"  )

                      $('#three_price').html( response.price ? numberWithCommas(response.three_price)  + '@lang("label.won")' : "?" )
                      if(response.three_percent == 0){
                          $('#three_percent').hide()
                          $('#three_percent_placeholder').show()
                      }else{
                          $('#three_percent').show()
                          $('#three_percent_placeholder').hide()
                          $('#three_percent').html( response.three_percent ? response.three_percent + '% @lang('label.discount')' : '?')
                      }

                      $('#six_price').html( response.six_price ? numberWithCommas(response.six_price) + '@lang("label.won")' : "?" )
                      if(response.six_percent == 0)
                      {
                          $('#six_percent_placeholder').show();
                          $('#six_percent').hide();
                      }else{
                          $('#six_percent_placeholder').hide();
                          $('#six_percent').show();
                          $('#six_percent').html( response.six_price ? response.six_percent + '% @lang('label.discount')' : '?')
                      }

                      $('#twelve_price').html( response.twelve_price ?  numberWithCommas(response.twelve_price) + '@lang("label.won")' : "?"  )
                      if(response.twelve_percent == 0)
                      {
                          $('#twelve_percent_placeholder').show();
                          $('#twelve_percent').hide();
                      }else{
                          $('#twelve_percent_placeholder').hide();
                          $('#twelve_percent').show();
                          $('#twelve_percent').html( response.twelve_percent ? response.twelve_percent + '% @lang('label.discount')' : "?")
                      }


                      // var url = '{{url("course/getcourse")}}/' + coursetype + '/' + daysweek + "/" + minute;
                      if(response.price > 0)
                      {
                        $('#proceed').attr('disabled', false);
                      }else{
                        $('#proceed').attr('disabled', true);
                      }



                    }else{
                      $('#month_price').html('?')

                      $('#three_price').html('?')
                      $('#three_percent').html('? @lang('label.discount')')

                      $('#six_price').html('?')
                      $('#six_percent').html('? @lang('label.discount')')

                      $('#twelve_price').html('?')
                      $('#twelve_percent').html('? @lang('label.discount')')  
                      $('#proceed').attr('disabled', true);
                    }
                  })

            }
        }

        const numberWithCommas = function(x){
              if(x){
                var parts = x.toString().split(".");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return parts.join(".");
                
              }
            
          }
        }); 
 </script>
@endsection
