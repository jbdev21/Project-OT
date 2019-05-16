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
                    <form id="month_form">
                      <div class="col-sm-2">
                        <div class="input-group" style="margin-bottom: 5px;">
                          <input value="{{Request::get('month') ? Request::get('month') : date('Y-m') }}" class="form-control" id="select_month" style="color:black" readonly type="text" name="month">
                        </div><!-- /input-group -->
                            
                      </div>
                    </form>
            </div>
            @if(count($dataSets))
              <div class="chart-container">
                <canvas id="lineChart"></canvas>
              </div>
              <hr>
              
              <div class="row" style="margin-bottom: -100px">
                <div class="col-sm-offset-1 col-sm-10">
                  <div class="col-sm-5">
                        <br>
                        아래는 담당 영어 강사가 작성한 종합평가 입니다. 구글 번역 버튼을 통해 번역이 가능합니다. 완벽한 번역은 아니지만 전체적인 내용을 파악하는 데는 무리가 없습니다.
                        <br>
                        <br>
                        <a href="https://translate.google.com/#view=home&op=translate&sl=en&tl=ko" target="_blank" class="btn btn-primary"> 구글 번역기 보기</a>
                   
                  </div>
                  <div class="col-sm-7">
                      <div class="chart-container">
                        <canvas id="polarArea"></canvas>
                      </div>
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                {{-- <label>@lang('label.teacher') @lang('button.monthly') @lang('label.comment')</label> --}}
                    @foreach($comments as $comment)
                      <div class="well" style="padding: 10px;">
                        {!! $comment->message !!}
                      </div>
                    @endforeach
                </div>
                </div>
            @else
              <br>
              {{-- <div class="text-center"> @lang('label.no_class_found')</div> --}}
            @endif
        </div>
    </div>
	</div>
@else
  <div class="container">
       <div class="btn-toolbar">
      <div class="btn-group">
        <a class="btn btn-primary btn-xs active" href="{{ route('dashboard.rating.index') }}"><i class="fa fa-calendar"></i> @lang('button.monthly')</a>
        <a class="btn btn-primary btn-xs" href="{{ route('dashboard.rating.year') }}"><i class="fa fa-calendar"></i> @lang('button.yearly')</a>
      </div>
    </div> <!-- /toolbar -->
	  <br>

	  <div class="row">
        <div class="col-sm-12">
            <div class="row">
                    <form id="month_form">
                      <div class="col-sm-2">
                        <div class="input-group" style="margin-bottom: 5px;">
                          <input value="{{Request::get('month') ? Request::get('month') : date('Y-m') }}" class="form-control" id="select_month" style="color:black" readonly type="text" name="month">
                        </div><!-- /input-group -->
                            
                      </div>
                    </form>
            </div>
            @if(count($dataSets))
              <div class="chart-container">
                <canvas id="lineChart"></canvas>
              </div>
              <hr>
              
              <div class="row">
                <div class="col-sm-5">
                    <br>
                      아래는 담당 영어 강사가 작성한 종합평가 입니다. 구글 번역 버튼을 통해 번역이 가능합니다. 완벽한 번역은 아니지만 전체적인 내용을 파악하는 데는 무리가 없습니다.
                      <br>
                      <br>
                      <center>
                      <a href="https://translate.google.com/#view=home&op=translate&sl=en&tl=ko" target="_blank" class="btn btn-primary"> 구글 번역기 보기</a>
                      </center>
                      <br>
                      <br>
                </div>
                <div class="col-sm-7">
                    <div class="chart-container">
                      <canvas id="polarArea"></canvas>
                    </div>
                </div>
              </div>
                <div style="position:relative; top:-80px">
                    {{-- <label>@lang('label.teacher') @lang('button.monthly') @lang('label.comment')</label> --}}
                    @foreach($comments as $comment)
                      <div class="well" style="padding: 10px;">
                        {!! $comment->message !!}
                      </div>
                    @endforeach
                </div>
            @else
              <br>
              {{-- <div class="text-center"> @lang('label.no_class_found')</div> --}}
            @endif
        </div>
    </div>
  </div>
@endif
@endsection

  @section('styles')
      <link rel="stylesheet" type="text/css" href="{{asset('css/morris.css')}}">
      <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="{{asset('css/MonthPicker.css')}}">
      <style>
        .chart-container {
          position: relative;
          margin: auto;
          height: 40vh;
        }
      </style>
  @endsection

  @section('scripts')
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
       <script src="{{asset('js/raphael.min.js')}}"></script>
      <script src="{{asset('js/morris.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
      <script src="{{asset('js/MonthPicker.js')}}"></script>

      <script>
          $(document).ready(function() {
                  $('#select_month').MonthPicker({
                    Button: '<span class="input-group-btn"><button class="btn btn-default" id="date_btn" type="button"><i class="fa fa-calendar"></i></button></span>',
                    MonthFormat:'yy-mm',

                     IsRTL: true,
                      i18n: {
                        months: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"]
                      },
                    OnAfterChooseMonth: function(selectedDate) {
                      $('#month_form').submit();
                        // Do something with selected JavaScript date.
                        // console.log(selectedDate);
                    }
                  });

                  $('#select_month').change(function(){
                      $('#month_form').submit();
                  })


                  @if(count($dataSets))
                    if ($('#lineChart').length ){ 
      
                    var ctx = document.getElementById("lineChart");
                    ctx.height = 60;
                    var lineChart = new Chart(ctx, {
                      type: 'line',
                      responsive:true,
                      responsiveAnimationDuration: 500,
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
                                  },
                              }],
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
                         // label: 'My dataset'
                        }],
                        labels: ['듣기', '말하기', '발음', '단어', '문법'],
                    };
                    @if(is_desktop())
                      var polarArea = new Chart(ctx, {
                        data: data,
                        responsive:true,
                        type: 'polarArea',
                        options: {
                            scales: {
                              display: false
                            }
                        }
                      });
                    @else
                        var polarArea = new Chart(ctx, {
                        data: data,
                        responsive:true,
                        type: 'polarArea',
                        options: {
                            legends: false,
                            scales: {
                              display: false
                            }
                        }
                      });
                    @endif
                  
                  }
                  @endif
          });
      </script>
  @endsection