@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    @lang('label.adding_new_curriculum')
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                
                <form action="{{route('admin.curriculum.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-7">
                            <label for="title">@lang('label.title')</label>
                            <input type="text" name="name" value="{{old('title')}}" id="title" class="form-control" required>
                            <br>
                            <p>
                                <label for="">Books</label>
                                <br>
                                <select name="books[]" id="select2" class="form-control" multiple='multiple'>
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <br>
                        
                        </div>
                        <div class="col-sm-5">
                            <p>
                                <label for="">Picture</label>
                                <br>
                                <label for="picture" class="btn btn-default btn-xs"><i class="fa fa-file-image-o"></i> Choose Picture</label>
                                <input type="file" accept="image/*" style="display:none;"  name="picture" id="picture">
                                <img id="blah" src="{{asset('image/no-image.png')}}" alt="dummy Image"  class="img-responsive" >
                            </p>
                        </div>
                        
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.save_book')</button>
                        <a href="{{ route('admin.curriculum.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
        $(document).ready(function(){
            $('#select2').select2()

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#picture").change(function(){
                readURL(this);
            });
        })
    </script>
@endsection