<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.inquiry')</label>
            </div> 
            <div class="row">	
            		<div class="col-sm-8 col-sm-offset-2">
						<h3>
							{{$inquiry->name}}	<small>{{date_formater('date_time_format', $inquiry->created_at)}}</small>
						</h3>
						<small >{{date_formater('datetime_format', $inquiry->created_at)}}</small>
						<p>
            @lang('label.'. $inquiry->type)
            </p>
            <p>
            <label for="">{{ $inquiry->title }}</label>
            </p>
            <p>
							{!! $inquiry->message !!}
						</p>
						<hr>
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								@forelse($inquiry->replies as $reply)
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

		                        <form action="{{route('admin.inquiry.reply')}}" method="post">
		                        	{{csrf_field()}}
		                        	<input type="hidden" name="inquiry_id" value="{{$inquiry->id}}">
		                         	<textarea  name="message" id="my-editor" rows="8" class="form-control">{!! old('message')!!}</textarea>
			                        <br>
			                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.submit')</button>
			                        <a href="{{ route('admin.inquiry.index') }}"class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
		                        </form>

							</div>
						</div>
						

						 
            		</div>
            </div>	
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        height : "180",
        selector: "textarea#my-editor",
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