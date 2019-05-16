@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
	<div class="box padding-sm">
<h6>@lang('label.change_password')</h6>
	<br>

	  <div class="row">
    	<div class="col-sm-8 col-sm-offset-1">
    		<form action="{{route('dashboard.profile.savepassword')}}" method="post">
    			{{csrf_field()}}
	    		<label>@lang('label.old_password')</label>
	    		<input type="password" class="form-control border-input" required name="old_password" placeholder=" 이전 비밀번호">
	    		<br>
	    		<label> 신규 비밀번호 (최소 6자리)</label>
	    		 <input type="password" required name="password"  class="form-control border-input" placeholder=" 새로운 비밀번호">
	    		 <br>
	    		 <label>@lang('label.repeat_password')</label>
	    		 <input type="password" required name="password_confirmation"  class="form-control border-input" placeholder=" 비밀번호 확인">
	    		 <br>
	    		 <button class="btn btn-success"> @lang('button.save')</button>
    		 </form>
        </div>
    </div>
	</div>

@endsection


