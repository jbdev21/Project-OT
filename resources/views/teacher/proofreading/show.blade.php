@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>Proofreading</label>
            </div>
            

            <div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
            		<h4>
            	{{$proofreading->user->username}}
            	
            	<br>
            	<small>{{$proofreading->user->korean_name}}</small>
            </h4>
            		{!! $proofreading->message !!}
            	</div>
            </div>
            <div class="row">
            	<div class="col-sm-6 col-sm-offset-3">
            		@forelse($proofreading->replies as $reply)
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
                            <form id="form-{{$reply->id}}" method="post" action="{{ route('teacher.proofreading.destroy', $reply->id) }}">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <input type="hidden" name="proofreading_id" value="{{$proofreading->id}}">
                            </form>
                            <a href="#" type="button" onclick="if(confirm('Are you sure to delete this reply?')) { $(' #form-{{$reply->id}}').submit() }"><i class="fa fa-trash"></i></a>
                        </div>
                        <hr>
                    @empty
                    	<h5 class="text-center"> No Reply Yet</h5>
                    	<br>
                    @endforelse

                     <form action="{{route('teacher.proofreading.update', $proofreading->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <textarea  name="message" id="my-editor" rows="8" class="form-control">{!! old('message')!!}</textarea>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Save Reply</button>
                    </form>
            	</div>
            </div>
        </div>
    </div>
@endsection

@section('editor')
  @include('partials.full-editor')
@endsection