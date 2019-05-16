@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.all_testimonial')</label>
            </div> 
            <a class="btn btn-default" href="{{ route('admin.testimonial.index') }}"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
            <div class="row">
				<div class="text-right">
            			<form method="post" action="{{ route('admin.testimonial.update', $testimonial->id) }}"> 
            				{{csrf_field()}}
            				{{method_field("PUT")}}
            				<button type="submit" class="btn @if($testimonial->is_show) btn-success @else btn-warning @endif">@if($testimonial->is_show) 홈페이지 ON 상태임 (클릭시 숨김) @else 홈페이지 OFF 상태임 (클릭시 보임) @endif</button>
            			</form>
            		</div>
            	<div class="col-sm-8 col-sm-offset-2">
            		<h2>
            			{{$testimonial->user->korean_name}}<br>
            			{{$testimonial->user->username}}<br>
            			
            		</h2>

            		{!! $testimonial->message !!}
            		<small>{{$testimonial->created_at}}</small>
            		<br>
            		<br>
            		
            	</div>
            </div>
            	<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								@forelse($testimonial->replies as $reply)
									<div class="block_content">
	                          			<h2 class="title">
	                                      	{{$reply->admin->name}}
	                                    </h2>
			                          <div class="byline">
			                            <span>{{date_formater('date_time_format', $reply->created_at)}}</span>
			                          </div>
				                          <p class="excerpt">
				                          	{!! $reply->message !!}
				                          </p>
			                        </div>
			                        <hr>
			                    @empty
			                    	<h4 class="text-center"> @lang('label.no_reply_yet')</h4>
			                    	<br>
			                    @endforelse

		                        <form action="{{route('admin.testimonial.reply')}}" method="post">
		                        	{{csrf_field()}}
		                        	<input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
		                         	<textarea  name="message" id="my-editor" rows="8" class="form-control">{!! old('message')!!}</textarea>
			                        <br>
			                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.submit')</button>
			                        <a href="{{ route('admin.testimonial.index') }}"class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
		                        </form>

							</div>
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
        height : "180",
        selector: "textarea#my-editor",
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