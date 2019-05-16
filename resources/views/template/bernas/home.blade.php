@extends(theme('layout.app'))
@section('content')
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position: relative;">
				  <!-- Indicators -->
				  <!-- <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol> -->

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				    	<div class="jumbotron" style="background-image:url('{{ asset('image/bg/bg1.png') }}'); background-size:cover; background-position:center;  color:white;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-7">
									<img src="{{ asset('image/bg/overlay.png')}}" alt="" class="img-responsive">

						      	</div>
								<div class="col-sm-5 text-left">
									<div class="embed-responsive embed-responsive-16by9">
									  	<iframe width="751" height="578" src="https://www.youtube.com/embed/PMQa3eG42wA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>
									<br>
									<div class="embed-responsive embed-responsive-16by9">
									  	<iframe width="751" height="578" src="https://www.youtube.com/embed/mGZ-C2bYJb4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>
										
										<p style="font-size:13px;">※ 영상의 저작권은 각 크리에이터 소유임</p>
										
								</div>
								</div>
						      </div>
							</div>
						</div>
				    </div>
				    <!-- <div class="item">
				      <div class="jumbotron" style="background-image:url('https://i.ytimg.com/vi/8U1vaTPypvE/maxresdefault.jpg'); background-position:top; color:black">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-5 text-left">
						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				    <div class="item">
				      <div class="jumbotron" style="background-image:url('{{ asset('image/bg/bg1.png') }}');background-size:cover; background-position:center;  color:white;">
      						<div class="container">
						      <div class="row">
						      	<div class="col-sm-5 text-left">
						      		<h2>민족문화의</h2>
						      		<p>및 민족문화의 창달에 노력하여 대통령으로서의 직책을 성실히 수행할 것을 국민 앞에 엄숙히 선서합니다</p>
						      	</div>
						      	<div class="col-sm-7">
						      		<img src="{{asset('site/img/global-networking-responsive-img.png')}}" class="img-reponsive">
						      	</div>
						      </div>
							</div>
						</div>
				    </div>
				  </div> -->
			</div>
		<div class="container">
		<br>
		<br>
			<div class="row featurite visible-xs">
				<div class="col-xs-4 text-center">
							<a href="{{route('page', 'videoclass')}}">
								<img style="" src="{{asset('image/icons/video_class.png')}}" class="img-reponsive center-block ">
								화상영어
							</a>
						</div>	
						<div class="col-xs-4  text-center">
							<a href="{{route('page', 'phoneclass')}}">
								<img style="" src="{{asset('image/icons/phone_class.png')}}" class="img-reponsive center-block">
								전화영어
							</a>
						</div>
						<div class="col-xs-4  text-center">
							<a href="{{ url('leveltest/register') }}">
								<img style="" src="{{asset('image/icons/freeLVT.png')}}" class="img-reponsive center-block">
								무료체험
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="{{route('testimonial')}}">
								<img  src="{{asset('image/icons/testimonials.png')}}" style="width:68%;" class="img-reponsive center-block">
								수업후기 
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="{{route('teacher')}}">
								<img  src="{{asset('image/icons/teachers.png')}}" style="width:68%;" class="img-reponsive center-block">
								강사소개 
							</a>
						</div>
						<div  class="col-xs-4 text-center">
							<a href="{{route('dashboard.class.index')}}" >
								<img style="" src="{{asset('image/icons/myPage.png')}}" class="img-reponsive center-block">
								마이메뉴
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="{{route('faq')}}">
								<img style="" src="{{asset('image/icons/QnA.png')}}" class="img-reponsive center-block">
								FAQ
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="{{route('blog')}}">
								<img style="" src="{{asset('image/icons/blog.png')}}" class="img-reponsive center-block">
								블로그 
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="{{url('enrollment')}}">
								<img style="" src="{{asset('image/icons/register.png')}}" class="img-reponsive center-block">
								수강신청
							</a>
						</div>

			</div>

			<div class="row featurite hidden-xs">
				<div class="col-sm-4">
					<h4 class="text-center ">
						수업소개
					</h4>
					<!-- <img style="width:50px" src="{{asset('image/icons/video_class.png')}}" class="img-reponsive center-block "> -->
					<div class="row animated slideInLeft ">
						<div class="col-xs-4 text-center">
							<a href="{{route('page', 'videoclass')}}">
								<img style="" src="{{asset('image/icons/video_class.png')}}" class="img-reponsive center-block ">
								화상영어
							</a>
						</div>	
						<div class="col-xs-4  text-center">
							<a href="{{route('page', 'phoneclass')}}">
								<img style="" src="{{asset('image/icons/phone_class.png')}}" class="img-reponsive center-block">
								전화영어
							</a>
						</div>
						<div class="col-xs-4  text-center">
							<a href="{{ url('leveltest/register') }}">
								<img style="" src="{{asset('image/icons/freeLVT.png')}}" class="img-reponsive center-block">
								무료체험
							</a>
						</div>
					</div> 
				</div>
				<div class="col-sm-4 faturite-div" style="border-left:1px solid #ccc; border-right:1px solid #ccc">
					
					<h4 class="text-center">
						수업안내 
					</h4>
					<!-- <img style="width:50px" src="{{asset('image/icons/testimonials.png')}}" class="img-reponsive center-block "> -->
					<div class="row animated slideInUp ">
						<div class="text-center col-xs-4">
							<a href="{{route('testimonial')}}">
								<img  src="{{asset('image/icons/testimonials.png')}}" class="img-reponsive center-block">
								수업후기 
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="{{url('enrollment')}}">
								<img src="{{asset('image/icons/register.png')}}" style=" width: 90%;margin-top: 10px;" class="img-reponsive center-block">
								수강신청
							</a>
						</div>
						<div class="text-center col-xs-4">
							<a href="{{route('teacher')}}">
								<img  src="{{asset('image/icons/teachers.png')}}" class="img-reponsive center-block">
								강사소개 
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					
					<h4 class="text-center">
						고객센터
					</h4>
					<!-- <img style="width:50px" src="{{asset('image/icons/myPage.png')}}" class="img-reponsive center-block "> -->
					<div class="row  animated slideInRight ">
						<div  class="col-xs-4 text-center">
							<a href="{{route('dashboard.class.index')}}" >
								<img style="" src="{{asset('image/icons/myPage.png')}}" class="img-reponsive center-block">
								마이메뉴
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="{{route('faq')}}">
								<img style="" src="{{asset('image/icons/QnA.png')}}" class="img-reponsive center-block">
								FAQ
							</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="{{route('blog')}}">
								<img style="" src="{{asset('image/icons/blog.png')}}" class="img-reponsive center-block">
								블로그 
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div style="background-color: #f7f7f7; color:black;" class="web-board">
			<div class="container">
				<div class="row" style="padding: 30px; padding-top: 40px">
					<div class="col-sm-8">
							<div>
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#notice" aria-controls="notice" class="btn btn-primary" style="color:white"  role="tab" data-toggle="tab">
									@lang('label.notice') @if($new_notices) <span class="badge badge-alert" style="background-color:red; color:white">New</span> @endif
									</a>
								</li>
								<li role="presentation">
									<a href="#blog" aria-controls="blog" class="btn btn-primary" style="color:white" role="tab" data-toggle="tab">
										@lang('label.blog') @if($new_blogs) <span class="badge badge-alert" style="background-color:red; color:white">New</span> @endif
									</a>
								</li>
								<li role="presentation">
									<a href="#postponed" aria-controls="postponed" class="btn btn-primary" style="color:white" role="tab" data-toggle="tab">
									수강연기 @if($new_postponeds) <span class="badge badge-alert" style="background-color:red; color:white">New</span> @endif
									</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="notice">
									<table class="table table-hovered notice-table borderless">
									<a href="{{url('notice')}}"  class="pull-right"> 더보기</a>
										@foreach($notices as $notice)
											<tr>
												<td>
													<a href="{{route('notice.show', $notice->slug)}}">
														{{$notice->title}}
													</a>
												</td>
												<td align="right">{{date_formater('date_format', $notice->created_at)}}</td>
											</tr>
										@endforeach
									</table>
								</div>
								<div role="tabpanel" class="tab-pane" id="blog">
									<a href="{{url('blog')}}"  class="pull-right"> 더보기</a>
									<table class="table table-hovered notice-table borderless">
										@foreach($blogs as $blog)
											<tr>
												<td>
													<a href="{{route('blog.show', $blog->slug)}}">
														{{$blog->title}}
													</a>
												</td>
												<td align="right">{{date_formater('date_format', $blog->created_at)}}</td>
											</tr>
										@endforeach
									</table>
								</div>
								<div role="tabpanel" class="tab-pane" id="postponed">
									<a href="/postponed"  class="pull-right"> 더보기</a>
									<table class="table table-hovered notice-table borderless postponed">
										@foreach($postponeds as $postponed)
											<tr>
												<td>
													@if($postponed->classer->user)
														{{ $postponed->classer->user->username }}
													@endif 
													님 {{ date('m', strtotime($postponed->date_time)) }}월 {{ date('d', strtotime($postponed->date_time)) }}일 수강연기 되었습니다 
												</td>
												<td align="right" width="80">{{ date('Y-m-d', strtotime($postponed->postponed_timestamp)) }}</td>
											</tr>
										@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<br>
						<h4 class="line" style="margin-top:20px;"><span>CONTACT US</span></h4>
						<h1 class="text-success">070-7615-0507</h1>
						<p class="text-left" style="padding-left:20%;">
						수업 : 6am~12pm(자정) <br>
						상담 : 11pm~7pm <br>
						점심 : 12pm~1pm <br>
						카톡 : <a href="https://goo.gl/llxni9" target="_blank">happybd512 </a><br>
							
						</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
		@if( count($banners) > 0)
		<div class="spacer"></div>
		<div class="container">
			<div class="row"  style="padding: 30px; padding-top: 10px">
				@if(count($banners) >  1)
					@foreach($banners as $banner)
						<div class="col-sm-6">
							<img src="{{asset('banners/' . $banner->path)}}" class="img-reponsive animated pulse">
							<br>
							<br>
						</div>
					@endforeach
				@else
					<div class="col-sm-6 col-sm-offset-3">
						<img src="{{asset('banners/' . $banners[0]->path)}}" class="img-reponsive animated pulse">
						<br>
						<br>
					</div>	
				@endif
			</div>
		</div>	
		@endif
	

	@if(count($popup))
		@if($popup->display_load == "every_load")
			<div class="modal fade" tabindex="-1" role="dialog" id="popup">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="background-color:{{$popup->background_color}}; border-radius:10px;">
					<div class="modal-body" >
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:58px; color:red" aria-hidden="true">&times;</span></button>
						<!-- <h3 style="color:{{$popup->title_color}}">{{$popup->title}}</h3> -->
						<p style="color:{{$popup->text_color}}">
							{!! $popup->description !!}
						</p>
						@if($popup->button_text)
						<div class="text-center">
							<a href="{{ $popup->button_link }}"  class="btn" style="background-color:{{$popup->button_color}}; color:{{$popup->button_text_color}}"> {{$popup->button_text}}</a>
						</div>
						@endif
					</div>
					
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		@else
			@if(count(session('popup')) < 1)
				<div class="modal fade" tabindex="-1" role="dialog" id="popup">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="background-color:{{$popup->background_color}}; border-radius:10px;">
					<div class="modal-body" >
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size:58px; color:red" aria-hidden="true">&times;</span></button>
						<!-- <h3 style="color:{{$popup->title_color}}">{{$popup->title}}</h3> -->
						<p style="color:{{$popup->text_color}}">
							{!! $popup->description !!}
						</p>
						@if($popup->button_text)
						<div class="text-center">
							<a href="{{ $popup->button_link }}"  class="btn" style="background-color:{{$popup->button_color}}; color:{{$popup->button_text_color}}"> {{$popup->button_text}}</a>
						</div>
						@endif
					</div>
					
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			@endif
		@endif

	@endif
	@if(count($noti_top))
			@section('top-noti')
				@if($noti_top->display_load == "every_load")
					<div class="top-noti" style="background-color:{{$noti_top->background_color}}">
						<div class="container ">
							<a type="button" id="close-top-noti" class="close"><span aria-hidden="true">&times;</span></a>
							<!-- <label for="" style="color:{{$noti_top->title_color}}">{{$noti_top->title}}</label>  -->
							<span style="color:{{$noti_top->text_color}}">{!! $noti_top->description !!}</span>
							@if($noti_top->button_text)
							<a href="{{ $noti_top->button_link }}"  class="btn" style="background-color:{{$noti_top->button_color}}; color:{{$noti_top->button_text_color}}"> {{$noti_top->button_text}}</a>
							@endif
						</div>
					</div>
				@else
					@if(count(session('noti_top')) < 1)
						<div class="top-noti" style="background-color:{{$noti_top->background_color}}">
							<div class="container ">
								<a type="button" id="close-top-noti" class="close"><span aria-hidden="true">&times;</span></a>
								<!-- <label for="" style="color:{{$noti_top->title_color}}">{{$noti_top->title}}</label> --> 
								<span style="color:{{$noti_top->text_color}}">{!! $noti_top->description !!}</span>
								@if($noti_top->button_text)
								<a href="{{ $noti_top->button_link }}"  class="btn" style="background-color:{{$noti_top->button_color}}; color:{{$noti_top->button_text_color}}"> {{$noti_top->button_text}}</a>
								@endif
							</div>
						</div>
					@endif
				@endif
			@endsection
	@endif

	@php
		if(count($popup))
		{
			if($popup->display_load == "first_load" AND !Session::has('popup'))
			{
				Session::push('popup', $popup->id);
			}
		}

		if(count($noti_top))
		{
			if($noti_top->display_load == "first_load")
			{
				Session::push('noti_top', $noti_top->id);
			}
		}
	@endphp

  @endsection

  @section('styles')
		<style>
			.top-noti{
				padding:10px;
			}

			.top-noti .container{
				position:relative;
			}

			.top-noti .close{
				position:absolute;
				right:0;
				top:0;
				background-color:white;
				padding:5px 10px 5px 10px;
				border-radius:50px;
				color:black;
				z-index:999;
			}

			
			.web-board {
				padding: 30px;
				padding-top: 40px;
			}

			@media (min-width: 481px) and (max-width: 767px) {
				.web-board {
					padding: 5px;
				}

				.web-board .container {
					padding: 5px;
				}
			}

			@media (min-width: 320px) and (max-width: 480px) {
				.web-board {
					padding: 5px;
				}

				.web-board .container {
					padding: 5px;
				}
			}

			@media (min-width: 481px) and (max-width: 767px) {
				.web-board .nav-tabs li a {
					padding: 5px;
				}

				.web-board .nav-tabs li a .postponed {
					font-size: 12px;
				}

				.web-board .nav-tabs li a span {
					font-size: 8px;
					padding: 3px;
				}
			}

			@media (min-width: 320px) and (max-width: 480px) {
				.web-board .nav-tabs li a {
					padding: 5px;
				}

				.web-board .nav-tabs li a .postponed {
					font-size: 11px;
				}

				.web-board .nav-tabs li a span {
					font-size: 8px;
					padding: 3px;
				}
			}
		</style>
  @endsection

  @section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$('#popup').modal('show')

		$('#close-top-noti').click(function(){
			$('.top-noti').fadeOut();
		})
	</script>
  @endsection