<ul class="nav nav-tabs" role="tablist">
	@if(Request::segment(1) == "notice") 
  		<li role="presentation"  class="active"><a href="{{url('notice')}}" aria-controls="home" role="tab" >공지사항</a></li>
  	@elseif(Request::segment(1) == "inquiry")
    	<li role="presentation" class="active"><a href="{{url('inquiry')}}" aria-controls="messages" role="tab">1:1문의</a></li>
    @else
    	<li role="presentation"class="active"><a href="{{url('faq')}}" aria-controls="profile" role="tab">자주 묻는 질문</a></li>
    @endif
</ul>