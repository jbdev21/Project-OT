<?php header('Content-type: text/html; charset=euc-kr'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Black+And+White+Picture|Black+Han+Sans|Cute+Font|Do+Hyeon|Jua|Kirang+Haerang|Nanum+Gothic|Nanum+Myeongjo|Nanum+Pen+Script" rel="stylesheet">
	<meta name="description" content="온톡 화상영어/온톡 전화영어 since 2006. 초등학생이였던 수강생들이 대학생이 되어서도 계속 수업하는 화상영어">
	<meta property="og:type" content="website">
	<meta property="og:title" content="온톡 화상/전화영어 since 2006">
	<meta property="og:description" content="온톡 화상영어/온톡 전화영어 since 2006. 초등학생이였던 수강생들이 대학생이 되어서도 계속 수업하는 화상영어">
	<meta property="og:image" content="http://www.ontalk.co.kr/site/img/logo1.png">
	<meta property="og:url" content="http://www.ontalk.co.kr">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" id="fav" type="image/png" href="{{asset('site/img/favicon.png')}}"/>
	<title>{{ setting('site_title', 'LMS') }}</title>
	<script type="text/javascript">
        const baseUrl = '{{url('/')}}'
    </script>
	
	<script src="https://www.youtube.com/iframe_api"></script>

    <link href="{{asset('css/site.css')}}" rel="stylesheet">
  	@guest
	     <link rel="stylesheet" href="{{ asset('site/css/bootstrap-datetimepicker.min.css') }}" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
  	@endguest
    @yield('styles')
	<style>
		@media only screen and (max-width : 768px){
  			.navbar-brand img {
				height:50px;
			}
		}

		.mobileloginlink {
				color:white;
				margin-top:10px !important;
				right:80px;
				position:absolute;
		}

		.mobileloginlink a{
			font-size:12px !important;
			border:0px !important;
		}
	</style>
  </head>

  <body>
  	@yield('top-noti')
  	<div id="app">
  		<div class="mobile-navbar" style="display: none;">
  			<div class="mobile-navbar-header">
  				<div>
  					<a class="navbar-brand center-block"  href="{{url('/')}}"><img src="{{asset('site/img/logo1.png')}}" height="45"></a>
  				</div>
  				<div>
  					<a  id="close" class="pull-right close-mobile-nav btn btn-danger"><i class="fa fa-remove"></i></a>
  					<div class="clearfix"></div>
  				</div> 				
  			</div>	
  			<div class="clearfix"></div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  					<a href="{{route('page', 'videoclass')}}">수업소개</a>
  				</div>
  				<div class="col-xs-7" style="position:relative">
				  	<a href="{{route('page', 'videoclass')}}">화상영어</a>
    				<a href="{{route('page', 'phoneclass')}}"> 전화영어 </a>
    				<a href="{{ route('leveltest.register') }}" > 무료체험 </a>
  				</div>
  			</div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  					<a href="">수업과정</a>
  				</div>
  				<div class="col-xs-7 ">
  					<a href="{{route('curriculum')}}"> 수업과정</a>
    				
  				</div>
  			</div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  					<a href="">수업후기</a>
  				</div>
  				<div class="col-xs-7 ">
  					<a href="{{route('testimonial')}}">수업후기</a>
		    		<a href="{{route('teacher')}}">강사소개</a>
  				</div>
  			</div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  					<a href="{{route('enrollment.step1')}}">수강신청/수강료</a>
  				</div>
  				<div class="col-xs-7 ">
  					<a href="{{route('enrollment.step1')}}">수강신청/수강료</a>
  					<a href="#" data-toggle="modal" data-target="#freeClassCouponModal">@lang('label.free_coupon_class')</a>
  				</div>
  			</div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  					<a href="{{route('notice')}}" data-toggle="dropdown">고객센터</a>
  				</div>
  				<div class="col-xs-7 ">
					<a href="{{route('notice')}}">공지사항</a>
    				<a href="{{route('faq')}}"> 수업규칙</a>
    				<a href="{{route('dashboard.message.create')}}?to=admin">1:1문의</a>
    				<a href="{{route('blog')}}">블로그</a>
  				</div>
  			</div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  					<a href="{{route('dashboard.class.index')}}" >마이페이지 </a>
  				</div>
  				<div class="col-xs-7 ">
					<a href="{{route('dashboard.class.index')}}">수강내역</a>
					<a href="{{route('dashboard.rating.index')}}">월별평가보기</a>
					<a href="{{route('dashboard.book.index')}}">교재보기 </a>
					<a href="{{ route('dashboard.proofreading.index') }}">수강내역 </a>
					<a href="{{ route('dashboard.message.index') }}">강사와대화 </a>
					<a href="{{ route('dashboard.certificate.index') }}"> 확인서발급 </a>
					<a href="https://www.raz-kids.com/" target="_blank">영어도서관</a>
  				</div>
  			</div>
  			<div class="row link-list">
  				<div class="col-xs-5">
  				
  				</div>
  				<div class="col-xs-7 ">
					@guest
	            				<a href="{{route('register')}}">회원가입</a>
	            				<a href="{{ url('login') }}" >로그인</a>
	            			@else
								<a href="{{route('dashboard.class.index')}}" >강의실</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
                              	</form>
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									로그아웃
								</a>
	            			@endif
  				</div>
  			</div>
		</dl>
  		</div>	
       	<nav class="navbar">
	      	<div class="container">
		        <div class="navbar-header" >
					
		          <button type="button" class="navbar-toggle collapsed menu-burger" style="background-color: #ccc" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-controls="navbar1">
		            <span class="sr-only">Toggle navigation</span>
		            <i class="fa fa-navicon"></i>
		          </button>
		          <a class="navbar-brand center-block" href="{{url('/')}}"><img width="90%" class="center-block img-responsive" src="{{asset('site/img/logo1.png')}}" ></a>
		        	<span class="visible-sm visible-xs pull-right  mobileloginlink">
					 	<ul class="nav navbar-nav navbar-right">
							@guest
								<a href="{{route('register')}}">회원가입</a>
						
								@if(is_desktop())
									<a href="#"  data-toggle="modal" data-target="#login-modal">로그인</a>
								@else 
									<a href="{{ url('login') }}">로그인</a>
								@endif
							@else
								<a href="{{route('dashboard.class.index')}}" >수강내역</a>
							
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									로그아웃
								</a>
							@endif
						</ul>
					</span>
				</div>
		        
		        <div id="navbar" class="collapse navbar-collapse">
		          <ul class="nav navbar-nav navbar-right">
		            <li class="active dropdown">
		            	<a href="{{route('page', 'videoclass')}}"  data-toggle="dropdown">수업소개</a>
		            	<div class="dropdown-menu dropdown-menu-left nav-dropdown">
						   	<a href="{{route('page', 'videoclass')}}">화상영어</a>
		    				<a href="{{route('page', 'phoneclass')}}"> 전화영어 </a>
		    				<a href="{{ route('leveltest.register') }}" > 무료체험 </a>
						<img src="{{asset('image/bg-nav.jpg')}}" alt="" style="height:268px;position:relative;z-index:99999; right:690px; bottom:127px; ">
						</div>
		            </li>

		            <li class="dropdown">
		            	<a href="{{route('curriculum')}}"> 수업과정</a>
		            	<div class="dropdown-menu dropdown-menu-left nav-dropdown" aria-labelledby="dLabel">
		            		<a href="{{route('curriculum')}}"> 수업과정</a>
						</div>
		            </li>

		            <li class="dropdown">
		            	<a href="{{route('testimonial')}}">수업후기</a>
		            	<div class="dropdown-menu dropdown-menu-left nav-dropdown" aria-labelledby="dLabel">
		            			<a href="{{route('testimonial')}}">수업후기</a>
		    				<a href="{{route('teacher')}}">강사소개</a>
						</div>
		            </li>

		            <li class="dropdown">
		            	<a href="{{route('enrollment.step1')}}">수강신청/수강료</a>
		            	<div class="dropdown-menu dropdown-menu-left nav-dropdown" aria-labelledby="dLabel">
						   <a href="{{route('enrollment.step1')}}">수강신청/수강료</a>
						   <a href="#" data-toggle="modal" data-target="#freeClassCouponModal" >@lang('label.free_coupon_class')</a>
						  </div>
		            </li>

		            <li class="dropdown">
		            	<a href="#contact" data-toggle="dropdown">고객센터</a>
		            	 <div class="dropdown-menu dropdown-menu-left nav-dropdown" aria-labelledby="dLabel">
						   	<a href="{{route('notice')}}">공지사항</a>
		    				<a href="{{route('faq')}}"> 수업규칙</a>
		    				<a href="{{route('dashboard.message.create')}}?to=admin">1:1문의</a>
		    				<a href="{{route('blog')}}">블로그</a>
						  </div>
		            </li>
		            
		            <li class="dropdown">
		            	<a href="{{route('dashboard.class.index')}}" >마이페이지 </a>
		            	 <div class="dropdown-menu dropdown-menu-left nav-dropdown" aria-labelledby="dLabel">
							<a href="{{route('dashboard.class.index')}}">수강내역</a>
							<a href="{{route('dashboard.rating.index')}}">월별평가보기</a>
							<a href="{{route('dashboard.book.index')}}">교재보기 </a>
							<a href="{{ route('dashboard.proofreading.index') }}">영작교정 </a>
							<a href="{{ route('dashboard.message.index') }}">강사와대화 </a>
							<a href="{{ route('dashboard.certificate.index') }}"> 확인서발급 </a>
							<a href="https://www.raz-kids.com/" target="_blank">영어도서관</a>
						</div>
		            </li>
	            	<li class="last-link">
	            		<div class="mini-link pull-right">
	            			@guest
	            				<a href="{{route('register')}}">회원가입</a>
								@if(is_desktop())
	            					<a href="#"  data-toggle="modal" data-target="#login-modal">로그인</a>
								@else 
									<a href="{{ url('login') }}">로그인</a>
								@endif
	            			@else
								<a href="{{route('dashboard.class.index')}}" >강의실</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
                              	</form>
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									로그아웃
								</a>
	            			@endif
	            			
	            		</div>
	            	</li>
		            	
		          </ul>
		        </div><!--/.nav-collapse -->
	      	</div>
    	</nav>
		<div id="menu-tab" style="background-color:white; height:270px;">
				<!-- <img src="{{asset('image/menu-bgnew.jpg')}}" alt="" style="height:100%;z-index:-1; position:absolute; left: 0;background: no-repeat center top;"> -->
			<div class="container">
				<div class="flex">
					<div style="background-color: transparent; width: 100px !important;">
					
					</div>
	    		</div>
    		</div>
		</div>
    	
		@yield('content')
      <div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
						<img class="center-block img-responsive" src="{{asset('site/img/logo1.png')}}" >
				</div>
				<div class="col-sm-10">
					<small>
						선데이투피엠영어센터 대전광역시 중구 목중로26번길 29 전화 : 1661-5350 대표 : 김경덕 사업자등록번호 : 305-31-87449 <br>
						통신판매업신고 : 제2014-대전중구-0073호 ontalk@ontalk.co.kr 무통장 : 농협 551-12-669795 김경덕 <br>
						© 2006 ONTALK. All Rights Reserved (Renewed 2014)
					</small>
				</div>
			</div>
        
        </div>
	    </div>
      </div>

</div>

	@guest
      @include(theme('partials.login-modal'))
    @endguest
	<!-- Modal -->
<div class="modal fade" id="freeClassCouponModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <form action="{{ route('enrollment.coupon.validate') }}" method="post" id="freecouponform">
            {{ csrf_field() }}
			<label>@lang('label.coupon_code')</label>
            <input class="form-control" required name="code" id="freecouponCode">
            <input type="hidden" required name="type" value="free_class" >
            <br>
            <div class="alert alert-danger no-coupon" style="display:none">@lang('label.no_coupon_found')</div>
            <br>
            <button type="submit" class="btn btn-primary">@lang('button.submit')</button>
        </form>
      </div>
    </div>
  </div>
</div>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/site.js')}}"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
				$('.navbar, .nav-dropdown, #menu-tab').mouseover(function(){
					$('.nav-dropdown').show()
						$('#menu-tab').show()
					}).mouseout(function(){
						$('.nav-dropdown').hide()
						$('#menu-tab').hide()
					})

					$('.navbar-header button').click(function(){
						$('.mobile-navbar').show();
					})

					$('.mobile-navbar #close').click(function(){
					$('.mobile-navbar').hide();
					$('.nav-dropdown').hide()
					$('#menu-tab').hide()
					});

				$('#freecouponform').submit(function(e){
					e.preventDefault();
					
					var code = $('#freecouponCode').val();
					
					axios.post('/enrollment/coupon/validate',{
						code: code,
						type: 'free_class'
					})
					.then( function(response) {
						if(response.data)
						{
							$('.no-coupon').hide() 
							window.open(response.data, '_self');
						}else{
							$('.no-coupon').show()    
						}
					})
					.catch( function(error){
						console.log( error )
					})
				})
    	})
    </script>
	<script src="{{asset('site/js/moment.min.js')}}"></script>
	<script src="{{asset('site/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	@yield('scripts')
  @guest
	<script type="text/javascript">
		$('#login').submit(function(e){
			
			if(e.preventDefault) e.preventDefault();

				var url = '{{url('login')}}';
				
				$.ajax({
					type: 'POST',
					url: url,
					data: $(this).serialize(),
					success: function( data ){
						//var isIE = /*@cc_on!@*/false || !!document.documentMode;
						//if(msieversion()){
						//	window.open('/dashboard/class');
						//}else{
						///	window.open('/dashboard/class','_blank');
						//}
						location.reload()
					},
					error: function( response ){
						$('#login-message').show();
						$('#login-message').html( "{{trans('auth.failed')}}" )
						console.log(response.responseText)
					}
				});
				})
			});

		</script>
		@endguest

	<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
	<script type="text/javascript">
		if(!wcs_add) var wcs_add = {};
		wcs_add["wa"] = "55c9fd58be8d84";
		wcs_do();
	</script>

  </body>
</html>
