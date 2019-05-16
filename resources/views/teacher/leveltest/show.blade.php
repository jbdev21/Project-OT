@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12" id="app">
        <div class="x_panel">
            <div class="x_title">
               
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>{{$leveltest->name}}</h2>
                        <table class="table">
                            <tr>
                                <td>Korean:</td>
                                <td><b>{{$leveltest->korean_name}}</b></td>
                            </tr>
                             <tr>
                                <td>Type:</td>
                                <td><b>{{ucfirst($leveltest->type)}}</b></td>
                            </tr>
                           
                        </table>
                          
                    </div>
                    <div class="col-sm-4">
                    <br>
                    <br>
                         <table class="table">
                            <tr>
                                <td>Time:</td>
                                <td><b>{{$leveltest->time}}</b></td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td><b>{{date_formater('date_format', $leveltest->date)}}</b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-4">
                    <br>
                    <br>
                        @if($leveltest->type == "Video")
                            <a href="{{ leveltest_video_url($leveltest->id, 'teacher')}}" class="btn btn-success btn-lg " target="_blank"><i class="fa fa-video-camera"></i> Start LevelTest</a>
                        @endif
                        <a href="{{route('teacher.leveltest.index')}}" class="btn btn-warning btn-lg "><i class="fa fa-ban"></i> Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{ route('teacher.leveltest.addmistake', $leveltest->id) }}" method="post">
                            {{ csrf_field() }}
                            <label for="">Mistake and Correction</label>
                            <input name="mistake" type="text" placeholder="Mistake" class="form-control" required>
                            <br>
                            <input name="correction" type="text" placeholder="Correction" class="form-control" required>
                            <br>
                            <button type="submit" class="btn btn-primary"> Add</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                    <br>
                        @foreach($leveltest->level_test_mistake as $mistake)
                            <div class="well" style="padding:10px; position:relative;">
                                <form id="form-{{$mistake->id}}" style="display:none" action="{{ route('teacher.leveltest.deletemistake', $mistake->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                                <a style="position:absolute; top: 5px; right:10px; color:red; cursor:pointer" onclick="if(confirm('Are you sure to delete?')){  $('#form-{{$mistake->id}}').submit();  }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <span class="text-danger">
                                    {{ $mistake->mistake }}
                                </span>
                                <br>
                                <span class="text-success">
                                    {{ $mistake->correction }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <form action="{{route('teacher.leveltest.update', $leveltest->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="pending" @if($leveltest->status == "pending") selected @endif > Pending</option>
                                            <option value="present" @if($leveltest->status == "present") selected @endif > Present</option>
                                            <option value="absent" @if($leveltest->status == "absent") selected @endif > Absent</option>
                                        </select>
                                    <br>
                                     <label>Book</label>
                                        <select name="book_id" class="form-control">
                                            @foreach($books as $book)
                                                <option @if($leveltest->book_id == $book->id) selected @endif value="{{ $book->id }}"> {{ $book->title }} </option>
                                            @endforeach
                                        </select>
                                    <br>
                                    <br>
                                </div>    
                                <div class="col-sm-6">
                                   <label for="">Self Assesment</label>
                                    <select name="self_assesment" class="form-control">
                                        <option value="LV1/4 Starter" @if($leveltest->self_assesment == "LV1/4 Starter") selected @endif>LV1/4 Starter</option>
                                        <option value="LV2/4 Can Read Word" @if($leveltest->self_assesment == "LV2/4 Can Read Word") selected @endif>LV2/4 Can Read Word</option>
                                        <option value="LV3/4 Can Speak Little" @if($leveltest->self_assesment == "LV3/4 Can Speak Little") selected @endif>LV3/4 Can Speak Little</option>
                                        <option value="LV4/4 Can Communicate" @if($leveltest->self_assesment == "LV4/4 Can Communicate") selected @endif>LV4/4 Can Communicate</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                            
                            <label>Overall Comment </label>
                            <textarea  class="form-control" name="comment" id="editor" style="resize: none" rows="8" required>{!! $leveltest->comment  !!}</textarea>
                            <hr>
                            
                            <label for="input-1" class="control-label">Listening</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    @for($i=10; $i > 0; $i--)
                                        <input @if($leveltest->comprehension <= $i) checked @endif class="star-rating__input" id="star-rating-comprehension-{{$i}}" type="radio" name="comprehension" value="{{$i}}">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-comprehension-{{$i}}" title="{{$i}} out of 10 stars"></label>
                                    @endfor
                                </div>
                            </div>
                            <textarea  class="form-control" name="comprehension_comment" id="editor2" style="resize: none" rows="8" required>{!! $leveltest->comprehension_comment  !!}</textarea>
                            
                            <hr>
                            <label for="input-1" class="control-label">Speaking</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    @for($i=10; $i > 0; $i--)
                                        <input  @if($leveltest->fluency <= $i) checked @endif class="star-rating__input" id="star-rating-fluency-{{$i}}" type="radio" name="fluency" value="{{$i}}">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-fluency-{{$i}}" title="{{$i}} out of 10 stars"></label>
                                    @endfor
                                </div>
                            </div>
                            <textarea  class="form-control" name="fluency_comment" id="editor4" style="resize: none" rows="8" required>{!! $leveltest->fluency_comment  !!}</textarea>
                            
                            <hr>
                            <label for="input-1" class="control-label">Pronounciation</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    @for($i=10; $i > 0; $i--)
                                        <input @if($leveltest->pronounciation <= $i) checked @endif  class="star-rating__input" id="star-rating-pronounciation-{{$i}}" type="radio" name="pronounciation" value="{{$i}}">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-pronounciation-{{$i}}" title="{{$i}} out of 10 stars"></label>
                                    @endfor
                                </div>
                            </div>
                            <textarea  class="form-control" name="pronounciation_comment" id="editor3" style="resize: none" rows="8" required>{!! $leveltest->pronounciation_comment  !!}</textarea>

                            <hr>


                            <label for="input-1" class="control-label">Vocabulary</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    @for($i=10; $i > 0; $i--)
                                        <input  @if($leveltest->vocabulary <= $i) checked @endif class="star-rating__input" id="star-rating-vocabulary-{{$i}}" type="radio" name="vocabulary" value="{{$i}}">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-vocabulary-{{$i}}" title="{{$i}} out of 10 stars"></label>
                                    @endfor
                                </div>
                            </div>
                            <textarea  class="form-control" name="vocabulary_comment" id="editor5" style="resize: none" rows="8" required>{!! $leveltest->vocabulary_comment  !!}</textarea>
                            <hr>

                            <label for="input-1" class="control-label">Grammar</label>
                            <div class="star-rating">
                                <div class="star-rating__wrap">
                                    @for($i=10; $i > 0; $i--)
                                        <input @if($leveltest->grammar <= $i) checked @endif class="star-rating__input" id="star-rating-grammar-{{$i}}" type="radio" name="grammar" value="{{$i}}">
                                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-grammar-{{$i}}" title="{{$i}} out of 10 stars"></label>
                                    @endfor
                                </div>
                            </div>
                            <textarea  class="form-control" name="grammar_comment" id="editor6" style="resize: none" rows="8" required>{!! $leveltest->grammar_comment  !!}</textarea>
                            <br>
                            <br>
                            <button class="btn btn-default"  type="submit"><i class="fa fa-save"></i> Save Changes</button>
                        </form>
                    </div>


                  
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css">
    <style type="text/css">
        .star-rating{
            font-size: 1.5em;
        }
        .star-rating__wrap{
            display: inline-block;
            font-size: 1em;
        }
        .star-rating__wrap:after{
            content: "";
            display: table;
            clear: both;
        }
        .star-rating__ico{
            float: right;
            padding-left: 2px;
            cursor: pointer;
            color: #FFB300;
        }
        .star-rating__ico:last-child{
            padding-left: 0;
        }
        .star-rating__input{
            display: none;
        }
        .star-rating__ico:hover:before,
        .star-rating__ico:hover ~ .star-rating__ico:before,
        .star-rating__input:checked ~ .star-rating__ico:before
        {
            content: "\f005";
        }
    </style>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js"></script>
    <script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script src="https://unpkg.com/lodash@4.16.0"></script>
    <script>
       

        $(document).ready(function(){
            CKEDITOR.replace( 'editor' );
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

    </script>
@endsection
