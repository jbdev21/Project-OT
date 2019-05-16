@extends(theme('layout.app'))

@section('content')
<div class="page-heading" style="background-image: url('http://tortillastudio.com/wp-content/uploads/2016/05/blog_header.jpg');">
    <div class="container">
      <h1>@lang('label.enrollment')</h1>
    </div>  
  </div>
<br>

<div class="container" style="min-height: 450px">
    <br>
          <div class="stepwizard">
				    <div class="stepwizard-row setup-panel">
				        <div class="stepwizard-step">
				            <a href="#step-1" type="button" class="btn btn-default btn-circle">1</a>
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
				            <a href="#step-4" type="button" class="btn btn-primary btn-circle">4</a>
				            <p>@lang('label.finish')</p>
				        </div>
				    </div>
			</div>
            <br>
            <div class="row">
				<!-- <div class="col-sm-10 col-sm-offset-1">
                    	<button class="btn btn-success btn-md" onclick="printContent('print-body')"> <i class="fa fa-print"></i> @lang('button.print') </button>
                        
                </div> -->
            </div>
                <br>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row course-result-list reciept" id="print-body">
                            <br>
                            <br>
                            <h1 class="text-center">수강등록 확인</h1>
                            <hr>
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="col-md-3">
                                        <div class="well" style="background: linear-gradient(orange, red); color: white;">
                                         <i style="font-size: 30px;" class="fa fa-user"></i>
                                         <br>
                                         <span style="font-size: 16px;">{{$class->user->korean_name}}</span><br>
                                         <span style="font-size: 16px;">{{$class->user->name}}</span>
                                        </div> 
                                    </div>
                                    <!--  <div class="col-md-3">
                                         Phone: {{$class->user->contact_number}} 
                                    </div> -->
                                     <div class="col-md-3">
                                        <div class="well" style="background: linear-gradient(lightgreen, green); color: white;">
                                        <i style="font-size: 30px;" class="fa fa-cart-arrow-down"></i> 
                                         <br>
                                        <b style="font-size: 12px;">
                                        @lang('label.'.snake_case($class->course->coursetype->name)) 
                                        {{$class->minutes}}@lang('label.min') 
                                        {{$class->num_months}}@lang('label.months')  
                                        {{$class->total_sessions}}@lang('label.sessions') 
                                        @php
                                             $days = "";

                                            foreach($class->day as $day):
                                                $days .= Lang::get('label.'. strtolower(str_limit($day->day_name, 3, ''))) . " ";
                                            endforeach;

                                            echo $days;
                                                 
                                        @endphp
                                            <br>

                                        </b>
                                        </div>    
                                    </div>
                                     <div class="col-md-3">
                                        <div class="well" style="background: linear-gradient(skyblue,royalblue); color: white;">
                                        <i style="font-size: 30px;" class="fa fa-money"></i> 
                                        <br>
                                            수강료
                                         <br>
                                        <b style="font-size: 16px;">{{$class->payment_price}} 원</b>
                                        </div> 
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="well" style="background: linear-gradient(violet, purple); color: white;">
                                         <i style="font-size: 30px;" class="fa fa-clock-o"></i> 
                                         <br>
                                         <b style="font-size: 14px;">{{ date('Y/m/d', strtotime($class->getFirstSession()->date_time))}} - {{ date('Y/m/d', strtotime($class->getLastSession()->date_time))}}</b>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                  
            <div class="text-center">
                <a class="btn btn-success btn-lg" href="{{route('dashboard.class.index')}}" > 마이페이지</a>
            </div>   

            <!--this is for the previous class history -->
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>


</div>
<div class="spacer"></div>

@endsection

@section('styles')
    <style>
        .reciept{
            font-size:1.5em;
        }
        .well{
            min-height: 135px;
        }
    </style>
@endsection
@section('scripts')
    <script>
		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}

        var openwin = window.open ("AGS_progress.html","popup","width=300,height=160");
        openwin.close();

    </script>
@endsection
