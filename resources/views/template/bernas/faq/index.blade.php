@extends(theme('layout.app'))
@section('content')
	<div class="page-heading" style="background-image: url('http://www.mayawebsolutions.com/img/slides/sliders1.jpg');">
		<div class="container">
			<h1>@lang('label.faq')</h1>
		</div>	
	</div>
	<div class="container">
    <youtube-audio-player></youtube-audio-player>

		<!-- @include(theme('partials.tab-menu'))
			<h3>FAQ</h3> -->
      <br>
    <div class="row">
			<div class="col-sm-12">
          <div class="row">
              <div class="col-sm-9">
               
              </div>
              <div class="col-sm-3">
                <form method="get" action="{{url('faq')}}" id="cat_select_form">
                  <select class="form-control" name="category" id="cat_select">
                    <option value="전체보기" @if(Request::get('category') == "전체보기") selected  @endif  >전체보기</option>
                    @foreach($categories as $category)
                      <option value="{{$category->category}}" @if(Request::get('category') == $category->category) selected  @endif>{{$category->category}}</option>
                    @endforeach
                  </select>
                </form>

              </div>
          </div>

                <hr>

          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($faq as $item)
              <div class="panel">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                     <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                      {{$item->title}}
                    </a>
                  </h4>
                </div>
                <div id="collapse{{$item->id}}" class="panel-collapse collapse @if($loop->first) in @endif" role="tabpanel" aria-labelledby="heading{{$item->id}}">
                  <div class="panel-body">
                    {!! $item->content !!}  
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
			
		</div>
		
	</div>

@endsection
@section('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
          $('#cat_select').change(function(){
            $('#cat_select_form').submit();
          })

          $('.panel-body img').addClass('img-responsive');
      })
    </script>
@endsection
