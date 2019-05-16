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
    <script>
      
      const userLogged = {!! Auth::user() !!}
      var tabNoti = 0;
      var site_title = "{{ setting('site_title', 'LMS') }}"
      var fav = "{{asset('site/img/favicon.png')}}"
      function addtabNoti()
      {
        tabNoti++;
        document.title = "(" +  tabNoti + ") " + site_title
        document.getElementById('fav').href = "{{asset('site/img/favicon1.png')}}";
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
    @yield('styles')
</head>
  </head>

  <body class="nav-md unresponsive" onclick="removetabNoti()">
    <div class="container body" id="app">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>{{ setting('site_title', 'LMS') }}</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  @if(Auth::user()->image)
                  <img src="{{ asset('profile/'. Auth::user()->image) }}" alt="..." class="img-circle profile_img">

                  @else
                  <img src="{{asset('/image/admin-profile.png')}}" alt="..." class="img-circle profile_img">
                  @endif
            
              </div>
              <div class="profile_info">
                <span> 안녕하세요,</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>@lang('label.general')</h3> -->
                <ul class="nav side-menu">
                  <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> @lang('menu.dashboard')</a></li>
                  <li class="active"><a><i class="fa fa-edit"></i> @lang('menu.class_manager') <class-general-badge></class-general-badge> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:block">
                      <li><a href="{{route('admin.classer.today')}}">@lang('menu.today_session')</a></li>
                      <li><a href="{{route('admin.classer.index')}}"> 진행중 수업</a></li>
                      <li>
                          <a href="{{route('admin.classer.new')}}">
                           @lang('menu.new_enrolled_class')
                          <class-badge></class-badge> 
                          </a> 
                      </li>
                      <li><a href="{{route('admin.classer.create')}}">@lang('menu.create_class')</a></li>
                      <li><a href="{{route('admin.classer.postponed')}}">@lang('menu.postponed_class') <postponed-badge></postponed-badge></a></li>
                      <li><a href="{{route('admin.classer.all')}}">전체수업</a></li>
                      <li><a href="{{route('admin.classer.ended')}}"> @lang('menu.ended_class')</a></li>
                      
                      @if(setting('default_video_vitual_room') == 'braincert' )
                        <li>
                          <a href="{{route('admin.classer.failedRequest')}}">
                            @lang('menu.braincert_faild_request') <span v-show="failedBraincertRequest > 0 " class="badge bg-green"> @{{ failedBraincertRequest }}</span>
                          </a>
                        </li>
                      @endif
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list"></i> @lang('menu.leveltest') <span v-cloak v-show="newLeveltestAll > 0" class="badge bg-green" id="leveltest-badge">@{{ newLeveltestAll }}</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.leveltest.index')}}">@lang('menu.leveltest') <span v-cloak v-show="newLeveltestpending > 0" class="badge bg-green" id="leveltest-badge">@{{ newLeveltestpending }}</span></a></li>
                      <li><a href="{{route('admin.leveltest.new')}}">@lang('menu.new_level_test') <leveltest-badge></leveltest-badge></a>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> @lang('menu.student_manager') <student-menu-badge></student-menu-badge>  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.student.create')}}">@lang('menu.create_student')</a></li>
                      <li><a href="{{route('admin.student.index')}}">@lang('menu.all_student')</a></li>
                      <li><a href="{{route('admin.comment.index')}}">@lang('menu.monthly_comment')</a></li>
                      <li><a href="{{route('admin.proofreading.new')}}">@lang('menu.new_proofreading') <proofreading-badge></proofreading-badge></a></li>
                      <li><a href="{{route('admin.proofreading.index')}}">@lang('menu.proofreading') <proofreading-noreplay-badge></proofreading-noreplay-badge></a></li>
                      <li><a href="{{route('admin.message.index')}}">@lang('menu.1:1') <new-message-badge></new-message-badge> </a></li>
                      <li @if(route('admin.message.index', ['recipient' => "all"]) == url()->full()) class="active" @endif><a href="{{route('admin.message.index', ['recipient' => "all"])}}">강사메세지</a></li>
                      {{-- <li><a href="{{route('admin.student.index')}}">Archived</a></li> --}}
                    </ul>
                  </li>
                  <li><a><i class="fa fa-female"></i> @lang('menu.teacher_manager') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{route('admin.teacher.create')}}">@lang('menu.create_teacher')</a></li>
                      <li><a href="{{route('admin.teacher.index')}}">@lang('menu.all_teacher')</a></li>
                      <li><a href="{{route('admin.teacherprofile.index')}}">@lang('menu.teacher_profile')</a></li>
                      
                    {{--   <li><a href="{{route('admin.teacher.messenger')}}" target="_blank">Team</a></li>
                      <li><a href="{{route('admin.teacher.messenger')}}" target="_blank">Lunch Messanger</a></li> --}}
                    </ul>
                </li>
                  <li><a><i class="fa fa-list"></i> @lang('menu.course_manager') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.course.create')}}">@lang('menu.create_course')</a></li>
                      <li><a href="{{route('admin.course.index')}}">@lang('menu.all_course')</a></li>
                      <li><a href="{{route('admin.coursetype.index')}}">@lang('menu.course_type')</a></li>
                      <li><a href="{{route('admin.coupon.index')}}">@lang('menu.coupon')</a></li>
                      <li><a href="{{route('admin.coupon.unused')}}">@lang('label.unused')</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i>@lang('menu.book_manager') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.book.create')}}">@lang('menu.create_book')</a></li>
                      <li><a href="{{route('admin.book.index')}}">@lang('menu.all_book')</a></li>
                      <li><a href="{{route('admin.curriculum.index')}}">@lang('menu.curriculum')</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-pencil"></i>@lang('menu.content_manager') <inquiry-badge></inquiry-badge>  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.notice.index')}}">@lang('menu.notice')</a></li>
                      <li><a href="{{route('admin.faq.index')}}">@lang('menu.faq')</a></li>
                      {{-- <li><a href="{{route('admin.inquiry.index')}}">@lang('menu.1_1_inquiry') <span v-cloak class="badge bg-green" v-show="newInquiry > 0"> @{{ newInquiry }}</span> </a></li> --}}
                      <li><a href="{{route('admin.blog.index')}}">@lang('menu.blog')</a></li>
                      <li><a href="{{route('admin.testimonial.index')}}">@lang('menu.testimonial')  <span  v-cloak v-show="newTestimonial > 0 " class="badge bg-green"> @{{ newTestimonial }}</span></a></li>
                      <li><a href="{{route('admin.popup.index')}}">@lang('menu.popup')</a></li>
                      <li><a href="{{route('admin.banner.index')}}">@lang('menu.banner')</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-calendar"></i>@lang('menu.holiday_manager') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.holiday.create')}}">@lang('menu.create_holiday')</a></li>
                      <li><a href="{{route('admin.holiday.index')}}">@lang('menu.all_holiday')</a></li>
                    </ul>
                  </li>
                  </li>
                   <li><a><i class="fa fa-gears"></i>@lang('menu.setting') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.setting.general')}}">@lang('menu.general')</a></li>
                      <!-- <li><a href="{{route('admin.setting.general')}}">@lang('menu.class_&_session')</a></li> -->
                      <!-- <li><a href="{{route('admin.setting.notification')}}">@lang('menu.notification')</a></li> -->
                      <!-- <li><a href="{{route('admin.setting.queuing')}}">@lang('menu.queuing')</a></li> -->
                      <li><a href="{{route('admin.setting.payment')}}">@lang('menu.payment_gateway')</a></li>
                      <li><a href="{{route('admin.setting.video')}}">@lang('menu.virtual_classroom')</a></li>
                      <li><a href="{{route('admin.setting.system')}}">@lang('menu.system')</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
             

            </div>
     
            <!-- <div class="sidebar-footer hidden-small text-center">
           		Developed by Jofie Bernas
            </div> -->
      
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle" style="z-index:999999"><i class="fa fa-bars"></i></a>
              </div>
              @if(is_desktop())
              <ul class="nav navbar-nav times">
                <li>  
                    Kor: <iframe src="http://free.timeanddate.com/clock/i67jkhfo/n235/tct/pct/th1" frameborder="0" width="57" height="18" allowTransparency="true"></iframe>
                 </li>
                <li>
                      Phil: <iframe src="http://free.timeanddate.com/clock/i67jkghf/n145/tct/pct/th1" frameborder="0" width="57" height="18" allowTransparency="true"></iframe>
                 </li>
              </ul>
              @endif
              <ul class="nav navbar-nav navbar-right">
                @if(!is_desktop())
                <li>
                <a href="{{route('admin.student.index')}}">@lang('menu.all_student')</a>
                </li>
                <li><a href="{{route('admin.classer.index')}}">진행중 수업</a></li>
                @endif
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      @if(Auth::user()->image)
                       <img src="{{ asset('profile/'. Auth::user()->image) }}" alt="..." >
                      @else
                        <img src="{{asset('/image/admin-profile.png')}}" alt="..." >
                      @endif
                     
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{route('admin.profile.index')}}"> @lang('button.profile')</a></li>
                    <li><a href="{{route('admin.profile.changepassword')}}"> @lang('button.change_password')</a></li>
                    <li><a href="#"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                      ><i class="fa fa-sign-out pull-right"></i> @lang('button.logout')</a></li>
                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                  </ul>
                </li>
                <notification></notification>
                @if(is_desktop())
                <li>
                <a href="{{route('admin.student.index')}}">@lang('menu.all_student')</a>
                </li>
                <li><a href="{{route('admin.classer.index')}}">진행중 수업</a></li>
                @endif
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h3>
                  @if(Request::segment(2) == "leveltest")
                    @lang('label.level_test') @lang('label.manager')
                  @elseif(Request::segment(2) == "subclass")
                    @lang('label.sub_class') @lang('label.manager')
                  @elseif(Request::segment(2) == "classer")
                    @lang('label.class') @lang('label.manager')
                  @elseif(Request::segment(2) == "dashboard")
                        
                  @else
                    @lang('label.' . Request::segment(2)) @lang('label.manager')
                  @endif
              </h3> -->
              <br>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  @include('partials.error')
                  @include('partials.message')
                </div>
              </div>
              
            </div>
           
              @yield('content')


            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Reserved &copy{{date('Y')}}  |  <a href="{{ url('/') }}">{{ setting('site_title', 'LMS') }}</a> v1.0
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      
    </div>
    
     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/tinymce-lang/ko_KR.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    <script src="/js/lang.js"></script>
    <script>
      $(document).ready(function(){
        var new_classes;

        axios.get('{{url('admin/get_new_class')}}')
          .then( (response) => {
            new_classes = response.data;
          })

         
      })
    </script>
   
    @yield('editor')
    @yield('scripts')
    
  </body>
</html>
