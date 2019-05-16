@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('{{asset('image/image/teacher.jpg')}}');">
		<div class="container">
			<h1 style="color: #fff;">@lang('label.inquiry')</h1>
		</div>	
	</div>
	<div class="container">
		<!-- @include(theme('partials.tab-menu')) -->
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
                  <a href="{{route('inquiry.create')}}" class="btn btn-primary pull-right">문의하기</a>
              </div>
          </form>      
      </div>
      <br>
				 @forelse($inquiries as $inquiry)
            <div class="private-message">
                <div class="clearfix"></div>
                    <a style="cursor:pointer; font-size: 15px;" data-url="{{route('inquiry.show', $inquiry->id)}}" class="pull-right btn btn-success btn-xs @if($inquiry->password != "" ) open @else open-free @endif" id="{{$inquiry->id}}" > @lang('button.view')</a>
                    <br>
                    <b>
                        {{$inquiry->name}} @if(!$inquiry->password == "") <i class="fa fa-lock"></i> @endif
                        <small>@if($inquiry->replies) [{{  $inquiry->replies->count() }}] @endif</small>
                    </b>
                    <p>
                    {{ $inquiry->title }}
                    </p>
                    

                    <br>
                    <small class="pull-right">{{date_formater('date_time_format',$inquiry->created_at)}}</small>
                    <div class="clearfix"></div><br>
                    <hr>
            </div>
          @empty
            <div class="text-center"> 등록된 글이 없습니다.</div>
         @endforelse
         <br>
         <div class="text-center">
             
            {{$inquiries->links()}}
         </div>

		
	</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <form id="password_form" action="{{route('inquiry.verify')}}" method="post" >
          <div class="modal-body tex-center">
            <label> 보기</label>
            {{csrf_field()}}
            <input id="inquiry_id" name="inquiry_id" type="hidden">
            <input class="form-control" name="password" type="password" placeholder="비밀번호">
            <br>
            <button type="submit" class="btn btn-primary center-block">확인</button>
          </div>
         
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>

        $('.open').click(function(){
            var id = $(this).attr('id')
            $('#inquiry_id').val(id)
              var windowHeight = $(window).height();
            var windowWidth = $(window).width();
            var boxHeight = $('.modal-dialog').height();
            var boxWidth = $('.modal-dialog').width();
            $('.modal-dialog').css({'top' : ((windowHeight - boxHeight)/2)});
            $('#myModal').modal('show');
          //  alert("haha")

        })

         $('.open-free').click(function(){
            var url = $(this).data('url')
            window.open(url,'_SELF')

        })
</script>
@endsection