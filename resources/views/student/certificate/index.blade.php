@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
<div class="box padding-sm small-text">
		  <h6>확인서</h6>
	<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>@lang('label.type')</th>
				<th>@lang('label.day')</th>
				<th>@lang('label.time')</th>
				<th>@lang('label.teacher')</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@forelse($classes as $class)
				<tr>
					<td>
						@lang('label.' .snake_case($class->type))
					</td>
					<td>
						@foreach($class->day as $day)
								@lang('label.' . strtolower(str_limit($day->day_name, 3, '')))  
						@endforeach
					</td>
					<td>{{date('h:iA',strtotime($class->time))}}</td>
					<td>
						@if($class->admin)
							{{$class->admin->name}}
						@endif
					</td>
					<td align="right">
						<a href="{{route('dashboard.certificate.show', $class->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> @lang('button.basic')</a>
						<a href="{{route('dashboard.certificate.show', $class->id)}}?attendance=true" class="btn btn-success"><i class="fa fa-eye"></i> @lang('button.with_attendance')</a>
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
	<h6 class="mobile-title">확인서</h6>
	@forelse($classes as $class)
		<div class="box-list">
			<div class="dropdown pull-right">
					<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li>
							<a href="{{route('dashboard.certificate.show', $class->id)}}"><i class="fa fa-eye"></i> @lang('button.basic')</a>
						</li>
						<li>
							<a href="{{route('dashboard.certificate.show', $class->id)}}?attendance=true"><i class="fa fa-eye"></i> @lang('button.with_attendance')</a>
						</li> 
					</ul>
			</div>
			<div class="clearfix"></div>
			<div class="content">
				<h6>
				{{$class->type}} 
				</h6>
				@if($class->admin)
					{{$class->admin->name}} | 
				@endif
				{{date('h:iA',strtotime($class->time))}} | 
				@foreach($class->day as $day)
					{{str_limit($day->day_name, 1, '.')}}
				@endforeach
			</div>
		</div>
	@endforeach
@endif


@endsection
