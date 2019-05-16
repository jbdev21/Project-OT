@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
			<h1 style="color: #fff;">@lang('label.postponed')</h1>
		</div>	
	</div>
	<div class="container">
        <br>
        <br>
        <br>
        @foreach($sessions as $session)
           
            <div class="notice-box">
                <span class="pull-right">{{ date('Y-m-d', strtotime($session->postponed_timestamp)) }}</span>
                <h4>
                @if($session->classer->user)
                    {{ $session->classer->user->username }}
                    @endif 님 {{ date('m', strtotime($session->date_time)) }}월 {{ date('d', strtotime($session->date_time)) }}일 수강연기 되었습니다 
                </h4>
            </div>
        @endforeach
        {{ $sessions->links() }}
        <br>
        <br>
        <br>
	</div>
@endsection