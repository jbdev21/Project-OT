@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.new_comment')</label>
            </div>
          	<br>
          	<div class="row">
          		<form action="{{route('admin.comment.store')}}" method="post">
          		<div class="col-sm-8 col-sm-offset-2">
          			<p>
          				<label>@lang('label.student')</label>
                  <input type="text" class="form-control" readonly="" value="{{$student->username}}">
          			   <input type="hidden"  name="user_id" value="{{$student->id}}">
          			</p>
          			<p>
          				<label>@lang('label.month')</label>
          				<input readonly class="form-control" name="month" type="month" required value="{{Request::get('month')}}">
          			</p>
          			<p>
          				
                        {{csrf_field()}}
                        <textarea  name="message" id="my-editor" rows="8" class="form-control">{!! old('message')!!}</textarea>
                        <br>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> @lang('button.save')</button>
          			    <a type="submit" href="{{ route('admin.comment.show', ['id' => $student->id, 'month' => Request::get('month')]) }}" class="btn btn-warning"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                      </p>
          		</div>
                </form>
          	</div>
       
            

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

@section('scripts')
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="{{ asset('js/tinymce-lang/ko_kr.js')}}"></script>

   <script type="text/javascript">
   	$('select[name=type]').change(function(){
   		if($(this).val() == "yearly")
   		{
   				$('input[name=schedule]').attr('type', 'text').attr('placeholder', 'Please Type here Here').val("");
   		}else{
   			$('input[name=schedule]').attr('type', 'month')
   		}
   	})

      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
   
        height : "480",
        selector: "textarea#my-editor",
        menubar: false,
        branding:false,
        themes: "modern",
        forced_root_block : false,
        language : 'ko_KR',
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
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