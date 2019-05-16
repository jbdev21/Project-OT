@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>Message</label>
            </div>
            <a href="{{ route('teacher.message.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> Back</a>

            <div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
            		<h4>
            	  {{$message->user->username}}
            	
            	<br>
            	<small>{{$message->user->korean_name}}</small>
              </h4>
            		{!! $message->message !!}
            <hr>
            	</div>
            </div>
            <div class="row">
            	<div class="col-sm-6 col-sm-offset-3">
            		@forelse($message->replies as $reply)
						      <div class="block_content">
                    <div class="well">
                        <h2 class="title">
                          {{$reply->admin->name}}
                        </h2>
                          <div class="byline">
                            <span>{{date_formater('date_time_format', $reply->created_at)}}</span>
                          </div>
                            <p class="excerpt">
                              {!! $reply->message !!}
                            </p>
                            <form id="form-{{$reply->id}}" method="post" action="{{ route('teacher.message.destroy', $reply->id) }}">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <input type="hidden" name="message_id" value="{{$message->id}}">
                            </form>
                            <a href="#" type="button" onclick="if(confirm('Are you sure to delete this reply?')) { $(' #form-{{$reply->id}}').submit() }"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                  			   
                    @empty
                    	<h5 class="text-center"> No Reply Yet</h5>
                    	<br>
                    @endforelse

                     <form action="{{route('teacher.message.update', $message->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        
                        <textarea  name="message" id="my-editor" rows="8" class="form-control">{!! old('message')!!}</textarea>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Save Reply</button>
                    </form>
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
   
        height : "250",
        selector: "textarea#my-editor",
        menubar: false,
        branding:false,
        themes: "modern",
        forced_root_block : false,
        plugins: [
          "advlist autolink lists link  charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime  nonbreaking save table contextmenu directionality",
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