@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.proofreading')</label>
            </div>
            

            <div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>
								{{$proofreading->user->username}}
								<br>
								<small>{{$proofreading->user->korean_name}}</small>
							</h4>
						</div>
						<div class="panel-body">
							{!! $proofreading->message !!}
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="{{ route("admin.proofreading.update", $proofreading->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<input type="hidden" name="source">
								<div class="row">
									<div class="col-sm-6">
										<select class="form-control" style="min-width:100px" name="admin_id"required>
											<option value=""> - @lang('label.select_teacher') -</option>
											@foreach($teachers as $teacher)
												<option @if($proofreading->admin_id == $teacher->id) selected @endif  value="{{$teacher->id}}">{{$teacher->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-primary">@lang("button.submit")</button>
									</div>
								</div>
						</form>
						</div>
					</div>
				</div>
            </div>
            <div class="row">
            	<div class="col-sm-6 col-sm-offset-3">
            		@forelse($proofreading->replies()->orderBy('created_at')->get() as $reply)
						@if($reply->admin)
							<div class="block_content">
								<h2 class="title">
									{{$reply->admin->name}}
								</h2>
								<div class="byline">
								<span>{{date_formater('date_time_format', $reply->created_at)}}</span>
								</div>
									<p class="excerpt">
									{!! $reply->message !!}
									</p>
							</div>
							<hr>
						@endif
					@empty
						<h5 class="text-center">@lang('label.no_reply_yet')</h5>
						<br>
					@endforelse
            	</div>
            </div>
        </div>
    </div>
@endsection