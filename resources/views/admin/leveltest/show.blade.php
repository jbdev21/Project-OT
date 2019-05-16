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
    <div class="col-md-12 col-sm-12 col-xs-12" id="app">
        <div class="x_panel">
            <div class="x_title">
               <a href="{{ route('admin.leveltest.index') }}" class="btn btn-default btn-sm"><i class="fa fa-ban"></i>  @lang('button.back')</a>
            </div>

            <div class="x_content">
             <form action="{{route('admin.leveltest.update', $leveltest->id)}}" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>{{$leveltest->name}}</h2>
                        <table class="table">
                            <tr>
                                <td>@lang('label.korean_name'):</td>
                                <td><b>{{$leveltest->korean_name}}</b></td>
                            </tr>
                             <tr>
                                <td>@lang('label.type'):</td>
                                <td>
                                    <select class="form-control" name="type">
                                        <option @if($leveltest->type == "Video") selected @endif class="Video">Video</option>
                                        <option @if($leveltest->type == "Phone") selected @endif class="Phone">Phone</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>@lang('label.time'): </td>
                                <td>
                                    <select type='text' name="time" class="form-control">
                                        @foreach( time_select() as $time)
                                            <option value="{{ date('h:iA', strtotime($time)) }}" @if(date('h:iA', strtotime($leveltest->time)) ==  date('h:iA', strtotime($time)) ) selected  @endif > {{ date('h:iA', strtotime($time)) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>@lang('label.date'):</td>
                                <td>
                                    <input required type="date" name="date" value="{{$leveltest->date}}" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>@lang('label.teacher'):</td>
                                <td>
                                    <select name="teacher" id="" class="form-control input-sm">
                                        <option value=""> No teacher Assigned </option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" @if($leveltest->admin && $leveltest->admin->id == $teacher->id) selected @endif>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </td>   
                            </tr>
                            <tr>
                                <td><label for="">셀프 레벨링 </label></td>
                                <td>
                                    <select name="self_assesment" class="form-control">
                                        <option @if($leveltest->self_assesment == "LV1/4 Starter") selected @endif value="LV1/4 Starter">LV1/4 시작레벨 (알파벳 읽기 가능)</option>
                                        <option @if($leveltest->self_assesment == "LV2/4 Can Read Word") selected @endif value="LV2/4 Can Read Word">LV2/4 준초급 (단어형태 읽기 가능)  </option>
                                        <option @if($leveltest->self_assesment == "LV3/4 Can Speak Little") selected @endif value="LV3/4 Can Speak Little">LV3/4 초급(천천히 대화 가능) </option>
                                        <option @if($leveltest->self_assesment == "LV4/4 Can Communicate") selected @endif value="LV4/4 Can Communicate">LV4/4 중급이상 (일상대화 가능)  </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="">@lang('label.book') </label></td>
                                <td>
                                    <select class="form-control" name="book_id">
                                        <option value="">- 교재 미지정 (수업후 배정 됩니다) -</option>
                                        @foreach($books as $book)
                                            <option value="{{ $book->id }}" @if($leveltest->book_id == $book->id) selected @endif>{{ $book->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
                    <hr>
                <div class="row">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                            
                        <div class="col-sm-6">
                          
                            <label for="input-1" class="control-label">@lang('label.comprehension')</label>
                            <input id="input-1" name="comprehension" value="{{$leveltest->comprehension}}" class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="comprehension_comment" id="editor2" style="resize: none" rows="8" >{!! $leveltest->comprehension_comment  !!}</textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                             <label for="input-1" class="control-label">@lang('label.pronounciation')</label>
                            <input id="input-1" name="pronounciation" value="{{$leveltest->pronounciation}}"  class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="pronounciation_comment" id="editor3" style="resize: none" rows="8" >{!! $leveltest->pronounciation_comment  !!}</textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label for="input-1" class="control-label">@lang('label.fluency')</label>
                            <input id="input-1" name="fluency" value="{{$leveltest->fluency}}"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="fluency_comment" id="editor4" style="resize: none" rows="8" >{!! $leveltest->fluency_comment  !!}</textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label for="input-1" class="control-label">@lang('label.vocabulary')</label>
                            <input id="input-1" name="vocabulary" value="{{$leveltest->vocabulary}}"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="vocabulary_comment" id="editor5" style="resize: none" rows="8" >{!! $leveltest->vocabulary_comment  !!}</textarea>
                            <br>
                        </div>
                        <div class="col-sm-6">
                             <label for="input-1" class="control-label">@lang('label.grammar')</label>
                            <input id="input-1" name="grammar" value="{{$leveltest->grammar}}"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="10" data-step="1">
                            <textarea  class="form-control" name="grammar_comment" id="editor6" style="resize: none" rows="8" >{!! $leveltest->grammar_comment  !!}</textarea>
                            <br>
                        </div>
                    </div>
                     <div class="col-sm-6">
                    <p>
                        <label>@lang('label.status')</label>
                        <select class="form-control" name="status">
                            <option value="pending" @if($leveltest->status == "pending") selected @endif >@lang('label.pending')</option>
                            <option value="present" @if($leveltest->status == "present") selected @endif >@lang('label.present')</option>
                            <option value="absent" @if($leveltest->status == "absent") selected @endif >@lang('label.absent')</option>
                        </select>
                    </p>
                    <br>

                    <button  class="btn btn-default btn-lg"  type="submit"><i class="fa fa-save"></i> @lang('button.save')</button>
                    
                    </div>
                 </form>
                </div>
            </div>
        </div>

@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css">

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js"></script>
    <script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script src="https://unpkg.com/lodash@4.16.0"></script>
    <script>
       

        $(document).ready(function(){
            //CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor2' );
            CKEDITOR.replace( 'editor3' );
            CKEDITOR.replace( 'editor4' );
            CKEDITOR.replace( 'editor5' );
            CKEDITOR.replace( 'editor6' );

            var url = "{{url('ajax/mistake')}}"
            var process = ""
            $('.add_mistake').click(function(){
                process = "add";
                $('#myModal').modal('show')
                $('#mistakefrm').trigger('reset')
            });


        })

		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}

	
		google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['This is just only for Sample', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);

        var options = {
          title: 'Sample Chart',
          width: 600,
          legend: { position: 'none' },
          chart: { title: 'Sample Chart',
                   subtitle: 'Chart Demo' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('canvasRadar'));
        chart.draw(data, options);
      };

			
			
    </script>    
@endsection