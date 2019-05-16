@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
			<h1>@lang('label.blog')</h1>
		</div>		
	</div>
	<div class="container">
			<br>
			@foreach($topblogs as $topblog)
				<div class="notice-box">
					<span class="pull-right">{{ date('Y-m-d', strtotime($topblog->created_at)) }}</span>
					<h3><span style='font-size:11px;padding:3px;background-color:#00baf7; border:none; border-radius:5px; color:white; position:relative; top:-4px'>NOTICE</span>  <a href="{{route('blog.show', $topblog->slug)}}">{{$topblog->title}}</a> <small>{{ date_formater('date_formater', $topblog->created_at) }}</small></h3>
				</div>
			@endforeach
			@foreach($blogs as $blog)
				<div class="notice-box">
					<span class="pull-right">{{ date('Y-m-d', strtotime($blog->created_at)) }}</span>
					<h3><a href="{{route('blog.show', $blog->slug)}}">{{$blog->title}}</a> <small>{{ date_formater('date_formater', $blog->created_at) }}</small></h3>
					{{-- <p>{!! str_limit( textbreak(filterImage($blog->content)), 250) !!}</p> --}}
				</div>
			@endforeach

	</div>
	<br>

@endsection