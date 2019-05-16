@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
			<h1 style="color: #fff;">공지사항</h1>
		</div>	
	</div>
	<div class="container">
		
				<h2>{{$notice->title}}</h2>

        		<small>{{date_formater('datetime_format',$notice->created_at)}}</small>
        		<br>
        		<br>
        		<div class="main-content">
        		    {!! $notice->message!!}
                </div>   

        		<div class="spacer"></div>
                <div class="pull-right">
                    <div class="btn-group" role="group" aria-label="...">
                        @if($previous)
                            <a class="btn btn-primary" href="{{ route( 'notice.show', $previous->slug) }}"><span class="fa fa-chevron-left"></span> 이전</a> 
                        @endif

                        @if($previous AND !$next OR !$previous AND $next)
                            <a class="btn btn-primary" href="{{url('notice')}}"> 목록 </a>
                        @endif

                        @if($previous AND $next)
                             <a class="btn btn-primary" href="{{url('notice')}}"> 목록 </a> 
                        @endif 
                        @if($next)
                            <a class="btn btn-primary" href="{{ route( 'notice.show', $next->slug) }}">다음 <span class="fa fa-chevron-right"></span> </a>
                        @endif
                    </div>
                </div>
			
				<br>
				<br>	
	</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.main-content img').addClass('img-responsive');
        })
    </script>
@endsection