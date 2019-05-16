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
            <div class="col-sm-12">

                <form action="{{route('inquiry.store')}}" method="post">
                    {{csrf_field()}}
                    @include('partials.error')
                    <p>
                    <input type="hidden" name="type" value="1:1">
                      <label>문의 유형</label>
                      <select name="type" class="form-control" >
                        <option value="1:1">@lang('label.1:1')</option>
                        <option value="company">@lang('label.company')</option>
                        <option value="partnership">@lang('label.partnership')</option>
                      </select>
                    </p>
                    <p>

                      <label>이름</label>
                      <input type="text" @auth value="{{ Auth::user()->korean_name }}" readonly @else value="{{ old('name') }}"  @endif name="name" class="form-control" placeholder=" 이름..">
                    </p>
                    
                    <p>
                      <label>@lang('label.contact_number')</label>
                      <input type="text" @auth value="{{Auth::user()->contact_number}}" readonly @else value="{{ old('contact_number') }}" @endif  name="contact_number" class="form-control" placeholder=" @lang('label.contact_number')">
                    </p>
                    
                    <p>
                      <label>비밀번호</label>
                      <input type="password" name="password" class="form-control" placeholder=" 비밀번호..">
                    </p>

                    <p>
                      <label>비밀번호 재입력 </label>
                      <input type="password" name="password_confirmation" class="form-control" placeholder=" 비밀번호 재입력..">
                    </p>
                    <p>
                      <label for="">제목</label>
                      <input type="text" value="{{ old('title') }}" name="title" class="form-control" required>
                    </p>
                    <br>
                    <textarea name="message" id="my-editor"  rows="3">{!! old('message') !!}</textarea>
                     <br>   
                    <button class="btn btn-default" type="submit" ><i class="fa fa-send"></i> 작성</button>
                	<a class="btn btn-default" href="{{route('inquiry')}}" ><i class="fa fa-reply-all"></i> 취소</a>
                		<br>
           			<br>
                </form>

            </div>

        </div>  
	
	</div>

@endsection
@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/tinymce-lang/ko_kr.js')}}"></script>
 
    <script>
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        height : "200",
        selector: "textarea#my-editor",
        menubar: false,
        branding:false,
        themes: "modern",
        forced_root_block : false,
        language : 'ko_KR',
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'table contextmenu paste code help wordcount'
        ],
       // toolbar: " undo redo | bold | alignleft aligncenter alignright alignjustify | bullist numlist  | link image media",
        // relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = '/media?field_name=' + field_name;
          
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : '{{config('app.name')}} File Manager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

    tinymce.init(editor_config);

</script>
@endsection