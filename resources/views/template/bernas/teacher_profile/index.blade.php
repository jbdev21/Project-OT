@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('http://ontalk.co.kr/image/image/teacherbg.jpg');">
		<div class="container">
			<h1 style="color: #fff;">@lang('label.teacher')</h1>
		</div>	
	</div>
	<br>
	<div class="container">
			<div class="owl-carousel owl-theme">
				@foreach($profiles as $profile)
					@if($loop->iteration % 2 != 0)
                		<div class="item">
					@endif

						<div class="card hovercard"  >
	                      <div class="cardheader" style="background-image:url('{{ asset('background/'. $profile->background_image) }}')"></div>
	                      <div class="avatar">
	                          <img alt="" class="center-block" src="{{ asset('profile/'. $profile->profile_image) }}">
	                      </div>
	                      <div class="info"  style="height:350px;">
	                          	<div class="title">
	                              <a  href="{{ route('teacher.show', $profile->admin->username) }}">
	                                {{ $profile->admin->name }}
	                              </a>
								  	@if($profile->audio_file)
										<audio controls controlsList="nodownload">
												<source  src="{{ $profile->audio_file }}" type="audio/mpeg">
												Your browser does not support the audio element.
										</audio>
									@endif
	                          	</div>
							  <div style="text-align:left">{!! str_limit(strip_tags($profile->overview),100) !!}</div>
							  <hr>
	                          <div style="text-align:left">
	                            {!!  str_limit(strip_tags($profile->message),250) !!}
	                          </div>
	                      </div>
	                      <div class="bottom">

	                       		<a  href="{{ route('teacher.show', $profile->admin->username) }}" class="btn btn-primary" style="border-radius: 0px; width: auto;"><i class="fa fa-info-circle"></i> Details</a>
	                      </div>
						  </div>

					@if($loop->iteration % 2 == 0)
						</div>
					@endif
					
                @endforeach
			</div>
			</div>
	
		
	</div>

@endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.owl-carousel').owlCarousel({
			   	loop:true,
			    margin:10,
				autoplayTimeout:5000,
			    responsiveClass:true,
				rows: true,
				rowsCount: 2,
			    responsive:{
			        0:{
			            items:1,
			            nav:true
			        },
			        600:{
			            items:3,
			            nav:false
			        },
			        1000:{
			            items:3,
			            nav:true,
			            loop:false
			        }
			    }
			});
		})
	</script>
@endsection