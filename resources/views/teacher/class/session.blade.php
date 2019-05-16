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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                Date/Time : {{$session->date_time}}
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-3">
                        <form action="{{route('teacher.session.update', $session->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="present" @if($session->status =="present") selected @endif > Present</option>
                                <option value="absent" @if($session->status =="absent") selected @endif> Absent</option>
                                <option value="postponed" @if($session->status =="postponed") selected @endif> Postponed</option>
                            </select>
                            <br>
                            <label>Comments </label>
                            <textarea  class="form-control" name="comment" id="editor" style="resize: none" rows="8" required>{!! $session->comment  !!}</textarea>
                            <br>
                            <label>Today's Vocabulary </label>
                            <textarea  class="form-control" name="comment" id="editor1" style="resize: none" rows="2" required>{!! $session->comment  !!}</textarea>
                            <br>
                            <label>Everyday <Idioms></Idioms> </label>
                            <textarea  class="form-control" name="comment" id="editor2" style="resize: none" rows="2" required>{!! $session->comment  !!}</textarea>
                            <br>
                            <label for="input-1" class="control-label">Comprehension</label>
                            <input id="input-1" name="comprehension" value="{{$session->comprehension}}" class="rating rating-loading" data-min="0"  data-size="xs" data-max="5" data-step="1">
                            <br>
                            <label for="input-1" class="control-label">Pronounciation</label>
                            <input id="input-1" name="pronounciation" value="{{$session->pronounciation}}"  class="rating rating-loading" data-min="0"  data-size="xs" data-max="5" data-step="1">
                            <br>
                            <label for="input-1" class="control-label">Fluency</label>
                            <input id="input-1" name="fluency" value="{{$session->fluency}}"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="5" data-step="1">
                            <br>
                            <label for="input-1" class="control-label">Vocavolary</label>
                            <input id="input-1" name="vocabulary" value="{{$session->vocabulary}}"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="5" data-step="1">
                            <br>
                            <label for="input-1" class="control-label">Grammar</label>
                            <input id="input-1" name="grammar" value="{{$session->grammar}}"   class="rating rating-loading" data-min="0"  data-size="xs" data-max="5" data-step="1">
                            <br>
                             <br>
                            <button class="btn btn-default  type="submit"><i class="fa fa-save"></i> Save Changes</button>
                        </form>
                    </div>

                    <div class="col-sm-9" style="border-left: 1px solid #ccd0d2; border-right: 1px solid #ccd0d2">
                        <div class="row">
                            <form action="{{route('teacher.classer.changebook')}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <input type="hidden" name="class_id" value="{{$session->classer->id}}">
                                <div class="col-sm-6">
                                    <label for=""> Title</label>
                                    <select name="book_id" id="books_select" class="form-control" required>
                                        @foreach($books as $book)
                                            @if($session->classer->book_id == null)
                                                <option value=""> no book seleted</option>
                                                <option value="{{$book->id}}" > {{$book->title}}</option>
                                            @else
                                                <option @if($session->classer->book_id == $book->id) selected @endif  value="{{$book->id}}"> {{$book->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for=""> Page</label>
                                    <input type="number" required name="page" value="{{$session->classer->page}}" placeholder=" page number" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for=""> &nbsp;</label><br>
                                    <button class="btn btn-default" type="submit"><i class="fa fa-check"></i>Update</button>
                                </div>
                            </form>
                        </div>
                        <center>
                        <div id="image-preview">
                            @if($session->classer->book_id == null && app('request')->input('page') == "")
                                    <br>
                                    <div class="text-center">
                                    <label>No Book been set</label>
                                    </div>
                            @elseif( $session->classer->book_id != null &&  app('request')->input('page') == Null)
                                    {{$session->classer->book->page()->paginate(1)->links()}}
                                    <img id="book_preview" src="{{ App\BookPage::where('book_id', $session->classer->book_id)->where('page_number', $session->classer->page)->first()->url}}" class="img img-responsive">
                            @elseif( $session->classer->book_id != null &&  app('request')->input('page') != Null)
                                    {{$session->classer->book->page()->paginate(1)->links()}}
                                    <img id="book_preview" src="{{ App\BookPage::where('book_id', $session->classer->book_id)->where('page', app('request')->input('page'))->first()->url}}" class="img img-responsive">
                            @else
                                <br>
                                    <div class="text-center">
                                        <label>No Book been set</label>
                                    </div>
                            @endif
                                <div class="center-block" id="loading-image" style="display: none">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif">
                                </div>
                        </div>
                        </center>

                        <hr>
                         <label for="">Mistakes</label>
                        <button class="btn btn-default btn-xs pull-right add_mistake" > Add New</button>
                        <hr>
                        <div class="mistake_list">
                            @if(count($session->mistakes) > 0 )
                                @foreach($session->mistakes()->orderBy('id','DESC')->get() as $mistake)
                                    <div class="mistakes" id="mistake_{{$mistake->id}}">
                                        <span class="wrong"><i class="fa fa-ban"></i> {{ $mistake->mistake_body }}</span><br>
                                        <span class="correct"><i class="fa fa-check"></i> {{ $mistake->correction }}</span>
                                       <small><a href="#" id="{{$mistake->id}}" class="pull-right delete_mistake"><i class="fa fa-trash"></i> Delete</a></small>
                                    </div>
                                @endforeach
                            @else
                        </div>
                            <br>
                        <br>
                            <div class="text-center"> No content yet.. </div>
                        @endif


                    </div>

                  
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('ajax/mistake') }}" id="mistakefrm" method="post">
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

                        <tbody id="attendance-toby"   >
                        </tbody>
                    </table>
                </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
        $(document).ready(function(){
            $('#books_select').select2()

            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor1' );
            CKEDITOR.replace( 'editor2' );


            var url = "{{url('ajax/mistake')}}"
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
                $.ajax({
                    type: "DELETE",
                    url: url + '/' + mistake_id,
                    data: {_method: 'delete', _token :'{{csrf_token()}}'},
                    success: function (data) {
                        $("#mistake_" + mistake_id).fadeOut();
                    },
                    error: function (data) {

                    }
                });
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
                e.preventDefault();
                var url = $(this).attr('href')
                $('#book_preview').hide()
                $('#loading-image').show()
                //alert(url)
                $.get(url, function(data){

                    $('#image-preview').html(data)
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
