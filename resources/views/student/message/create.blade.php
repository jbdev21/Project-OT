@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm">
		<h6>
    @if(Request::get('to') == "admin")
		  	1:1문의 &nbsp;&nbsp;
		  @else
		  	강사와 대화 
		  @endif</h6>
		<div class="row">
			<form action="{{ route('dashboard.message.store') }}" method="post">
				{{csrf_field()}}
				<div class="col-sm-8 col-sm-offset-2">
          @if(Request::get('to') == "admin")
          <p>
            <select class="form-control" name="admin_id" required>
              <option value="{{$teachers->id}}">Admin</option>
            </select>
          </p>
          @else
            <p>
              <label>@lang('label.teachers')</label>
              <select class="form-control" name="admin_id" required>
                @forelse($teachers as $teacher)
                  <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @empty
                  <option value=""> 등록된 수업이 없습니다</option>
                @endforelse
              </select>
            </p>
          @endif
					<textarea id="my-editor" name="message"></textarea>
					<br>
					<div class="text-center">
						<button class="btn btn-primary" type="submit"> @lang('button.submit')</button>
						<a class="btn btn-warning" href="{{ route('dashboard.message.index', ['from' => Request::get('to')]) }}" > @lang('button.cancel')</a>
					</div>
				</div>
			</form>
		</div>
	</div>
@else
    <h6 class="mobile-title">강사를 선택 후 메세지를 전달하세요.</h6>
    <div class="container">
      <form action="{{ route('dashboard.message.store') }}" method="post">
				{{csrf_field()}}
					<p>
						<label>@lang('label.teachers')</label>
							<select class="form-control" name="admin_id" required>
							@forelse($teachers as $teacher)
								<option value="{{$teacher->id}}">{{$teacher->name}}</option>
              @empty
								<option value=""> 등록된 수업이 없습니다</option>
							@endforelse
						</select>
					</p>
					<textarea id="my-editor" name="message"></textarea>
					<br>
					<div class="text-center">
						<button class="btn btn-primary btn-block" type="submit"> @lang('button.submit')</button>
						<a class="btn btn-warning btn-block" href="{{ route('dashboard.message.index') }}" > @lang('button.cancel')</a>
					</div>
          <br>
			</form>
    </div>
@endif
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
   
        height : "400",
        selector: "textarea#my-editor",
        menubar: false,
        branding:false,
        themes: "modern",
        forced_root_block : false,
        language : 'ko_KR',
        plugins: [
          "advlist autolink lists link charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
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
            title : 'Media Manager',
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