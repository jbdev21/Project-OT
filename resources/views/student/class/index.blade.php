@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')

@if(is_desktop())
	<div class="box padding-sm small-text">
			<h6>내 수업</h6>
		<div class="table-responsive">  
		<table class="table">
			<thead>
				<tr>
					<th>@lang('label.type')</th>
					<th>@lang('label.day')</th>
					<th>@lang('label.time')</th>
					<th>@lang('label.minute')</th>
					<th>@lang('label.teacher')</th>
					<th>@lang('label.session')</th>
					<th>@lang('label.duration')</th>
					<th>수강상태</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@forelse($classes as $class)
					<tr @if($class->status == "ended") class="danger" @endif>
						<td>@lang('label.' .snake_case($class->type))</td>
						<td>
							@foreach($class->day as $day)
								@lang('label.' . strtolower(str_limit($day->day_name, 3, '')))  
							@endforeach
						</td>
						<td>{{date('h:iA',strtotime($class->time))}}</td>
						<td>{{$class->minutes}}min.</td>
						<td>
							@if($class->admin)
								{{$class->admin->name}}
							@endif
						</td>
						<td>
							@php
								$remaining = count($class->getRemainingSession());
								$total = $class->total_sessions;
								echo $remaining . '/' . $total;
							@endphp
						</td>
						<td>
						@php
							$first_session = $class->getFirstSession();

							if($first_session){
								$last_session = $class->getLastSession();
								echo date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
							}

						@endphp
						</td>
						<td>
							@if($class->status == "pending")
								대기
							@elseif($class->status == "ongoing")
								진행
							@else
								<span style="color:red">종료</span>
							@endif
						</td>
						<td align="right">
							@if($class->status != 'pending')
							@php
								$near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
							@endphp
							
							@if(!Auth::user()->academy)
								<a href="{{ url('enrollment/step3?class=' .$class->id) }}" tartget="_blank" class="btn btn-primary  btn-xs"><i class="fa fa-refresh"></i> 재수강등록</a>
							@endif
							
							<a href="{{route('dashboard.class.show', $class->id)}}@if($near_session)?session={{$near_session->id}} @endif" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('button.view')</a>
							
							@else
								<button class="btn btn-danger btn-xs" type="button" disabled name="button"> @lang('button.pending')</button>
							@endif
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5" align="center"> @lang('label.no_class')</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		</div>
	</div>
@else
	<h6 class="mobile-title">내 수업</h6>
	@forelse($classes as $class)
	
		<div class="box-list">
			@if($class->status != 'pending')
				<div class="dropdown pull-right">
					<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li>
							<a href="{{ url('enrollment/step3?class=' .$class->id) }}"><i class="fa fa-refresh"></i> 재수강등록</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			@endif
		<div class="row sm-gutters">
			<div class="col-xs-3">
				@php
					$near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
				@endphp

				@if($class->status == 'ongoing')
					<a href="{{route('dashboard.class.show', $class->id)}}@if($near_session)?session={{$near_session->id}} @endif" class="btn btn-success btn-block">
						{{date('h:i',strtotime($class->time))}}
						<br>
						<span>
							{{date('A',strtotime($class->time))}}
						</span>
					</a>

				@elseif($class->status == 'ended')
					<a href="{{route('dashboard.class.show', $class->id)}}" class="btn btn-danger btn-block">
						{{date('h:i',strtotime($class->time))}}
						<br>
						<span>
							{{date('A',strtotime($class->time))}}
						</span>
					</a>
				@else
					<a href="#" class="btn btn-success btn-block disabled">
						{{date('h:i',strtotime($class->time))}}
						<br>
						<span>
							{{date('A',strtotime($class->time))}}
						</span>
					</a>

				@endif
			</div>
			<div class="col-xs-9">
				<div class="content">
					@if($class->status == 'ongoing')
						<a href="{{route('dashboard.class.show', $class->id)}}@if($near_session)?session={{$near_session->id}} @endif" >
							@lang('label.' .snake_case($class->type))
							<br>
							<small>
							@if($class->admin)
								<i class="fa fa-user"></i> {{$class->admin->name}}
							@else
								배정대기
							@endif

							| {{$class->minutes}}min.
							| @foreach($class->day as $day)
										@lang('label.' . strtolower(str_limit($day->day_name, 3, '')))  
									@endforeach
							</small>
						</a>
					@elseif($class->status == 'ended')
						<a href="{{route('dashboard.class.show', $class->id)}}" style="color:red;">
							@lang('label.' .snake_case($class->type))
							<br>
							<small>
							@if($class->admin)
								<i class="fa fa-user"></i> {{$class->admin->name}}
							@else
								배정대기
							@endif

							| {{$class->minutes}}min.
							| @foreach($class->day as $day)
										@lang('label.' . strtolower(str_limit($day->day_name, 3, '')))  
									@endforeach
							</small>
						</a>
					@else
						<a href="#" style="color: gray;">
							@lang('label.' .snake_case($class->type))
							<br>
							<small>
							@if($class->admin)
								<i class="fa fa-user"></i> {{$class->admin->name}}
							@else
								배정대기
							@endif

							| {{$class->minutes}}min.
							| @foreach($class->day as $day)
										@lang('label.' . strtolower(str_limit($day->day_name, 3, '')))  
									@endforeach
							</small>
						</a>
					@endif
				</div>
				
			</div>
		</div>
		
				
		</div>
	@endforeach
@endif


@endsection
