<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" id="fav" type="image/png" href="{{asset('site/img/favicon.png')}}"/>
    <title>{{ setting('site_title', 'LMS') }}</title>
    <script type="text/javascript">
      var baseUrl = "{{url('/')}}"
    </script>
    <!-- Styles -->
   <link href="{{ asset('css/student.css') }}" rel="stylesheet">
   @yield('styles')
   <style>
     /* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

@media (max-width: 990px) {
    .navbar-header {
        float: none;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        margin: 7.5px -15px;
    }
    .navbar-nav>li {
        float: none;
    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
}

   </style>
</head>
<body >
    <div id="loader"></div>
    <div id="app" style="display:none">
    			<nav class="navbar navbar-inverse navbar-embossed" role="navigation" style="border-radius: 0px;">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle"data-toggle="modal" data-target="#myModalMenu">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="{{url('/')}}" target="_blank">홈페이지 가기</a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                      <li class="nav-item dropdown">
                          @if(count(postponed_managers()))
                            @if(count(postponed_managers()) > 1)
                                <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                  <i class="fa fa-list"></i> 수강연기 <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                  @for($i = 0; count(postponed_managers()) > $i; $i++)
                                    <li>
                                      <a href="{{postponed_managers()[$i]['url']}}"><i class="fa fa-clock-o"></i> {{postponed_managers()[$i]['label']}}</a>
                                    </li>
                                  @endfor
                                </ul> 
                            @else
                                <a  href="{{postponed_managers()[0]['url']}}"><i class="fa fa-file"></i> 수강연기</a>
                            @endif
                          @endif
                      </li>
                      <li class="nav-item dropdown">
                         @if( count(today_classroom()) )
                      	 	 @if( count(today_classroom()) > 1)
                                <a href=""  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-video-camera"></i> @lang('button.class_room') <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  @for($i= 0; count(today_classroom()) > $i; $i++)
                                    <li>
                                      <a target="_blank" href="{{today_classroom()[$i]['url']}}"><i class="fa fa-video-camera"></i> {{today_classroom()[$i]['time']}}</a>
                                    </li>
                                  @endfor
                                </ul> 
                            @else
                      	 		    <a target="_blank" href="{{today_classroom()[0]['url']}}"><i class="fa fa-video-camera"></i> @lang('button.class_room')</a>
                            @endif
                          @else
                            <a href="{{route('dashboard.class.index')}}"><i class="fa fa-video-camera"></i> @lang('button.class_room')</a>
                          @endif
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              비밀번호/프로필 <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard.profile.index') }}">
                                  @lang('button.profile')
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard.profile.changepassword') }}">
                                  @lang('button.change_password')
                                </a>
                            </li>
                            <li>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                   @lang('button.logout')
                              </a>
                            </li>
                        </ul>
                      </li>


                </ul>

              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

    @if(is_desktop())
    <div class="container-fluid">
      <div class="row">
	    	<div class="col-sm-2">
            <div class="box hidden-sm hidden-xs">
              @yield('student_side_menu')
            </div>
            
	    	</div>

	    	<div class="col-sm-10">

          @include('partials.error')

          @include('partials.message')
         	@yield('content')
	    	</div>
    	</div>

      </div>
    </div>
    @else
      @include('partials.error')

      @include('partials.message')
      @yield('content')
    @endif
    	<div class="spacer"></div>
    	<div class="spacer"></div>
  
	</div>
    <div class="modal fade" id="myModalMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: transparent;">
          <div class="todo">
            <div class="todo-search" style="color:white">
              <h5>Menu <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-remove"></i></button></h5>
               <div class="clearfix"></div>
            </div>
            <ul>
              <li @if(Request::segment(2) == "class")  class="todo-done" @endif >
                <div class="todo-icon fa fa-user"></div>
                <div class="todo-content">
                  <a href="{{route('dashboard.class.index')}}" >
                      <h4 class="todo-name">
                      내 수업
                      </h4>
                  </a>
                </div>
              </li>
              <li @if(Request::segment(2) == "calendar")  class="todo-done" @endif >
                <div class="todo-icon fa fa-calendar"></div>
                <div class="todo-content">
                  <a href="{{route('dashboard.calendar.index')}}" >
                      <h4 class="todo-name">
                      스케줄/코멘트
                      </h4>
                  </a>
                </div>
              </li>
               <li  @if(Request::segment(2) == "book")  class="todo-done" @endif >
                <div class="todo-icon fa fa-book"></div>
                <div class="todo-content">
                  <a href="{{route('dashboard.book.index')}}">
                    <h4 class="todo-name">
                      교재보기 
                    </h4>
                  </a>
                </div>
              </li>
              <li  @if(Request::segment(2) === "rating") class="todo-done" @endif >
                  <div class="todo-icon fa fa-pie-chart"></div>
                  <div class="todo-content">
                    <a href="{{route('dashboard.rating.year')}}">
                      <h4 class="todo-name">
                          월별평가보기
                      </h4>
                    </a>
                  </div>
              </li>
              <li @if(Request::segment(2) == "proofreading")  class="todo-done" @endif >
                <div class="todo-icon fa fa-file-word-o"></div>
                <div class="todo-content">
                  <a href="{{ route('dashboard.proofreading.index') }}">
                    <h4 class="todo-name">
                      영작교정
                    </h4>
                  </a>
                </div>
              </li>
              <li @if(Request::fullUrl() == url("dashboard/message?from=teacher"))  class="todo-done" @endif>
                <div class="todo-icon fa fa-comments"></div>
                <div class="todo-content">
                  <a href="{{route('dashboard.message.index')}}">
                  <h4 class="todo-name">
                   강사와 대화 
                  </h4>
                  </a>
                </div>
              </li>
              <li @if(Request::segment(2) == "testimonial")  class="todo-done" @endif >
                <div class="todo-icon fa fa-rss"></div>
                <div class="todo-content">
                  <a href="{{route('dashboard.testimonial.index')}}">
                  <h4 class="todo-name">
                      수강후기 
                  </h4>
                  </a>
                </div>
              </li>
              <li @if(Request::fullUrl() == url("dashboard/message?from=admin"))  class="todo-done" @endif>
                <div class="todo-icon fa fa-question" ></div>
                <div class="todo-content">
                  <a href="{{ route('dashboard.message.index', ['from' => 'admin']) }}">
                  <h4 class="todo-name">
                    1:1문의 
                  </h4>
                  </a>
                </div>
              </li>
              <li >
                <div class="todo-icon fa fa-file"></div>
                <div class="todo-content">
                  <a href="{{ route('dashboard.certificate.index') }}">
                  <h4 class="todo-name">
                     확인서
                  </h4>
                  </a>
                </div>
              </li>
            </ul>
          </div><!-- /.todo -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Scripts -->
    <script src="{{ asset('js/student.js') }}"></script>
    <script src="/js/lang.js"></script>
    <script>
      $(document).ready(function(){
          $('#loader').fadeOut();
          $('#app').fadeIn('slow');
      })
    </script>
    @yield('scripts')
</body>
</html>
