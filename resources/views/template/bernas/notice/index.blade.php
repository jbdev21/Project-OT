@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
			<h1 style="color: #fff;">공지사항</h1>
		</div>	
	</div>
	<div class="container">
		<!-- @include(theme('partials.tab-menu'))

			<h3>@lang('label.notice')</h3> -->
				<br>
				@foreach($topnotices as $topnotice)
					<div class="notice-box">
						<span class="pull-right">{{ date('Y-m-d', strtotime($topnotice->created_at)) }}</span>
						<h3><span style='font-size:11px;padding:3px;background-color:#00baf7; border:none; border-radius:5px; color:white; position:relative; top:-4px'>NOTICE</span> <a href="{{route('notice.show', $topnotice->slug)}}">{{$topnotice->title}}</a> </h3>
					</div>
				@endforeach
				@foreach($notices as $notice)
					<div class="notice-box">
						<span class="pull-right">{{ date('Y-m-d', strtotime($notice->created_at)) }}</span>
						<h3><a href="{{route('notice.show', $notice->slug)}}">{{$notice->title}}</a> </h3>
					</div>
				@endforeach
	</div>

@endsection