@extends(theme('layout.app'))
@section('content')
	<div class="row section-padding" style="background-image:url('{{asset('image/bg/phoneclass.png')}}');background-size:cover">
		<div class="container ">
			<div class="col-sm-5">
				@if(is_desktop())
					<img style="height: 550px;position: relative;left: 80px;" src="{{asset('image/phone.png')}}" class="img-responsive">
					<small style="color: white;position: relative;left: 80px;">스마트폰 e-book 교재를 보면서 수업진행</small>
				@else
					<img src="{{asset('image/phone.png')}}" class="img-responsive">
					<small style="color: white;">스마트폰 e-book 교재를 보면서 수업진행</small>
				@endif
			</div>
			<div class="col-sm-7">
				<br>
				<img src="{{asset('image/main_32.png')}}" class="img-responsive">
				<br>
				<br>
			</div>
		</div>
	</div>
	<div style="background-image: url('{{asset('image/bg/food.png')}}')" class="img-responsive">
		<div class="container">
			<div class="section-padding text-center" >
				<div class="section-padding">
				@if(is_desktop())
					<h1 style="color:white; font-size: 3em">용기내어 레벨테스트를 체험해 보세요!</h1>
					<br>
					<a href="{{url('leveltest/register')}}" class="btn btn-lg btn-success no-radius" style="width: 200px;">
						@lang('label.level_test')
					</a>
					<a href="{{url('enrollment')}}" class="btn btn-lg btn-warning no-radius" style="width: 200px;">
						@lang('label.enrollment')
					</a>
				@else
					<h1 style="color:white; font-size: 25px;">용기내어 레벨테스트를 체험해 보세요!</h1>
					<br>
					<a href="{{url('leveltest/register')}}" class="btn btn-lg btn-success no-radius" style="width: 200px;">
						@lang('label.level_test')
					</a>
					<br><br>
					<a href="{{url('enrollment')}}" class="btn btn-lg btn-warning no-radius" style="width: 200px;">
						@lang('label.enrollment')
					</a>
				@endif
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="container">
			<div class="section-padding" >
				<br>
				<br>
				<div class="row">
				@if(is_desktop())
					<div class="col-sm-4">
						<img src="{{asset('image/calendar.svg')}}" class="img-responsive center-block" style="width: 40%">
						<h3 class=" text-center">수강관리</h3>
						<p>
							매일매일 강사분들의 수업코멘트 및 문장교정 제공으로 한문장 한문장 바른 표현을 배웁니다
						</p>
					</div>
					<div class="col-sm-4" style="border-left:1px solid #ccc; border-right:1px solid #ccc;">
						<img src="{{asset('image/conversation.svg')}}" class="img-responsive center-block" style="width: 40%">
						<h3 class=" text-center">영어학습 부가서비스</h3>
						<p>
							미국학생들이 실제 사용하는 리딩 프로그램, 영작교정 등 많은 학습도구가 제공됩니다
						</p>
					</div>
					<div class="col-sm-4">
						<img src="{{asset('image/teacher.svg')}}" class="img-responsive center-block" style="width: 40%">
						<h3 class=" text-center">강사와의 대화</h3>
						<p>
							배운말을 자주써야 실력이 늘겠죠? 수강생은 강사에게 언제든 메세지를 보낼 수 있습니다. 
						</p>
					</div>
				@else
					<div class="col-sm-4">
						<img src="{{asset('image/calendar.svg')}}" class="img-responsive center-block" style="width: 30%">
						<h3 class=" text-center">수강관리</h3>
						<p>
							매일매일 강사분들의 수업코멘트 및 문장교정 제공으로 한문장 한문장 바른 표현을 배웁니다
						</p>
					</div>
					<div class="col-sm-4" style="border-left:1px solid #ccc; border-right:1px solid #ccc;">
						<img src="{{asset('image/conversation.svg')}}" class="img-responsive center-block" style="width: 30%">
						<h3 class=" text-center">영어학습 부가서비스</h3>
						<p>
							미국학생들이 실제 사용하는 리딩 프로그램, 영작교정 등 많은 학습도구가 제공됩니다
						</p>
					</div>
					<div class="col-sm-4">
						<img src="{{asset('image/teacher.svg')}}" class="img-responsive center-block" style="width: 30%">
						<h3 class=" text-center">강사와의 대화</h3>
						<p>
							배운말을 자주써야 실력이 늘겠죠? 수강생은 강사에게 언제든 메세지를 보낼 수 있습니다. 
						</p>
					</div>
				@endif
				</div>	
			</div>
		</div>
	</div>
@endsection