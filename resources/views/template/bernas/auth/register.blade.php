@extends(theme('layout.app'))
@section('content')
    <div class="container">
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <div class="row">
                <form action="{{route('register')}}" method="post" id="form">
                    {{csrf_field()}}
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <br>
                    @include('partials.error')
                    @include('partials.message')
                    <div class="box-group">
                        <div class="box">
                            <div class="input-group">
                              <input type="text" data-parsley-trigger="blur" required class="form-control" 
                              data-parsley-trigger="focusout"
                            data-parsley-remote
                            data-parsley-remote-options='{ "type": "POST" }'
                            data-parsley-remote-validator="checkusername"
                            data-parsley-remote-message="사용자 이름이 이미 존재합니다."
                                 placeholder="@lang('label.username')" name="username" value="{{ old('username') }}" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-group">
                              <input id="password" minlength="6" data-parsley-trigger="blur" type="password" required class="form-control" placeholder="비밀번호 (최소6자리 이상 영문,숫자)" name="password" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-group">
                              <input  minlength="6" data-parsley-equalto="#password"  data-parsley-trigger="blur" name="password_confirmation" type="password" required class="form-control" placeholder="@lang('label.repeat_password')" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-group">
                        <div class="box">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12" style="border-right:1px solid #dadada">
                                    <input required value="{{ old('korean_name') }}"  data-parsley-trigger="blur" class="form-control" placeholder=" @lang('label.korean_name')" name="korean_name">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input required value="{{ old('name') }}" data-parsley-trigger="blur" class="form-control" placeholder=" @lang('label.english_name')" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="flex-container register-gender">
                                <div>
                                    <input checked type="radio" @if(old('gender') == "male") checked @endif name="gender" id="male" value="male">
                                    <label for="male"   class="btn btn-default btn-block no-radius">@lang('label.male')</label>
                                </div>
                                <div>
                                    <input type="radio" name="gender" id="female" value="female">
                                    <label for="female" @if(old('gender') == "female") checked @endif class="btn btn-default btn-block no-radius">@lang('label.female')</label>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div style=" font-size: 18px; color:gray; padding-top:6px;">
                                     @lang('label.dob')
                                    </div>  
                                </div>
                                <div class="col-sm-3">
                                    <input required  onchange="updateDOB()" id="year" class="form-control" maxlength="4" value="{{ old('year') }}" name="year" placeholder=" @lang('label.year')">
                                </div>
                                <div class="col-sm-4">
                                    <select required onchange="updateDOB()" class="form-control" id="month" name="month">
                                        <option value=""> @lang('label.month')</option>
                                        <option value="01" @if(old('month') == "01") selected @endif >01</option>
                                        <option value="02" @if(old('month') == "02") selected @endif >02</option>
                                        <option value="03" @if(old('month') == "03") selected @endif >03</option>
                                        <option value="04" @if(old('month') == "04") selected @endif >04</option>
                                        <option value="05" @if(old('month') == "05") selected @endif >05</option>
                                        <option value="06" @if(old('month') == "06") selected @endif >06</option>
                                        <option value="07" @if(old('month') == "07") selected @endif >07</option>
                                        <option value="08" @if(old('month') == "08") selected @endif >08</option>
                                        <option value="09" @if(old('month') == "09") selected @endif >09</option>
                                        <option value="10" @if(old('month') == "10") selected @endif >10</option>
                                        <option value="11" @if(old('month') == "11") selected @endif >11</option>
                                        <option value="12" @if(old('month') == "12") selected @endif >12</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input required id="day" value="{{ old('day') }}" onchange="updateDOB()" type="number" name="day" class="form-control" min="1" max="31" placeholder="@lang('label.day')">
                                </div>
                            </div>
                            <input type="hidden" name="dob" id="dob" value="{{ old('dob') }}" required>
                        </div>
                        <div class="box">
                            <input  data-parsley-trigger="blur" class="form-control" 
                            data-parsley-trigger="focusout"
                            data-parsley-remote
                            data-parsley-remote-options='{ "type": "POST" }'
                            data-parsley-remote-validator="checkemail"
                            data-parsley-remote-message="이메일은(는) 이미 사용 중입니다."
                            placeholder=" @lang('label.recovery_email')(@lang('label.optional'))" type="email" value="{{ old('email') }}" name="email">
                        </div>
                    </div>
                    <div class="box-group">
                        <div class="box">
                            <div class="input-group">
                              <input required  data-parsley-trigger="blur" name="contact_number" type="text"
                                value="{{ old('contact_number') }}"
                               required class="form-control checkmobile" placeholder=" 수강생 연락처" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-group">
                              <input name="contact_number1" type="text"  class="form-control checkmobile" 
                                value="{{ old('contact_number1') }}"
                              placeholder="학부모 연락처" aria-describedby="basic-addon1">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success sign-up-btn btn-lg btn-block no-radius"><i class="fa fa-check"></i> @lang('button.sign_up')</button>
                    <p class="text-center">
                        <br>
                        <a href="{{url('/')}}"><i class="fa fa-reply-all"></i> @lang('button.cancel')</a>
                    </p>
                    <hr>
                    <div class="text-center" style="color:white">
                        Ontalk Copyright &copy; <b>Ontalk Company</b>. Alright reserved {{date('Y')}}. 
                    </div>
                    <hr>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
    @section('styles')
     <link href="{{asset('css/register.css')}}" rel="stylesheet">
    <style type="text/css">
        body{
            background-image: url('{{asset('image/reg-bg.jpg')}}');
        }
    </style>
    
@endsection
  @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
    @if(config('app.locale') == "ko")
    <script src="{{asset('js/i18n/ko.js')}}"></script>
    @endif
    
    <script type="text/javascript" src="{{asset('site/js/jquery.mask.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#form').parsley();
            $('.checkmobile').mask('000 0000 000Z', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});  
        })

         function updateDOB()
         {
            var dob;
            dob = $('#year').val() + '-' + $('#month').val() + '-' + $('#day').val()
            $('#dob').val(dob)
         }

        window.Parsley.addAsyncValidator('checkusername', function (xhr) {
            return xhr.responseJSON == 200
         }, '{{route('api.checkusername')}}');

        /*
        window.Parsley.addAsyncValidator('checkmobile', function (xhr) {
            return xhr.responseJSON == 200
         }, '{{route('api.checkcontact_number')}}');

        window.Parsley.addAsyncValidator('checkmobile1', function (xhr) {
            return xhr.responseJSON == 200
         }, '{{route('api.checkcontact_number1')}}');
         */

        window.Parsley.addAsyncValidator('checkemail', function (xhr) {
            return xhr.responseJSON == 200
         }, '{{route('api.checkemail')}}');
    </script>
@endsection


