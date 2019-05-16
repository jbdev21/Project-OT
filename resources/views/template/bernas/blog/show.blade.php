@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
            <h1>@lang('label.blog')</h1>
        </div>  
	</div>
	<div class="container">
			<br>
			<h3>{{$blog->title}}</h3>
			<div class="main-content">{!! $blog->content !!}</div>
			<div class="spacer"></div>
			 <div class="pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        @if($previous)
                            <a class="btn btn-primary" href="{{ route( 'blog.show', $previous->slug) }}"><span class="fa fa-chevron-left"></span> 이전</a> 
                        @endif

                        @if($previous AND !$next OR !$previous AND $next)
                            <a class="btn btn-primary" href="{{url('blog')}}"> 목록 </a>
                        @endif

                        @if($previous AND $next)
                             <a class="btn btn-primary" href="{{url('blog')}}"> 목록 </a> 
                        @endif 
                        @if($next)
                            <a class="btn btn-primary" href="{{ route( 'blog.show', $next->slug) }}">다음 <span class="fa fa-chevron-right"></span> </a>
                        @endif
                    </div>
                </div>

		
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