@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm">
		  <h6>@lang('label.proofreading')
		 &nbsp;&nbsp; <a class="btn btn-lg btn-success" href="{{ route('dashboard.proofreading.create') }}" > @lang('button.new')</a>
		  </h6>
		  <div class="table-responsive">
		  <table class="table">
		  	<thead>
		  		<tr>
		  			<th>@lang('label.message')</th>
		  			<th>@lang('label.replies')</th>
		  			<th>@lang('label.date')</th>
		  			<th></th>
		  		</tr>
		  	</thead>
		  	<tbody>
			  @foreach($proofreadings as $proofreading)
			  		<tr>
			  			<td>
			  				{!! str_limit($proofreading->message, 100) !!}
			  			</td>
			  			<td>
			  				{{count($proofreading->replies)}}
						  </td>
						  <td>
			  				{{ date_formater('date_format',$proofreading->created_at)}}
			  			</td>
			  			<td align="right">
			  				<a class="btn btn-primary btn-sm" href="{{route('dashboard.proofreading.show', $proofreading->id)}}"><i class="fa fa-eye"></i> @lang('button.show')</a>
			  				<a class="btn btn-primary btn-sm" href="{{route('dashboard.proofreading.edit', $proofreading->id)}}"><i class="fa fa-pencil"></i> @lang('button.edit')</a>
			  				<form method="post" style="display: none;" id="form-{{$proofreading->id}}" action="{{route('dashboard.proofreading.destroy', $proofreading->id)}}">
			  					{{csrf_field()}}
			  					{{method_field('DELETE')}}
			  				</form>
			  				<button 
			  				onclick="if(confirm('@lang('label.are_you_sure_to_delete')')) { $('#form-{{$proofreading->id}}').submit(); }" class="btn btn-primary btn-sm" href="{{route('dashboard.proofreading.edit', $proofreading->id)}}"><i class="fa fa-trash"></i> @lang('button.delete')</button>
			  			</td>
			  		</tr>
			  @endforeach
		  	</tbody>
		  </table>
		  </div>

	</div>
@else
	<h6 class="mobile-title">
	@lang('label.proofreading')
		<a class="btn btn-sm btn-success" href="{{ route('dashboard.proofreading.create') }}" > @lang('button.new')</a>
	</h6>
	<div class="container">
	</div>
	@foreach($proofreadings as $proofreading)
		<div class="box-list">
			<div class="dropdown pull-right">
					<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="dLabel">
						<li>
							<a  href="{{route('dashboard.proofreading.edit', $proofreading->id)}}"><i class="fa fa-pencil"></i>  @lang('button.edit')</a>
						</li>
						<li>
							<a type="button"
						onclick="if(confirm('@lang('label.are_you_sure_to_delete')')) { $('#form-{{$proofreading->id}}').submit(); }"  href="{{route('dashboard.proofreading.edit', $proofreading->id)}}"><i class="fa fa-trash"></i>  @lang('button.delete')</a>

						</li> 
			  				<form method="post" style="display: none;" id="form-{{$proofreading->id}}" action="{{route('dashboard.proofreading.destroy', $proofreading->id)}}">
			  					{{csrf_field()}}
			  					{{method_field('DELETE')}}
			  				</form>
					</ul>
			</div>
			<div class="clearfix"></div>
			<div class="content">
				<a  href="{{route('dashboard.proofreading.show', $proofreading->id)}}">
				{!! str_limit($proofreading->message, 100) !!}
				</a>
			</div>
		</div>
	@endforeach

@endif
@endsection