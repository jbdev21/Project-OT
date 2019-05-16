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
					<div class="testimonial">
						<h3 class="title">{{$testimonial->user->username}}
							<span class="post">- {{ date_formater('date_time_format', $testimonial->created_at) }} @if($testimonial->admin) &nbsp;&nbsp;&nbsp;&nbsp;  --담당강사 : {{ $testimonial->admin->name }} @endif</span>
						</h3>
						<p class="description">
							{!! $testimonial->message !!}
						</p>
						<hr>
						<label>@lang('label.replies')</label>
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1">
									@forelse($testimonial->replies as $reply)
										<div class="block_content">
											<h3 class="title">
												{{$reply->admin->name}}
											</h3>
										<div class="byline">
											<span>{{date_formater('date_time_format', $reply->created_at)}}</span>
										</div>
											<p class="excerpt">
												{!! $reply->message !!}
											</p>
										</div>
										<hr>
									@empty
										<h4 class="text-center"> @lang('label.no_reply_yet')</h4>
										<br>
									@endforelse

									<br>
									
								</div>
							</div>
					</div>
			
			</div>
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
        word-wrap: break-word;
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
		padding: 20px 20px;
		margin: 0;
		font-size: 15px;
		color: #6f6f6f;
		letter-spacing: 1px;
		line-height: 30px;
		word-wrap: break-word;
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