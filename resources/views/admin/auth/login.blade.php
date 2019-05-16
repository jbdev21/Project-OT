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
                    <form action="@if(Request::segment(1) == 'admin')  {{ route('admin.login.post') }} @else {{ route('teacher.login.post') }} @endif" method="post">
                        {{csrf_field()}}
                        <h1>@lang('label.log_in_form')</h1>
                        @include('partials.error')
                        <div>
                            <input name="username" type="text" class="form-control" placeholder="@lang('label.username')" value="{{old('username')}}" required="" />

                        </div>
                        <div>
                            <input name="password" type="password" class="form-control" placeholder="@lang('label.password')" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">@lang('button.login')</button>
                            <a class="reset_pass" href="{{route('admin.password.request')}}">@lang('button.lost_your_password')</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                           
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <a href="{{url('/')}}"><h1><i class="fa fa-paw" style="font-size: 26px;"></i>{{config('app.name')}}</h1></a>

                                <p>©{{date('Y')}} All Rights Reserved. {{ setting('site_title')}} <br>
                                 Sunday2Pm</p>
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