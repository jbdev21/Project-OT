@extends(theme('layout.app'))

@section('content')
<div class="page-heading" style="background-image: url('https://sta.uwi.edu/sites/default/files/cits/banner_studentinfo.jpg'); background-position: center;">
    <div class="container">
      <h1>@lang('label.password_reset')</h1>
    </div>  
  </div>
<div class="spacer"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
        <reset-password></reset-password>
            {{-- @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif --}}

            {{-- <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                        <label for="email">@lang('auth.email_address')</label>
                        <input id="email" type="email" class="form-control input-lg " name="email" value="{{ old('email') }}"  required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            <br>
                        @endif
                        <br>
                <button type="submit" class="btn btn-primary">
                            @lang('auth.send_password_reset_link')
                </button>
                
            </form> --}}
        </div>
    </div>
</div>
<Br>
<br>
@endsection

@section('scripts')
    <script src="/js/lang.js"></script>
@endsection
