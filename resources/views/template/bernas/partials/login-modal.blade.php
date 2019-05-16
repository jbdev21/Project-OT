<!-- Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h2 class="text-center">Login</h2>
         <form method="POST" action="{{ route('login') }}" id="login">
                {{ csrf_field() }}
                <div class="alert alert-danger" style="display: none" id="login-message"></div>
                <label for="username" class="col-form-label text-md-right">@lang('label.username')</label>
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <br>
                                           
                <label for="password" class="col-form-label text-md-right">@lang('label.password')</label>
                <input id="password" type="password" placeholder="비밀번호 (최소6자리 이상 영문,숫자)" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <br>

                <label>
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp;&nbsp; @lang('label.remember_me')
                </label>
                <hr>
                 <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">
                            @lang('button.login')
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a type="submit" href="{{route('register')}}"  class="btn btn-success btn-block">
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
  </div>
</div>