@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm small-text">
		  <h6>확인서</h6>
		  <a  href="{{route('dashboard.certificate.index')}}" class="btn btn-warning"><i class="fa fa-ban"></i> @lang('button.cancel')</a>
		  
		  <div class="row">
		  		<div class="col-sm-6 col-sm-offset-1">
		  			<div id="print-body">
		  				<div class="header">
		  					@if(is_desktop())
		  						<h4 class="text-center">@lang('label.certificate')</h4>
		  					@else
		  						<h5 class="text-center">수강확인서</h5>
		  					@endif
		  				</div>
		  				<div class="content well" style="padding-bottom: 0px;">
		  				@if(is_desktop())
		  					<table class="table" >
		  						<tr>
		  							<td>@lang('label.name')</td>
		  							<td>: {{$class->user->korean_name}}</td>
		  						</tr>
		  						<tr>
		  							<td>@lang('label.class_type')</td>
		  							<td>: @lang('label.'. snake_case($class->type))</td>
		  						</tr>
		  						<tr>
		  							<td>@lang('label.class_duaration')</td>
		  							<td> :
										@if($class->getFirstSession())
											{{date_formater('date_format',$class->getFirstSession()->date_time)}} - {{date_formater('date_format',$class->getLastSession()->date_time)}}
											<br>
											&nbsp {{$class->num_months}} 개월({{ $class->classSession()->where('status','!=', 'postponed')->count()}}회)
										@endif
		  							</td>
		  						</tr>
		  						<tr>
		  							<td>@lang('label.price')</td>
		  							<td>: {{ number_format($class->payment_price) }} 원</td>
		  						</tr>
		  					</table>
		  					@else
		  						<h5>
		  							{{$class->user->korean_name}}
		  							<br>
		  							<label>@lang('label.name')</label>
		  						</h5>
		  						<h5>
		  							@lang('label.'. snake_case($class->type))
		  							<br>
		  							<label>@lang('label.class_type')</label>
		  						</h5>
		  						<h5>
		  							<small style="font-size: 15px;color: black;"><b>{{date_formater('date_format',$class->getFirstSession()->date_time)}} - {{date_formater('date_format',$class->getLastSession()->date_time)}}</b></small>
		  							<br>
		  								{{$class->num_months}} 개월({{count($class->classSession)}}회)
		  							<br>
		  							<label>@lang('label.class_duaration')</label>
		  						</h5>
		  						<h5>
		  							{{ number_format($class->payment_price) }} 원
		  							<br>
		  							<label>@lang('label.price')</label>
		  						</h5>
		  					@endif
		  				</div>
		  				@if(Request::get('attendance'))
		  				<div class="attendance well">
		  					<div class="row">
		  					@foreach($class->classSession()->where('status', '!=', 'postponed')->get() as $session)
		  						<div class="col-xs-3 text-center" style="margin: 0px; padding: 0px;">
		  							<div class="attendance-box">
		  								<b>{{$loop->iteration}}</b><br>
		  								<small> @lang('button.'.$session->status) </small>
		  							</div>
		  						</div>
		  					@endforeach
		  					</div>
		  				</div>
		  				@endif

		  				<div class="footer well" style="background-color: #fff;">
		  					<div class="row">
		  						<div class="col-xs-12">
		  							<img src="{{asset('site/img/certificate_logo.png')}}" class="img-responsive center-block"> 
		  						</div>
		  					</div>
		  				</div>
		  			</div>
		  		</div>	
		  </div>
	</div>
@else
	<h6 class="mobile-title">확인서</h6>

	<div class="container">
	<a  href="{{route('dashboard.certificate.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-ban"></i> @lang('button.cancel')</a>
		<div class="header">
		  					@if(is_desktop())
		  						<h2 class="text-center">@lang('label.certificate')</h2>
		  					@else
		  					<h5 class="text-center">수강확인서</h5>
		  					@endif
		  				</div>
		  				<div class="content well" style="padding-bottom: 0px;">
		  				
		  						<h5>
		  							<label>@lang('label.name')</label>
		  							<br>
		  							{{$class->user->korean_name}}
		  						</h5>
		  						<h5>
		  							<label>@lang('label.class_type')</label>
		  							<br>
		  							@lang('label.'. snake_case($class->type))
		  						</h5>
		  						<h5>
		  							<label>@lang('label.class_duaration')</label>
		  							<br>
		  							<small style="font-size: 15px;color: black;">
									  @if($class->getFirstSession())
									  	<b>{{date_formater('date_format',$class->getFirstSession()->date_time)}} - {{date_formater('date_format',$class->getLastSession()->date_time)}}</b>
									  @endif
									  </small>
		  							<br>
		  								{{$class->num_months}} 개월({{count($class->classSession)}}회)
		  						</h5>
		  						<h5>
		  							<label>@lang('label.price')</label>
		  							<br>
		  							{{ number_format($class->payment_price) }} 원
		  						</h5>
		  				</div>
		  				@if(Request::get('attendance'))
		  				<div class="attendance well">
		  					<div class="row">
		  					@foreach($class->classSession()->where('status', '!=', 'postponed')->get() as $session)
		  						<div class="col-xs-3 text-center" style="margin: 0px; padding: 0px;">
		  							<div class="attendance-box">
		  								<b>{{$loop->iteration}}</b><br>
		  								<small> @lang('button.'.$session->status) </small>
		  							</div>
		  						</div>
		  					@endforeach
		  					</div>
		  				</div>
		  				@endif

		  				<div class="footer well" style="background-color: #fff;">
		  					<div class="row">
		  						<div class="col-xs-12">
		  							<img src="{{asset('site/img/certificate_logo.png')}}" class="img-responsive center-block"> 
		  						</div>
		  					</div>
		  				</div>
		
	</div>
@endif
@endsection	

@section('styles')
	<style type="text/css">

		#print-body{
			border: 2px solid black;
			margin:10px;
			border-radius: 5px;

		}

		.header{
			border:3px solid red;
			margin: 10px;
			border-radius: 5px;
			padding-bottom: 10px;
			color:black;
		}

		.content{
			font-weight: bold;
			font-size: 20px;
			color:black;
			margin: 10px;
		}

		.footer{
			font-weight: bold;
			font-size: 20px;
			color:black;
			margin: 10px;
		}

		.attendance{
			margin: 10px;
		}

		.column{
			display: flex;
			flex-flow: row; 
  			flex-wrap: wrap;
		}

		.columns{
			  flex: 1;
		}

		.attendance-box{
			border: 1px solid #ccc;
			margin: 1px;
			line-height: 0.9;
			padding: 5px;
		}
	</style>
	<link rel="stylesheet" type="text/css" media="print" href="{{asset('css/student-certificate-print.css')}}">
@endsection
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){

		})

		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>
@endsection