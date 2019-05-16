@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm">
    <div class="btn-toolbar">
      <div class="btn-group">
        <a class="btn btn-primary  active" href="{{ route('dashboard.rating.index') }}"><i class="fa fa-calendar"></i> @lang('button.monthly')</a>
        <a class="btn btn-primary" href="{{ route('dashboard.rating.year') }}"><i class="fa fa-calendar"></i> @lang('button.yearly')</a>
      </div>
    </div> <!-- /toolbar -->
	<br>

	  <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3">
                    <form id="year_form">
                      <select class="form-control" id="select_year" type="month" name="year">
                        @for($i=0;$i<4;$i++)
                      	 <option 
                         @if(Request::get('year'))
                             @if( date('Y', strtotime('- 3 years')) + $i == Request::get('year')) selected 
                           @endif
                         @else
                           @if( date('Y', strtotime('- 3 years'))) selected 
                           @endif
                         @endif
                          value="{{date('Y', strtotime('- 3 years')) + $i}}"
                          >
                        {{date('Y', strtotime('- 3 years')) + $i}}
                      </option>
                        @endfor
                      </select>
                    </form>
                </div>
            </div>
            @if(count($dataSets))
            <div class="chart-container">
              <canvas id="lineChart"></canvas>
              
            </div>
              <hr>
              
              <div class="row">
                <div class="col-sm-5">
                  <div style="row">
                      <br>
                      <div class="col-sm-offset-3 col-sm-12" style="font-size:24px;">
                        아래는 담당 영어 강사가 작성한 종합평가 입니다.
                        아래 구글 번역 버튼을 통해 번역이 가능합니다.
                        완벽한 번역은 아니지만 전체적인 내용을 파악하는 데는 무리가 없습니다.
                        <br>
                        <br>
                        <a href="https://translate.google.com/?hl=en" target="_blank" class="btn btn-primary"> 구글 번역기 보기</a>
                      </div>  
                  </div>  
                </div>
                <div class="col-sm-7">
                <div class="chart-container">
                    <canvas id="polarArea"></canvas>
                    </div>
                </div>
              </div>
              <br>
              {{-- <label>@lang('label.teacher') @lang('button.monthly')  @lang('label.comment') </label> --}}
              @foreach($comments as $comment)
              <div class="well" style="padding: 10px;">
                
                {!! $comment->message !!}
              </div>
              @endforeach
            
            @else
              <br>
              {{-- <div class="text-center"> @lang('label.no_class_found') </div> --}}
            @endif
        </div>
    </div>
	</div>
@else
  <div class="container">
   <div class="btn-toolbar">
      <div class="btn-group">
        <a class="btn btn-primary btn-xs  active" href="{{ route('dashboard.rating.index') }}"><i class="fa fa-calendar"></i> @lang('button.monthly')</a>
        <a class="btn btn-primary btn-xs" href="{{ route('dashboard.rating.year') }}"><i class="fa fa-calendar"></i> @lang('button.yearly')</a>
      </div>
    </div> <!-- /toolbar -->
	<br>

	  <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3">
                    <form id="year_form">
                      <select class="form-control" id="select_year" type="month" name="year">
                        @for($i=0;$i<4;$i++)
                      	 <option 
                         @if(Request::get('year'))
                             @if( date('Y', strtotime('- 3 years')) + $i == Request::get('year')) selected 
                           @endif
                         @else
                           @if( date('Y', strtotime('- 3 years'))) selected 
                           @endif
                         @endif
                          value="{{date('Y', strtotime('- 3 years'))}}"
                          >
                        {{date('Y', strtotime('- 3 years')) + $i}}
                      </option>
                        @endfor
                      </select>
                    </form>
                </div>
            </div>
            @if(count($dataSets))
            <br>
            <div class="table-responsive">
              <div class="chart-container">
                <canvas id="lineChart"></canvas>
              </div>
            </div>
              <hr>
              
              <div class="row">
                <div class="col-sm-5">
                  <div style="row">
                      <br>
                      <div class="col-sm-offset-3 col-sm-12" style="font-size:24px;">
                        아래는 담당 영어 강사가 작성한 종합평가 입니다.
                        아래 구글 번역 버튼을 통해 번역이 가능합니다.
                        완벽한 번역은 아니지만 전체적인 내용을 파악하는 데는 무리가 없습니다.
                        <br>
                        <br>
                        <a href="https://translate.google.com/?hl=en" target="_blank" class="btn btn-primary"> 구글 번역기 보기</a>
                      </div>  
                    </div>  
                </div>
                <div class="col-sm-7">
                    <div class="chart-container">
                      <canvas id="polarArea"></canvas>
                    </div>
                </div>
              </div>
              <br>
              {{-- <label>@lang('label.teacher') @lang('button.monthly')  @lang('label.comment') </label> --}}
              @foreach($comments as $comment)
              <div class="well" style="padding: 10px;">
                
                {!! $comment->message !!}
              </div>
              @endforeach
            
            @else
              <br>
              {{-- <div class="text-center"> @lang('label.no_class_found') </div> --}}
            @endif
        </div>
    </div>
  </div>
@endif
@endsection

  @section('styles')
      <link rel="stylesheet" type="text/css" href="{{asset('css/morris.css')}}">
         <style>
        .chart-container {
          position: relative;
          margin: auto;
          height: 40vh;
        }
      </style>
  @endsection

  @section('scripts')
      <script src="{{asset('js/raphael.min.js')}}"></script>
      <script src="{{asset('js/morris.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

      <script>
          $(document).ready(function() {
                  $('#select_year').change(function(){
                      $('#year_form').submit();
                  })

                  @if(count($dataSets))
                    if ($('#lineChart').length ){ 
      
                    var ctx = document.getElementById("lineChart");
                    ctx.height = 60;
                    var lineChart = new Chart(ctx, {
                       type: 'line',
                         data: {
                          labels: {!! json_encode($labels) !!},
                          datasets: {!! json_encode($dataSets) !!}
                        },
                        options: {
                            maintainAspectRatio: false,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        suggestedMin: 0,
                                        suggestedMax: 12
                                    }
                                }]
                            }
                      }

                    });
                  
                  }

                    if ($('#polarArea').length ){

                    var ctx = document.getElementById("polarArea");
                    ctx.height = 100;
                    var data = {
                    datasets: [{
                      data: {!! json_encode($overall) !!},
                      backgroundColor: [
                      "#3573a5",
                      "#efb20b",
                      "#ACADAC",
                      "#30ad83",
                      "#d15959"
                      ],
                      label: 'My dataset'
                    }],
                   labels: ['듣기', '말하기', '발음', '단어', '문법'],
                    };
                    
                    var polarArea = new Chart(ctx, {
                    data: data,
                    responsive:true,
                    type: 'polarArea',
                    options: {
                      scale: {
                        ticks: {
                          beginAtZero: true
                        }
                      },
                      maintainAspectRatio: false,
                    }
                    });
                  
                  }
                  @endif
          });
      </script>
  @endsection