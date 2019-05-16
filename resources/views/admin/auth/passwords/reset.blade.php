<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/gentalella.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/admin_login.css')}}" rel="stylesheet">
</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> @lng("label.email") </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('label.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> @lang("label.repeat_password")</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-default submit">@lang('label.reset_password')</button>
                            <a class="reset_pass" href="{{route('admin.login')}}">@lang('button.cancel')</a>
                        </div>
                          <div class="clearfix"></div>
                        <div class="separator">
                        <div class="clearfix"></div>
                            <br />
                            <div>
                                <a href="{{url('/')}}"><h1><i class="fa fa-paw" style="font-size: 26px;"></i>{{setting('site_title')}}</h1></a>

                                <p>©{{date('Y')}} All Rights Reserved. {{ setting('site_title')}} <br>
                                 </p>
                            </div>
                        </div>
                    </form>
               <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>
