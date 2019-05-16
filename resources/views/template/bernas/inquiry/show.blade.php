@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
			<h1 style="color: #fff;">@lang('label.inquiry')</h1>
		</div>	
	</div>
	<div class="container">
	  		<br>
			<div class="row">
	          <form method="get" action="{{route('inquiry')}}">
	              <div class="col-sm-4">
	                  <input class="form-control" value="{{\Request::input('key')}}" name="key" placeholder="찾기...">
	              		<br>
	              </div>

	              <div class="col-sm-3">
	                  <select class="form-control" name="by">
	                      <option value="name" @if(\Request::input('by') == "name") selected @endif>이름</option>
	                      <option value="message" @if(\Request::input('by') == "message") selected @endif>내용</option>
	                  </select>
	                  <br>
	              </div>
	              <div class="col-sm-2">
	                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> 검색어</button>
	              </div>
	              <div class="col-sm-3">
	                  <a href="{{route('inquiry.create')}}" class="btn btn-default pull-right">문의하기</a>
	              </div>
	          </form>      
      		</div>
      		
      		<h3>
				{{$inquiry->name}}	
			<small >{{date_formater('date_time_format', $inquiry->created_at)}}</small>
			</h3>
			<label for="">{{ $inquiry->title }}</label>
			<p class="main-content">
				{!! $inquiry->message !!}
			</p>
			<hr>
			<label>@lang('label.reply')</label>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					@forelse($inquiry->replies as $reply)
						<div class="block_content">
		          			<h3 class="title">
		                      	{{$reply->admin->name}}
		                    </h3>
		                  <div class="byline">
		                    <span>{{date_formater('date_time_format', $reply->created_at)}}</span>
		                  </div>
		                      <p class="excerpt">
		                      	{!! $reply->message !!}
		                      </p>
		                </div>
		                <hr>
		            @empty
		            	<h4 class="text-center"> @lang('label.no_reply_yet')</h4>
		            	<br>
		            @endforelse

					<br>
					
				</div>
			</div>
     	
				<a href="{{ url('inquiry') }}"  class="btn btn-default">@lang('button.back')</a>

		
		
	</div>
	<br>
@endsection
@section("scripts")
	<script>
        $(document).ready(function(){
            $('.main-content img').addClass('img-responsive');
        })
    </script>
@endsection