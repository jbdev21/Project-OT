@extends(theme('layout.app'))

@section('content')
<div class="page-heading" style="background-image:url('{{asset('image/bg/loginbar.jpg')}}'); background-size: cover; height: 230px;">
    <div class="container">
      <h1>@lang('label.log_in_form')</h1>
    </div>  
  </div>
<div class="spacer"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-offset-3">
           <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <label for="username" class="col-form-label text-md-right">@lang('label.username')</label>
                <input id="username" type="text" class="form-control input-lg {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                <br>
                                           
                <label for="password" class="col-form-label text-md-right">@lang('label.password')</label>
                <input id="password" type="password" class="form-control  input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                   
                <br>

                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp;&nbsp; @lang('label.remember_me')
                </label>
                <br>
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong style="color: red;">{{ $errors->first('username') }}</strong>
                    </span>
                @endif

                @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong style="color: red;">{{ $errors->first('password') }}</strong>
                        </span>
                @endif
                <hr>
                 <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">
                           @lang('button.login')
                        </button>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <a type="submit" href="{{route('register')}}" class="btn btn-success btn-block">
                            @lang('button.register')
                        </a>
                    </div>
                 </div>                        
                

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    <small>
                       @lang('label.forget_password')
                    </small>
                </a>
        </form>
                    
              
        </div>
    </div>
    <div class="spacer"></div>
    <div class="spacer"></div>

</div>
@endsection
