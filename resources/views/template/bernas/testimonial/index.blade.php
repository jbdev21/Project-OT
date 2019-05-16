@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('http://slodesignsolutions.com/wp-content/uploads/2015/10/testimonial-banner.jpg');">
		<div class="container">
			<h1 style="color: #fff;">수강후기</h1>
		</div>	
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<br>
				<div class="owl-carousel" id="testimonial-slider">
				@foreach($testimonials as $testimonial)
					<div class="testimonial">
						<h3 class="title">{{$testimonial->user->name}}
							<span class="post">- {{ date_formater('date_time_format', $testimonial->created_at) }} @if($testimonial->admin) &nbsp;&nbsp;&nbsp;&nbsp;  --담당강사 : {{ $testimonial->admin->name }} @endif</span>
						</h3>
						<p class="description">
							@if(strlen(str_replace('\n',' ',$testimonial->message)) > 350)
							<h3>
								{!! str_limit_wrap($testimonial->message, 100) !!}
							</h3>
								<br>
								<br>
								<a href="{{ route('testimonial.show', $testimonial->id) }}" class="btn btn-primary">전체보기</a>
							@else
								<h3>
								{!! $testimonial->message !!}
								</h3>
								<br>
								<br>
								<br>
							@endif
						</p>
					</div>
				@endforeach
				</div>
			</div>
		</div>
		
		<div class="text-center">
			{{$testimonials->links()}}
		</div>
		<div class="text-center">
			<small class="center-block">* 페이지당 10개씩 보여집니다. 수많은 후기들이 온톡의 역사를 말해줍니다.</small>
		</div>
		<div class="spacer"></div>
	</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<style>
	.testimonial{
		border: 10px solid #662a66;
		padding: 40px 0 25px 0;
		margin: 50px;
		text-align: center;
		position: relative;
		min-height:350px;
	}

	.testimonial:before{
		content: "\f10d";
		font-family: "Font Awesome 5 Free";
		width: 100px;
		height: 100px;
		line-height: 100px;
		background: #fff;
		margin: 0 auto;
		font-size: 70px;
		font-weight: 900;
		color: #f1971f;
		position: absolute;
		top: -60px;
		left: 0;
		right: 0;
		word-wrap: break-word;
	}

	.testimonial a{
		border-radius: 0px;
	}

	.testimonial .title{
		padding: 7px 0;
		margin: 0 -30px 20px;
		border: 7px solid #fff;
		background: #e8326f;
		font-size: 22px;
		font-weight: 700;
		color: #fff;
		letter-spacing: 1px;
		text-transform: uppercase;
		position: relative;
	}

	.testimonial .title:before{
		content: "";
		border-top: 15px solid #662a66;
		border-left: 15px solid transparent;
		border-bottom: 15px solid transparent;
		position: absolute;
		bottom: -37px;
		left: 0;
	}

	.testimonial .title:after{
		content: "";
		border-top: 15px solid #662a66;
		border-right: 15px solid transparent;
		border-bottom: 15px solid transparent;
		position: absolute;
		bottom: -37px;
		right: 0;
	}

	.testimonial .post{
		display: inline-block;
		font-size: 14px;
		font-weight: 700;
		color: #fff;
		text-transform: capitalize;
	}

	.testimonial .description{
		padding: 10px 20px;
		margin: 0;
		font-size: 15px;
		color: #6f6f6f;
		letter-spacing: 1px;
		line-height: 30px;
		
	}

	.owl-theme .owl-controls{ margin-top: 0; }
	.owl-theme .owl-controls .owl-buttons div{
		display: inline-block;
		width: 40px;
		height: 40px;
		line-height: 35px;
		background: #f1971f;
		color: #fff;
		border-radius: 0;
		margin-right: 5px;
		opacity: 1;
	}

	.owl-prev:before,
	.owl-next:before{
		content: "\f060";
		font-family: "Font Awesome 5 Free";
		font-size: 20px;
		font-weight: 900;
	}
	
	.owl-next:before{ content: "\f061"; }
	@media only screen and (max-width: 990px){
	.testimonial{ margin: 30px; }
	}
</style>
@endsection


@section('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#testimonial-slider").owlCarousel({
				items:1,
				itemsDesktop:[1000,2],
				itemsDesktopSmall:[979,2],
				itemsTablet:[768,1],
				pagination:false,
				navigation:true,
				navigationText:["",""],
				autoPlay:true
			});
		})
	</script>
@endsection