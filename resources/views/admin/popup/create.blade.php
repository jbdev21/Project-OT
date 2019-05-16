@extends('layouts.admin')

@section('content')
   <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
             <div class="x_title">
              @lang('label.popup')
            </div>
            <div class="row">
            <form action="{{ route('admin.popup.store') }}" method="post">
            {{ csrf_field() }}
                <div class="col-sm-2">
                    <a href="{{route('admin.popup.index')}}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                </div>
                <div class="col-sm-8">
    
                        <h2 class="sub-header">@lang('label.apperance')</h2>
                             <label for="">타이틀 *</label>
                                <input type="text" name="title" require class="form-control">
                                <br>
                            <div class="padding-sm">
                                <div class="position-selection">
                                    <label for="position">@lang('label.position')</label>
                                    <br>

                                    <input type="radio" checked id="center" name="position" value="center">
                                    <label for="center" class="btn btn-default position">
                                        @lang('label.center')
                                    </label>
                                    
                                    <input type="radio" id="top"  name="position" value="top">
                                    <label for="top" class="btn btn-default position">
                                        @lang('label.top')
                                    </label>
                                </div>
                                <br>
                                    <label for="">@lang('label.colors')</label>
                                <div class="colors">
                                    <label for="color" class="btn btn-sm btn-default"> <input type="color" id="color" name="title_color">@lang('label.title_color')</label>
                                  
                                    <label for="background_color"  class="btn btn-sm btn-default"> <input type="color"  value="#ffffff" id="background_color" name="background_color">@lang('label.background_color')</label>
                                    
                                    <label for="text"  class="btn btn-sm btn-default"> <input type="color" id="text" name="text_color">@lang('label.text_color')</label>
                                    
                                    <label for="button_text_color"  class="btn btn-sm btn-default"> <input type="color" id="button_text_color" name="button_text_color">@lang('label.button_text_color')</label>
                                    
                                    <label for="button_color"  class="btn btn-sm btn-default"> <input type="color" id="button_color" name="button_color"> @lang('label.button_color')</label>
                                  
                                   
                                </div>
                            <br>

                            <h2 class="sub-header">@lang('label.content')</h2>
                            <div class="padding-sm">
                               
                                <label for="">@lang('label.description')</label>
                                <textarea class="form-control" id="my-editor" require  name="description"  rows="6"></textarea>

                                <br>
                                <label for="">@lang('label.button_text')<small><i>(@lang('label.optional'))</i></i>  </small></label>
                                <input type="text"  name="button_text"  class="form-control">
                                <br>
                                 <label for="">@lang('label.button_link') <small><i>(@lang('label.optional'))</i></i>  </small></label>
                                <input type="text"  name="button_link"  class="form-control">
                            </div>
                            <br>

                            <h2 class="sub-header">@lang('label.behavior')</h2>
                            <div class="padding-sm">
                                <label for="">@lang('label.start_to_display')</label>
                                <input type="date" name="date_start" value="{{date('Y-m-d')}}" require class="form-control"> 
                                <br>

                                <label for="">@lang('label.end_of_display')</label>
                                <input type="date" name="date_end" class="form-control">
                                <br>
                                
                                 <label for="">@lang('label.load_to_display')</label>
                                 <select name="display_load" id="" class="form-control">\
                                    <option value="every_load">@lang('label.every_homepage_load')</option>
                                    <option value="first_load">@lang('label.just_on_first_load')</option>
                                 </select>
                            </div>
                            <br>

                            <h2 class="sub-header">@lang('label.publish')</h2>
                            <div class="padding-sm">
                                <label><input type="checkbox" name="show"> @lang('label.show') </label>
                                <div class="text-center">
                                <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i> @lang('button.save')</button>
                                </div>
                                
                            </div>
                    
                </div>
                </div>
            </form>
            </div>

        </div>

    </div>
    <br>
@endsection

@section('styles')
    <style>
        .position-selection input[type="radio"]{
            display:none;
        }

        .colors input[type="color"] {
            -webkit-appearance: none;
            border: none;
            width: 25px;
            height: 20px;
            position:absolute;
            left:5px;
        }

        .colors label{
            position:relative;
            padding-left:35px;
        }

        .colors input[type="color"]::-webkit-color-swatch-wrapper {
            padding: 0;
        }
        
        .colors input[type="color"]::-webkit-color-swatch {
            border: none;
        }

        .position{
            width:100px;
        }

        .position-selection input[type="radio"]:checked+label {
            border:2px solid #05b247;
        }

    </style>
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
        height : "380",
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
            title : 'S2 File Manager',
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