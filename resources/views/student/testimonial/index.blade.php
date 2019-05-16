@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm">
		  <h6>수강후기  
		   &nbsp;&nbsp; <a class="btn btn-lg btn-success" href="{{ route('dashboard.testimonial.create') }}" >  @lang('button.new')</a>
		  </h6>
		  <div class="table-responsive">
		  <table class="table">
		  	<thead>
		  		<tr>
		  			<th>@lang('label.teacher')</th>
		  			<th>@lang('label.testimonial')</th>
		  			<th>@lang('label.replies')</th>
		  			<th></th>
		  		</tr>
		  	</thead>
		  	<tbody>
			  @foreach($testimonials as $testimonial)
			  		<tr>
			  			<td>
						  @if($testimonial->admin)
			  				{{$testimonial->admin->name}}
						  @endif
			  			</td>
			  			<td>
			  				{!! str_limit($testimonial->message, 70) !!}
			  			</td>
			  			<td>
			  				{{count($testimonial->replies)}}
			  			</td>
			  			<td align="right">
			  				<a class="btn btn-primary btn-sm" href="{{route('dashboard.testimonial.edit', $testimonial->id)}}"><i class="fa fa-pencil"></i>  @lang('button.edit')</a>
			  				<form method="post" style="display: none;" id="form-{{$testimonial->id}}" action="{{route('dashboard.testimonial.destroy', $testimonial->id)}}">
			  					{{csrf_field()}}
			  					{{method_field('DELETE')}}
			  				</form>
			  				<button 
			  				onclick="if(confirm('@lang('label.are_you_sure_to_delete')')) { $('#form-{{$testimonial->id}}').submit(); }" class="btn btn-primary btn-sm" href="{{route('dashboard.testimonial.edit', $testimonial->id)}}"><i class="fa fa-trash"></i>  @lang('button.delete')</button>
			  			</td>
			  		</tr>
			  @endforeach
		  	</tbody>
		  </table>
		  </div>	 

	</div>
@else
	<h6 class="mobile-title">수강평가
		&nbsp;&nbsp; <a class="btn btn-sm btn-success" href="{{ route('dashboard.testimonial.create') }}" > <i class="fa fa-plus"></i>  @lang('button.new')</a>
	</h6>
	 @foreach($testimonials as $testimonial)
		<div class="box-list">
			<div class="dropdown pull-right">
					<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li>
							<a  href="{{route('dashboard.testimonial.show', $testimonial->id)}}"><i class="fa fa-eye"></i> @lang('button.show')</a>
						</li> 
						<li>
							<a  href="{{route('dashboard.testimonial.edit', $testimonial->id)}}"><i class="fa fa-pencil"></i>  @lang('button.edit')</a>
						</li>
						<li>
							<a type="button"
						onclick="if(confirm('@lang('label.are_you_sure_to_delete')')) { $('#form-{{$testimonial->id}}').submit(); }"  href="{{route('dashboard.testimonial.edit', $testimonial->id)}}"><i class="fa fa-trash"></i>  @lang('button.delete')</a>

						</li> 
			  				<form method="post" style="display: none;" id="form-{{$testimonial->id}}" action="{{route('dashboard.testimonial.destroy', $testimonial->id)}}">
			  					{{csrf_field()}}
			  					{{method_field('DELETE')}}
			  				</form>
					</ul>
			</div>
			<div class="clearfix"></div>
			<div class="content">
				@if($testimonial->admin)
					{{$testimonial->admin->name}}
				@endif
				<br>	
				<small style="font-size:11px">
					{!! str_limit($testimonial->message, 70) !!}
				</small>	
			</div>
		</div>
	 @endforeach
@endif
@endsection