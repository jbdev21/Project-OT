@extends(theme('layout.app'))
@section('content')
	
	<div class="container">
				<br>
		
	                    <div class="card hovercard" >
	                      <div class="cardheader" style="background-image:url('{{ asset('background/'. $profile->background_image) }}'); height: 200px; background-position: center">
	                          
	                      </div>
	                      <div class="row">	
	                      		<div class="col-md-2">
	                      			<div class="avatar">
	                          			<img class="img-responsive"  src="{{ asset('profile/'. $profile->profile_image) }}">
	                          		</div>
	                      		</div>
	                      		<div class="col-md-10 text-left">
	                      			<h1>{{$profile->admin->name}}</h1>
									@if($profile->audio_file)
										<audio controls controlsList="nodownload">
												<source  src="{{ $profile->audio_file }}" type="audio/mpeg">
												Your browser does not support the audio element.
										</audio>
									@endif
	                      			<p>{{ $profile->overview }}</p>
	                      			{!! $profile->message !!}
	                      			<br>	
									  
									<br>	
	                      		</div>
	                      </div>
						  	<div class="row">
								<div class="owl-carousel owl-theme">
									@foreach($profile->admin->testimonials as $message)
										<div class="media">
											<figure class="snip1386">
												<img src="https://thumbs.dreamstime.com/b/old-vintage-books-over-bokeh-background-beautiful-31480496.jpg" alt="sample18" class="background" />
												<figcaption>
													<blockquote>{!! $message->message !!}</blockquote>
													<h5>- 
														{{ $message->user->username }} - 
														<small>
															<i>{{ date_formater('date_format', $message->created_at) }} </i>
														</small>
													<h5>

												</figcaption>
											</figure>
										</div>
									@endforeach
								</div>
									
							</div>
	                  	</div>
                	</div>

           
		
	</div>

@endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
	<style>
		.snip1386 {
			font-family: 'Playfair Display', Arial, sans-serif;
			position: relative;
			float: left;
			overflow: hidden;
			margin: 10px 1%;
			max-height: 250px;
			width: 100%;
			color: #000000;
			text-align: left;
			font-size: 13px;
			background-color: #000000;
		}

		.snip1386 * {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		.snip1386 .background {
			max-width: 100%;
			backface-visibility: hidden;
			opacity: 0.5;
		}

		.snip1386 figcaption {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			z-index: 1;
			opacity: 1;
			padding: 30px 10px 30px 0;
			background-color: #ffffff;
			width: 65%;
		}

		.snip1386 figcaption:before {
			position: absolute;
			top: 50%;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
			left: 100%;
			content: '';
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 120px 0 120px 120px;
			border-color: transparent transparent transparent #ffffff;
		}

		.snip1386:after {
			position: absolute;
			bottom: 50%;
			left: 40%;
			content: '';
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 120px 120px 0 120px;
			border-color: rgba(255, 255, 255, 0.5) transparent transparent transparent;
		}

		.snip1386 h5,
		.snip1386 blockquote {
			line-height: 1.6em;
			-webkit-transform: translateX(30px);
			transform: translateX(30px);
			margin: 0;
			font-size:14px;
		}

		.snip1386 h5 {
			margin: 10px 0;
			line-height: 1.1em;
			font-weight: 900;
			color: #1a1a1a;
		}

		.snip1386 blockquote {
			t-size: 0.9em;
		font-style: italic;
		}

		.snip1386 .profile {
			position: absolute;
			width: 100px;
			border-radius: 50%;
			top: 50%;
			right: 25%;
			z-index: 1;
			-webkit-transform: translate(50%, -50%);
			transform: translate(50%, -50%);
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
		}
	</style>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.owl-carousel').owlCarousel({
			    loop:true,
			    margin:10,
			    responsiveClass:true,
				autoplay:true,
				dots: false,
				nav: false,
				navText: ['', ''],
    			autoplayTimeout:3000,
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
			            items:1,
			            nav:true,
			            loop:false
			        }
			    }
			});
		})
	</script>
@endsection