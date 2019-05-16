{{-- <div class="side_menu_links">
	<a href="{{route('dashboard.class.index')}}" @if(Request::segment(2) == "class")  class="active" @endif><label for="">My Class</label></a>
	<a href="{{route('dashboard.calendar.index')}}"  @if(Request::segment(2) == "calendar")  class="active" @endif> <label for="">Celendar</label></a>
	<a href="{{route('dashboard.rating.index')}}"   @if(Request::segment(2) == "rating")  class="active" @endif><label for="">Rating</label></a>
	<a href="{{route('dashboard.book.index')}}"  @if(Request::segment(2) == "book")  class="active" @endif> <label for="">Book</label></a>
	<a href="#"><label for="">Setting</label></a>
	<a href="#"> <label for="">Help</label></a>
</div> --}}
<div class="todo" id="student_menu">
            <div class="todo-search" style="color:white">
              <h5>
                {{Auth::user()->username}}
              </h5>
                {{Auth::user()->korean_name}}
                <br>
                {{Auth::user()->name}}<br>
                {{Auth::user()->contact_number}}
                @if(Auth::user()->contact_number1)
                <br>{{Auth::user()->contact_number1}}
                @endif
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
              <li  @if(Request::segment(2) == "rating")  class="todo-done" @endif >
                <div class="todo-icon fa fa-pie-chart"></div>
                <div class="todo-content">
                	<a href="{{route('dashboard.rating.year')}}">
                		<h4 class="todo-name">
		                    월별평가
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
              <li @if(Request::fullUrl() == url("dashboard/message?from=teacher"))  class="todo-done" @endif >
                <div class="todo-icon fa fa-comments"></div>
                <div class="todo-content">
                  <a href="{{route('dashboard.message.index', ['from' => 'teacher'])}}">
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
                <div class="todo-icon fa fa-question"></div>
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
              <li >
                <div class="todo-icon fa fa-refresh"></div>
                <div class="todo-content">
                  <a href="{{ url('enrollment') }}" target="_blank">
                  <h4 class="todo-name">
                     수강등록
                  </h4>
                  </a>
                </div>
              </li>
            </ul>
          </div><!-- /.todo -->
