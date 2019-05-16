<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{ setting('site_title') }}</title>

    <!-- Fontfaces CSS-->
    <link href="/lvt/css/font-face.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/lvt/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/lvt/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/lvt/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bookblock.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo1.css')}}" />
    <!-- Main CSS-->
    <link href="/lvt/css/theme.css" rel="stylesheet" media="all">
    <style type="text/css">
        .circle-chart__circle {
          animation: circle-chart-fill 2s reverse; /* 1 */ 
          transform: rotate(-90deg); /* 2, 3 */
          transform-origin: center; /* 4 */
        }


        .circle-chart__circle--negative {
          transform: rotate(-90deg) scale(1,-1); /* 1, 2, 3 */
        }

        .circle-chart__info {
          animation: circle-chart-appear 2s forwards;
          opacity: 0;
          transform: translateY(0.3em);
        }

        .progress-bar, .progress{
            height:30px;
        }

        .progrss-bar .progressbar-average{
            height:20px;
        }

        .btn-large {
            padding: 18px 28px;
            font-size: 25px; 
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

        @keyframes circle-chart-fill {
          to { stroke-dasharray: 0 100; }
        }

        @keyframes circle-chart-appear {
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- WELCOME-->
        <div >
            <section class="welcome2 p-t-40 p-b-55" style="background-color:url('http://www.dreams.metroeve.com/wp-content/uploads/2017/04/dreams.metroeve_children-dreams-meaning.jpg')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('site/img/logo1.png') }}" alt="ehehe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="welcome2-inner m-t-60">
                                <div class="welcome2-greeting">
                                    <h1 class="title-6">Hi
                                        <span>{{$leveltest->name}}</span></h1>
                                    <p>
                                    체험수업을 진행하기 위해 아래사항을 확인 바랍니다. <br>
                                    화상영어 : 헤드셋과 웹캠이 필요 (웹캠은 옵션)<br>
                                    {{-- 인터넷 익스프롤러 사용 필수 (크롬,엣지 불가)<br> --}}
                                    전화영어 : 신청시간에 070번호 전화를 수신
                                    </p>
                                </div>
                                
                                @if($leveltest->status == 'pending' && $leveltest->type == 'Video')
                                    <a  href="{{ leveltest_video_url($leveltest->id, 'student')}} " target="_blank" class="btn-primary btn-large m-b-10 m-p-20"><i class="fa fa-video-camera"></i> Start Class <br> 강의실 입장</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="alert-wrap">
                <div class="container">
                      <div class="row p-t-25">
                            <div class="col-6 col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix p-b-15">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="text-white">
                                                    @if($leveltest->admin)
                                                        {{$leveltest->admin->name}}
                                                    @else
                                                        강사지정 대기중
                                                    @endif
                                                </h3>
                                                <span>강사</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix p-b-15">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="text-white">{{ $leveltest->type }}</h3>
                                                <span>수업종류</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix p-b-15">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="text-white" style="font-size: 20px;">{{ date('Y-m-d', strtotime($leveltest->date)) }} @lang('button.'. date('D', strtotime($leveltest->date)) )</h3>
                                                <span>체험날짜</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix p-b-15">
                                            <div class="icon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="text-white">{{ date_formater('time_format',$leveltest->time) }}</h3>
                                                <span>수업시간</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-4 col-sm-4 col-lg-2 ">
                               <div class="au-card recent-report bg-info p-b-2 p-2 ">
                                    <div class="au-card-inner">
                                        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
                                            <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <circle class="circle-chart__circle" stroke="#f0ad4e" stroke-width="2" stroke-dasharray="{{$leveltest->comprehension * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                            <g class="circle-chart__info">
                                            <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{$leveltest->comprehension * 10 }}%</text>
                                            <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.comprehension')</text>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                        </div>
                        <div class="col-4 col-sm-4 col-lg-2 ">
                            <div class="au-card recent-report  bg-info p-2">
                                <div class="au-card-inner">
                                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
                                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <circle class="circle-chart__circle" stroke="#f0ad4e" stroke-width="2" stroke-dasharray="{{$leveltest->pronounciation * 10}},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{$leveltest->pronounciation * 10}}%</text>
                                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.pronounciation')</text>
                                      </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-lg-2 ">
                            <div class="au-card recent-report  bg-info p-2">
                                <div class="au-card-inner">
                                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
                                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <circle class="circle-chart__circle" stroke="#f0ad4e" stroke-width="2" stroke-dasharray="{{ $leveltest->fluency * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->fluency * 10 }}%</text>
                                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.fluency')</text>
                                      </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-lg-2 ">
                            <div class="au-card recent-report  bg-info p-2">
                                <div class="au-card-inner">
                                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
                                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <circle class="circle-chart__circle" stroke="#f0ad4e" stroke-width="2" stroke-dasharray="{{ $leveltest->vocabulary * 10  }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->vocabulary * 10  }}%</text>
                                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.vocabulary')</text>
                                      </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-lg-2 ">
                            <div class="au-card recent-report  bg-info p-2">
                                <div class="au-card-inner">
                                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
                                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <circle class="circle-chart__circle" stroke="#f0ad4e" stroke-width="2" stroke-dasharray="{{ $leveltest->grammar * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $leveltest->grammar * 10 }}%</text>
                                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.grammar')</text>
                                      </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-lg-2 ">
                            <div class="au-card recent-report bg-info p-2">
                                <div class="au-card-inner">
                                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">
                                      <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <circle class="circle-chart__circle" stroke="#f0ad4e" stroke-width="2" stroke-dasharray="{{ $overall * 10 }},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                                      <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ $overall * 10}}%</text>
                                        <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">@lang('label.overall')</text>
                                      </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                        <div class="au-card-title p-3 p-3" style="background-image:url('/lvt/images/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                            <i class="zmdi zmdi-account-calendar"></i>영역별 평가 <i style="font-size: 13px;">(항목별 두번째 그래프는 타수강생 평균치입니다)</i></h3>
                        
                        </div>
                        <div class="au-card-inner" style="padding:20px;">
                            <h3 class="au-progress__title">
                            @lang('label.comprehension')
                            </h3>
                            <div class="progress">
                              <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->comprehension * 10 }}%">
                                {{ $leveltest->comprehension * 10 }}%
                              </div>
                            </div>
                            <div class="progress progressbar-average">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{$avg_comprehension}}%">
                                {{$avg_comprehension}}% 
                              </div>
                            </div>
                            <br>

                            <h3 class="au-progress__title">
                            @lang('label.pronounciation')
                            </h3>
                            <div class="progress">
                              <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->pronounciation * 10 }}%">
                                {{ $leveltest->pronounciation * 10 }}% 
                              </div>
                            </div>
                            <div class="progress progressbar-average">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{$avg_pronounciation}}%">
                                {{$avg_pronounciation}}% 
                              </div>
                            </div>
                            <br>

                            <h3 class="au-progress__title">
                            @lang('label.fluency')
                            </h3>
                            <div class="progress">
                              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->fluency * 10 }}%">
                                {{ $leveltest->fluency * 10 }}%
                              </div>
                            </div>
                            <div class="progress progressbar-average">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{$avg_fluency}}%">
                                {{$avg_fluency}}% 
                              </div>
                            </div>
                            <br>

                            <h3 class="au-progress__title">
                            @lang('label.vocabulary')
                            </h3>
                            <div class="progress">
                              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->vocabulary * 10 }}%">
                                {{ $leveltest->vocabulary * 10 }}% 
                              </div>
                            </div>
                            <div class="progress progressbar-average">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{$avg_vocabulary}}%">
                                {{$avg_vocabulary}}% 
                              </div>
                            </div>
                            <br>

                            <h3 class="au-progress__title">
                            @lang('label.grammar')
                            </h3>
                            <div class="progress">
                              <div class="progress-bar bg-info progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{ $leveltest->grammar * 10 }}%">
                                {{ $leveltest->grammar * 10 }}% 
                              </div>
                            </div>
                            <div class="progress progressbar-average">
                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70"
                              aria-valuemin="0" aria-valuemax="100" style="width:{{$avg_grammar}}%">
                                {{$avg_grammar}}%
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                             <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                <div class="au-card-title p-3" style="background-image:url('/lvt/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>@lang('label.comment')</h3>
                                
                                </div>
                                <div class="au-card-inner" style="padding:20px;">
                                        <div class="alert alert-success m-t-20" role="alert">
                                            <h4 class="alert-heading">@lang('label.overall_comment')</h4>
                                            {!! $leveltest->comment !!}
                                        </div>
                                        <div class="alert alert-success m-t-20" role="alert">
                                            <h4 class="alert-heading">@lang('label.comprehension')</h4>
                                            {!! $leveltest->comprehension_comment !!}
                                        </div>
                                        <div class="alert alert-success m-t-20" role="alert">
                                            <h4 class="alert-heading">@lang('label.fluency')</h4>
                                            {!! $leveltest->pronounciation_comment !!}
                                        </div>
                                        <div class="alert alert-success m-t-20" role="alert">
                                            <h4 class="alert-heading">@lang('label.pronounciation')</h4>
                                            {!! $leveltest->fluency_comment !!}
                                        </div>
                                        <div class="alert alert-success m-t-20" role="alert">
                                            <h4 class="alert-heading">@lang('label.vocabulary')</h4>
                                            {!! $leveltest->vocabulary_comment !!}
                                        </div>
                                        <div class="alert alert-success m-t-20" role="alert">
                                            <h4 class="alert-heading">@lang('label.grammar')</h4>
                                            {!! $leveltest->grammar_comment !!}
                                        </div>
                                </div>
                            </div>
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                <div class="au-card-title p-3" style="background-image:url('/lvt/images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>@lang('label.mistake_&_correction')</h3>
                                
                                </div>
                                <div class="au-card-inner" style="padding:20px;">
                                    @foreach($leveltest->level_test_mistake as $mistake)
                                        <div class="alert alert-default m-t-20" role="alert">
                                            <h4>#{{$loop->iteration}}</h4>
                                            <p class="text-danger">
                                                {{ $mistake->mistake }}
                                            </p>
                                            <p class="text-success">
                                                {{ $mistake->correction }}
                                            </p>
                                        </div>
                                    @endforeach     
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                        <div class="au-card-title p-3" style="background-image:url('/lvt/images/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                            <i class="zmdi zmdi-book"></i>@lang('label.recommended_book')</h3>
                        </div>
                        <div class="au-card-inner" style="padding:20px;">
                            @if($leveltest->book_id)
                            <div class="bb-custom-wrapper">
                                <h1 id="book_title"></h1>
                                <nav>
                                    <a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
                                    <a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
                                    <a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
                                    <a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
                                </nav>
                                <br>
                                <div id="bb-bookblock" class="bb-bookblock">
                                
                                </div>
                             </div>
                            @else
                                <div class="text-center">
                                    <small>@lang('label.no_recommended_book')</small>
                                </div>
                            @endif     
                        </div>
                    </div>
                </div>
            </section>
            <div class="container p-b-80 text-center">
                    <hr>
                <small>※ 체험수업 결과확인 후 정규수업은 회원가입 후 신청 바랍니다. </small>
                <br><br>
                <a href="{{ url('enrollment') }}" class="btn btn-lg btn-primary"> @lang('label.enrollment')</a>
            </div>
            
        </div>
        <!-- END PAGE CONTENT  -->

    </div>

    <!-- Jquery JS-->
    <script src="/lvt/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/lvt/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/lvt/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/lvt/vendor/slick/slick.min.js">
    </script>
    <script src="/lvt/vendor/wow/wow.min.js"></script>
    <script src="/lvt/vendor/animsition/animsition.min.js"></script>
    <script src="/lvt/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/lvt/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/lvt/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/lvt/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/lvt/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script src="/lvt/js/main.js"></script>

    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('js/jquerypp.custom.js') }}"></script>
    <script src="{{ asset('js/jquery.bookblock.js') }}"></script>
    <script>
            preview()

            function preview()
            {
                var id = {{$leveltest->book_id}}
                $.get('{{url('api/pagepreviews/')}}/' + id, function(response){
                    //console.log(response.data)
                        $('.bb-bookblock').html("")
                        $('#book_title').html(response.book.title);

                        $.each(response.pages, function(index, value){
                            
                            var page = '<div class="bb-item">'
                                page += '<a><img style="height:100%; width:100%" src="' + value.url + '" alt="Book Page"/></a>'
                                page += '</div>';
                           
                            $('.bb-bookblock').append(page)
                        })

                        Page.init();

                    })
                   
            }

            var Page = (function() {
                
                var config = {
                        $bookBlock : $( '#bb-bookblock' ),
                        $navNext : $( '#bb-nav-next' ),
                        $navPrev : $( '#bb-nav-prev' ),
                        $navFirst : $( '#bb-nav-first' ),
                        $navLast : $( '#bb-nav-last' )
                    },
                    init = function() {
                        config.$bookBlock.bookblock( {
                            speed : 800,
                            shadowSides : 0.8,
                            shadowFlip : 0.7
                        } );
                        initEvents();
                    },
                    initEvents = function() {
                        
                        var $slides = config.$bookBlock.children();

                        // add navigation events
                        config.$navNext.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'next' );
                            return false;
                        } );

                        config.$navPrev.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'prev' );
                            return false;
                        } );

                        config.$navFirst.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'first' );
                            return false;
                        } );

                        config.$navLast.on( 'click touchstart', function() {
                            config.$bookBlock.bookblock( 'last' );
                            return false;
                        } );
                        
                        // add swipe events
                        $slides.on( {
                            'swipeleft' : function( event ) {
                                config.$bookBlock.bookblock( 'next' );
                                return false;
                            },
                            'swiperight' : function( event ) {
                                config.$bookBlock.bookblock( 'prev' );
                                return false;
                            }
                        } );

                        // add keyboard events
                        $( document ).keydown( function(e) {
                            var keyCode = e.keyCode || e.which,
                                arrow = {
                                    left : 37,
                                    up : 38,
                                    right : 39,
                                    down : 40
                                };

                            switch (keyCode) {
                                case arrow.left:
                                    config.$bookBlock.bookblock( 'prev' );
                                    break;
                                case arrow.right:
                                    config.$bookBlock.bookblock( 'next' );
                                    break;
                            }
                        } );
                    };

                    return { init : init };

            })();

            
        </script>

</body>

</html>
<!-- end document-->