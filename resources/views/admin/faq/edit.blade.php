<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/13/2017
 * Time: 11:32 AM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                @lang('label.adding_new_blog')
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="row">

                <form action="{{route('admin.faq.update', $faq->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="col-sm-12">
                    	<div class="row">
                    		<div class="col-sm-6">   
                    			<label for="">@lang('label.title')</label>
                        		<input type="text" name="title" value="{{$faq->title}}" class="form-control" required>
                        	</div>
                    		<div class="col-sm-6">
                    			<label for="">@lang('label.category')</label>
                        		<input type="text" name="category" value="{{$faq->category}}" class="form-control" required>
                    		</div>
                    	</div>
                    
                        <br>
                        <textarea  name="content" id="my-editor" rows="8" class="form-control">{!! $faq->content !!}</textarea>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.save_changes')</button>
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                    </div>

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
        content_css: ['https://fonts.googleapis.com/css?family=Black+And+White+Picture|Black+Han+Sans|Cute+Font|Do+Hyeon|Jua|Kirang+Haerang|Nanum+Gothic|Nanum+Myeongjo|Nanum+Pen+Script'],
        font_formats: 'Verdana=Verdana;courier New=Courier New;Consolas=Consolas;Calibri=Calibri;Arial Narrow=Arial Narrow;Arial Black=arial black;Times New Roman=times new roman,times;나눔고딕=Nanum Gothic;나눔명조=Nanum Myeongjo;큐트=Cute Font;나눔펜=Nanum Pen Script;도현체=Do Hyeon;굵은체=Black Han Sans;동그란=Jau;별똥별귀염=Black And White Picture;불규칙=Kirang Haerang',
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
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent fontselect fontsizeselect forecolor | link image media",
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
