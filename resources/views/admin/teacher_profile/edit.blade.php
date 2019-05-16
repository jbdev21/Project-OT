@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                @lang('menu.teacher_profile')
            </div>
            <div class="row">
                <form action="{{ route('admin.teacherprofile.update', $profile->id) }}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row">
                            <div class="col-sm-7">
                                <p>
                                    <label for="">@lang('label.teacher')</label>
                                    <select name="admin_id" id="select2" class="form-control">
                                        @foreach($teachers as $teacher)
                                            <option @if(hasTeacherProfile($teacher->id)) disabled @endif  @if($teacher->id == $profile->admin_id) selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                <p>
                                    <label for=""><input type="checkbox" @if($profile->is_show) checked @endif name="is_show"> @lang('label.show')</label>
                                </p>
                                <p>
                                    <label for="">내용 1 (출신학교, 특징 등)</label>
                                    <textarea name="overview" id="" cols="30" class="form-control" rows="5">{{$profile->overview}}</textarea>
                                </p>
                                <p>
                                    <label for="">내용 2 (강사소개, 스크립트 등)</label>
                                    <textarea name="message" id="my-editor" cols="30" rows="10">
                                        {!! $profile->message !!}
                                    </textarea>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <p>
                                    <label for="">@lang('label.profile_image')</label>
                                    <br>
                                    <label class="btn btn-xs btn-success" for="profile_image"><i class="fa fa-file-picture-o"></i> @lang('label.select_image')</label>
                                    <input  style="display:none;"  accept="image/*" type="file" id="profile_image" name="profile_image"><br>
                                    @if($profile->profile_image)
                                        <img src="{{ asset('profile/'. $profile->profile_image) }}" class="img-responsive" alt="" id="profile" height="200px" width="200px">
                                    @else
                                        <img src="http://via.placeholder.com/100x100" class="img-responsive" alt="" id="profile" height="200px" width="200px">
                                    @endif
                                </p>
                                <hr>
                                <p>
                                    <label for="">@lang('label.background_image')</label>
                                    <br>
                                    <label class="btn btn-xs btn-success" for="background_image"><i class="fa fa-file-picture-o"></i> @lang('label.select_image')</label>
                                    <br>
                                    <input  style="display:none;"  accept="image/*" type="file" id="background_image" name="background_image">
                                    @if(is_desktop())
                                        @if($profile->background_image)
                                            <img src="{{ asset('background/'. $profile->background_image) }}"  style="width:400px; height:200px;"  alt="" id="background">
                                        @else
                                            <img src="http://via.placeholder.com/400x200"  style="width:400px; height:200px;"  alt="" id="background">
                                        @endif
                                    @else
                                        @if($profile->background_image)
                                            <img src="{{ asset('background/'. $profile->background_image) }}"  class="img-responsive"  alt="" id="background">
                                        @else
                                            <img src="http://via.placeholder.com/400x200"  class="img-responsive"  alt="" id="background">
                                        @endif
                                    @endif
                                </p>
                                <hr>
                                <p>
                                    <label for="">오디오 파일(mp3)</label>
                                    <br>
                                    <div>
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">Upload</a></li>
                                            <li role="presentation"><a href="#url" aria-controls="url" role="tab" data-toggle="tab">URL</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="upload">
                                                <br>
                                                <input accept="audio/*"  type="file" id="audio_file" name="audio_file">
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="url">
                                                <br>
                                                <input type="text" class="form-control" value="{{ $profile->audio_file }}" placeholder=" Audio file URL" name="audio_url">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </p>
                                <br>
                                <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.submit')</button>
                                <a href="{{ route('admin.teacherprofile.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.cancel')</a>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection    


@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/tinymce-lang/ko_kr.js')}}"></script>
    
    <script>
        function readURL(input, holder) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + holder).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#background_image").change(function(){
            readURL(this, 'background');
        });

        $("#profile_image").change(function(){
            readURL(this, 'profile');
        });

</script>
@endsection

@section('editor')
  @include('partials.full-editor')
@endsection
