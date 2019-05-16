@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection

@section('content')
	<div class="box padding-sm">
	<div class="row">
		<div class="col-sm-3 text-center">
			<a href="{{route('dashboard.class.index')}}">
				<div class="well">
					<img src="{{asset('image/talk.svg')}}" class="center-block img-responsive" style="width: 70%">
					<br>
					@lang('label.my_class')
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="{{route('dashboard.calendar.index')}}">
				<div class="well">
					<img src="{{asset('image/calendar.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					@lang('label.calendar_of_class')
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="{{route('dashboard.rating.index')}}">
				<div class="well">
					<img src="{{asset('image/rating.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					Rating
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="{{route('dashboard.book.index')}}">
				<div class="well">
					<img src="{{asset('image/guide.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					Books
				</div>
			</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="{{asset('image/teacher.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					Teachers
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="{{asset('image/setting.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					Setting
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="{{asset('image/help.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					Help
				</div>
			</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="">
				<div class="well">
					<img src="{{asset('image/bug.svg')}}" class="center-block img-responsive"style="width: 70%" >
					<br>
					Report
				</div>
			</a>
		</div>

	</div>
	</div>
@endsection
