<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12" id="app">
        <div class="x_panel">
            <div class="x_title">
              <a href="{{ route('teacher.session.today') }}" class="btn btn-default btn-xs"><i class="fa fa-reply-all"></i> Back </a>  Student : <label>{{$session->classer->user->name}} / {{$session->classer->user->korean_name}}</label>&nbsp;&nbsp;&nbsp;Contact Number: {{$session->classer->user->contact_number}} / {{$session->classer->user->contact_number1}} &nbsp;&nbsp;&nbsp;Date/Time : {{ date_formater('date_time_format',$session->date_time)}}
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-3" >
                        <book-manager currentpage="{{ $session->classer ? $session->classer->page : 0 }}" classid="{{ $session->classer->id }}" bookid="{{ $session->classer ? $session->classer->book_id : 0 }}"></book-manager>
                    </div>
                    <div class="col-sm-6" style="border-left: 1px solid #ccd0d2; border-right: 1px solid #ccd0d2">

                        <a  href="{{video_url($session->classer->id, 'teacher')}}"  class="btn btn-success btn-lg btn-lg" target="_blank"><i class="fa fa-video-camera"></i> Start Class</a>
                        
                        <form action="{{route('teacher.session.update', $session->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <label>Status</label>
                            <select @if($session->status =="postponed") disabled @endif class="form-control"  name="status">
                                
                                
                                @if($session->status =="postponed")
                                    <option value="postponed" @if($session->status =="postponed") selected @endif disabled> Postponed</option>
                                @else
                                    <option value="ready" @if($session->status =="ready") selected @endif > Waiting</option>
                                    <option value="present" @if($session->status =="present") selected @endif > Present</option>
                                    <option value="absent" @if($session->status =="absent") selected @endif> Absent</option>
                                    <option value="delay" @if($session->status =="delay") selected @endif> Delay</option>
                                @endif
                            </select>
                            <br>
                            <label>Comments </label>
                            <textarea  class="form-control" name="comment" id="editor" style="resize: none" rows="8" required>{!! $session->comment  !!}</textarea>
                            <br>
                            <label for="input-1" class="control-label">Listening</label>
                            <select class="star"  name="comprehension">
                                <option value="1" @if($session->comprehension == 1) selected @endif >1</option>
                                <option value="2" @if($session->comprehension == 2) selected @endif >2</option>
                                <option value="3" @if($session->comprehension == 3) selected @endif >3</option>
                                <option value="4" @if($session->comprehension == 4) selected @endif >4</option>
                                <option value="5" @if($session->comprehension == 5) selected @endif >5</option>
                                <option value="6" @if($session->comprehension == 6) selected @endif >6</option>
                                <option value="7" @if($session->comprehension == 7) selected @endif >7</option>
                                <option value="8" @if($session->comprehension == 8) selected @endif >8</option>
                                <option value="9" @if($session->comprehension == 9) selected @endif >9</option>
                                <option value="10" @if($session->comprehension == 10) selected @endif >10</option>
                            </select>
                            <br>
                            <label for="input-1" class="control-label">Speaking</label>
                            <select class="star"  name="pronounciation">
                                <option value="1" @if($session->pronounciation == 1) selected @endif >1</option>
                                <option value="2" @if($session->pronounciation == 2) selected @endif >2</option>
                                <option value="3" @if($session->pronounciation == 3) selected @endif >3</option>
                                <option value="4" @if($session->pronounciation == 4) selected @endif >4</option>
                                <option value="5" @if($session->pronounciation == 5) selected @endif >5</option>
                                <option value="6" @if($session->pronounciation == 6) selected @endif >6</option>
                                <option value="7" @if($session->pronounciation == 7) selected @endif >7</option>
                                <option value="8" @if($session->pronounciation == 8) selected @endif >8</option>
                                <option value="9" @if($session->pronounciation == 9) selected @endif >9</option>
                                <option value="10" @if($session->pronounciation == 10) selected @endif >10</option>
                            </select>
                            <br>
                            <label for="input-1" class="control-label">Pronunciation</label>
                            <select class="star"  name="fluency">
                                <option value="1" @if($session->fluency == 1) selected @endif >1</option>
                                <option value="2" @if($session->fluency == 2) selected @endif >2</option>
                                <option value="3" @if($session->fluency == 3) selected @endif >3</option>
                                <option value="4" @if($session->fluency == 4) selected @endif >4</option>
                                <option value="5" @if($session->fluency == 5) selected @endif >5</option>
                                <option value="6" @if($session->fluency == 6) selected @endif >6</option>
                                <option value="7" @if($session->fluency == 7) selected @endif >7</option>
                                <option value="8" @if($session->fluency == 8) selected @endif >8</option>
                                <option value="9" @if($session->fluency == 9) selected @endif >9</option>
                                <option value="10" @if($session->fluency == 10) selected @endif >10</option>
                            </select>
                            <br>
                            <label for="input-1" class="control-label">Vocabulary</label>
                            <select class="star"  name="vocabulary">
                                <option value="1" @if($session->vocabulary == 1) selected @endif >1</option>
                                <option value="2" @if($session->vocabulary == 2) selected @endif >2</option>
                                <option value="3" @if($session->vocabulary == 3) selected @endif >3</option>
                                <option value="4" @if($session->vocabulary == 4) selected @endif >4</option>
                                <option value="5" @if($session->vocabulary == 5) selected @endif >5</option>
                                <option value="6" @if($session->vocabulary == 6) selected @endif >6</option>
                                <option value="7" @if($session->vocabulary == 7) selected @endif >7</option>
                                <option value="8" @if($session->vocabulary == 8) selected @endif >8</option>
                                <option value="9" @if($session->vocabulary == 9) selected @endif >9</option>
                                <option value="10" @if($session->vocabulary == 10) selected @endif >10</option>
                            </select>
                            <br>
                            <label for="input-1" class="control-label">Grammar</label>
                            <select class="star"  name="grammar">
                                <option value="1" @if($session->grammar == 1) selected @endif >1</option>
                                <option value="2" @if($session->grammar == 2) selected @endif >2</option>
                                <option value="3" @if($session->grammar == 3) selected @endif >3</option>
                                <option value="4" @if($session->grammar == 4) selected @endif >4</option>
                                <option value="5" @if($session->grammar == 5) selected @endif >5</option>
                                <option value="6" @if($session->grammar == 6) selected @endif >6</option>
                                <option value="7" @if($session->grammar == 7) selected @endif >7</option>
                                <option value="8" @if($session->grammar == 8) selected @endif >8</option>
                                <option value="9" @if($session->grammar == 9) selected @endif >9</option>
                                <option value="10" @if($session->grammar == 10) selected @endif >10</option>
                            </select>
                             <br>
                            
                            <button class="btn btn-default" @if($session->status =="postponed") disabled  @endif type="submit"><i class="fa fa-save"></i> Save Changes</button>
                            
                        </form>
                    </div>

                    
                    <div class="col-sm-3">
                         <session-correction :session_id="{{$session->id}}"></session-correction>
                    </div>

                  
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('teacher.session.mistake') }}" id="mistakefrm1" method="post">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Mistake</h4>
                    </div>
                    <div class="modal-body">
                        <label>Mistake</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-ban"></i></span>
                            <input type="text" name="mistake_body" id="mistake_body" class="form-control" required>
                            <input type="hidden" name="class_session_id" id="class_session_id" value="{{$session->id}}" required>
                        </div>
                        <label>Correction</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                            <input type="text" name="correction" id="correction" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalAttendance" tabindex="-1" role="dialog" aria-labelledby="myModalAttendance">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">All Attendance</h4>
                </div>
                <div class="modal-body" style="height: 400px; overflow: auto">
                    <table class="table">

                        <tbody id="attendance-toby">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
     <link rel="stylesheet" href="{{asset('js/themes/fontawesome-stars.css')}}" />
@endsection
@section('scripts')
    <script src="{{asset('js/jquery.barrating.min.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script src="https://unpkg.com/lodash@4.16.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
       

        $(document).ready(function(){
            $('.star').barrating({
                theme: 'fontawesome-stars',
                allowEmpty: true,
            });

            CKEDITOR.replace( 'editor', 
            {
                enterMode: CKEDITOR.ENTER_BR,
                height:'400px',
            }
            );
           

            var url = "{{url('teacher')}}"
            var process = ""
            $('.add_mistake').click(function(){
                process = "add";
                $('#myModal').modal('show')
                $('#mistakefrm').trigger('reset')
            });

            $('#mistakefrm').submit(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                var formData = {
                    class_session_id: $('#class_session_id').val(),
                    mistake_body: $('#mistake_body').val(),
                    correction: $('#correction').val(),
                    _token: "{{csrf_token()}}"
                }


                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        var mistake_list = '<div class="mistakes" id="mistake_'+ data.id +'">';
                            mistake_list += '<span class="wrong"><i class="fa fa-ban"></i>'+ data.mistake_body +'</span><br>'
                            mistake_list += '<span class="correct"><i class="fa fa-check"></i> '+ data.correction +'</span>'
                            mistake_list += '<small><a href="#" id="'+ data.id +'" class="pull-right delete_mistake"><i class="fa fa-trash"></i> Delete</a></small></div>'

                        if (process == "add"){ //if user added a new record
                            $('.mistake_list').prepend(mistake_list);
                        }

                        $('#mistakefrm').trigger("reset");
                        $('#myModal').modal('hide')
                    },
                    error: function (data) {
                        //console.log('Error:', data);
                    }
                });

            })


            $(document).on('click','.delete_mistake',function(){
                var mistake_id = $(this).attr('id');
                if(confirm("Are you sure to delete?"))
                {
                    $.ajax({
                        type: "POST",
                        url: url + '/session/deletemistake/' + mistake_id,
                        data: {_method: 'POST', _token :'{{csrf_token()}}'},
                        success: function (data) {
                            $("#mistake_" + mistake_id).fadeOut();
                        },
                        error: function (data) {

                        }
                    });
                }
                
            });

            $('.open-all-attendance').click(function(){
                $('#myModalAttendance').modal('show')
                var url = "{{url('ajax/class/session')}}"
                var id = $(this).attr('id')

                $.get(url + "/" +  id, function(data) {
                    //console.log(data)
                    if (data.length > 0) {

                        $.each(data, function () {
                            var comment = ""
                            var comment = String(this.comment) == "null" ? "0" : String(this.comment).length
                            var content = '<tr>'
                            content += '<td>' + this.date_time + '</td>'
                            content += '<td>' + comment + '</td>'
                            content += '<td><a href="{{url('teacher/classes/session/')}}/' + this.id + '" class="btn btn-default btn-xs" > Review</a></td></tr>'
                            $('#attendance-toby').prepend(content)
                        });
                    }else{
                        var content = '<tr>'
                        content += '<td align="center" colspan="3">No Attendance</td></tr>'
                        $('#attendance-toby').prepend(content)
                    }


                })

            })


            $(document).on('click','.pagination a', function(e){
                //e.preventDefault();
                var url = $(this).attr('href')
                $('#book_preview').hide()
                $('#loading-image').show()
                //alert(url)
                $.get(url, function(data){

                   // $('#image-preview').html(data)
                    $('#loading-image').hide();
                    /*
                    $('#book_preview').attr('src',data.url)
                    $('#book_preview').show()
                        */
                })
            })

        })

    </script>
@endsection
