@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm">
		  <h6>
		  @if(Request::get('from') == "admin")
		  	1:1문의 &nbsp;&nbsp;
		  @else
		  	강사와 대화 
		  @endif
		  <a class="btn btn-lg btn-success" href="{{ route('dashboard.message.create', ['to' => Request::get('from')]) }}" > @lang('button.new')</a>
		  </h6>
		  <div class="table-responsive">
		  <table class="table">
		  	<thead>
		  		<tr>
				  	@if(Request::get('from') == "teacher")
		  				<th>@lang('label.teacher')</th>
					@endif
		  			<th>@lang('label.message')</th>
		  			<th>@lang('label.replies')</th>
		  			<th>@lang('label.date')</th>
		  			<th></th>
		  		</tr>
		  	</thead>
		  	<tbody>
			  @foreach($messages as $message)
			  		<tr>
						@if($message->admin->type == "teacher")
							<td>
								{{$message->admin->name}}
							</td>
						@endif
			  			<td>
			  				{!! str_limit($message->message,100) !!}
			  			</td>
			  			<td>
			  				@if(count($message->replies))
								<i class="fa fa-check"></i>
							@endif
			  			</td>
						<td>{{ date_formater('date_time_format', $message->created_at) }}</td>
			  			<td align="right">
			  				<a class="btn btn-primary btn-sm" href="{{route('dashboard.message.show', $message->id)}}?from={{Request::get('from')}}"><i class="fa fa-eye"></i> @lang('button.show')</a>
			  				<a class="btn btn-primary btn-sm" href="{{route('dashboard.message.edit', $message->id)}}?from={{Request::get('from')}}"><i class="fa fa-pencil"></i> @lang('button.edit')</a>
			  				<form method="post" style="display: none;" id="form-{{$message->id}}" action="{{route('dashboard.message.destroy', $message->id)}}">
			  					{{csrf_field()}}
			  					{{method_field('DELETE')}}
			  				</form>
			  				<button 
			  				onclick="if(confirm(' @lang('label.are_you_sure_to_delete')')) { $('#form-{{$message->id}}').submit(); }" class="btn btn-primary btn-sm" href="{{route('dashboard.message.edit', $message->id)}}"><i class="fa fa-trash"></i> @lang('button.delete')</button>
			  			</td>
			  		</tr>
			  @endforeach
		  	</tbody>
		  </table>
		  </div>
			 

	</div>
@else
	<h6 class="mobile-title">
		@if(Request::get('from') == "admin")
		  	1:1문의 &nbsp;&nbsp;
		@else
		  	강사와 대화 
		@endif &nbsp;&nbsp;
		
		<a class="btn btn-sm btn-success" href="{{ route('dashboard.message.create',  ['to' => Request::get('from')]) }}" > @lang('button.new')</a>
	</h6>
	@foreach($messages as $message)
		<div class="box-list">
			<div class="dropdown pull-right">
					<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li>
							<a  href="{{route('dashboard.message.edit', $message->id)}}?from={{ Request::get('from') }}"><i class="fa fa-pencil"></i>  @lang('button.edit')</a>
						</li>
						<li>
							<a type="button"
						onclick="if(confirm('@lang('label.are_you_sure_to_delete')')) { $('#form-{{$message->id}}').submit(); }"  href="{{route('dashboard.message.edit', $message->id)}}"><i class="fa fa-trash"></i>  @lang('button.delete')</a>

						</li> 
			  				<form method="post" style="display: none;" id="form-{{$message->id}}" action="{{route('dashboard.message.destroy', $message->id)}}">
			  					{{csrf_field()}}
			  					{{method_field('DELETE')}}
			  				</form>
					</ul>
			</div>
			<div class="clearfix"></div>
			<div class="content">
				<a  href="{{route('dashboard.message.show', $message->id)}}?from={{Request::get('from')}}">
				<h6>
				{{$message->admin->name}} 
				</h6>
				</a>
				<small style="font-size:10px;">@lang('label.replies') : {{count($message->replies)}}</small>
				<br>
				{!! str_limit($message->message,100) !!}
				<br>
			</div>
		</div>
	@endforeach
@endif
@endsection