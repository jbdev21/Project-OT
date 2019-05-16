<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('site_title', 'LMS') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
                    <form method="POST" action="{{ route('password.email') }}">
                         {{csrf_field()}}
                        <h1>@lang('auth.reset_password')</h1>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif  
                        @include('partials.error')

                            <div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="@lang('label.email')">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                         <div>
                            <button type="submit" class="btn btn-default submit">@lang('auth.send_password_reset_link')</button>
                            <a class="reset_pass" href="{{route('admin.login')}}">@lang('button.cancel')</a>
                        </div>
                         <div class="clearfix"></div>
                        <div class="separator">
                        <div class="clearfix"></div>
                            <br />
                             <div>
                                <a href="{{url('/')}}"><h1><i class="fa fa-paw" style="font-size: 26px;"></i>{{config('app.name')}}</h1></a>

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