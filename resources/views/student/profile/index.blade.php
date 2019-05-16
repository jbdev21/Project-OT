@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection

@section('content')
	<div class="box padding-sm">
<h6>@lang('label.profile')</h6>
	<br>

	  <div class="row">
        <div class="col-sm-8 col-sm-offset-1">
        	<form action="{{route('dashboard.profile.update', $user->id)}}" method="post">
        		{{csrf_field()}}
        		{{method_field('PUT')}}

	           <label>한글이름 *</label>
	           <input class="form-control" name="korean_name" type="text" value="{{$user->korean_name}}">
	           <br>

	           <label>@lang('label.english_name') *</label>
	           <input class="form-control" name="name" type="text" value="{{$user->name}}">
	           <br>

	           <label>@lang('label.gender') *</label>
	           <select class="form-control" name="gender">
	           		<option value="male" @if($user->gender == "male") selected @endif> @lang('label.male')</option>
	           		<option value="female" @if($user->gender == "female") selected @endif> @lang('label.female')</option>
	           </select>
	           <br>

	           <label>@lang('label.birth_date') *</label>
	           	<input class="form-control" id="datepicker" name="dob" type="text" value="{{$user->dob}}">
	      		<br>

	            <label>@lang('label.contact_number') *</label>
	           <input class="form-control checkmobile" name="contact_number" type="text" value="{{$user->contact_number}}">
	           <br>

	            <label>@lang('label.contact_number')</label>
	           <input class="form-control checkmobile" name="contact_number1" type="text" value="{{$user->contact_number1}}">
	           <br>

	           <label>@lang('label.email_address') *</label>
	           <input class="form-control" name="email" type="email" value="{{$user->email}}">
	           <br>
	           <button class="btn btn-success" type="submit"> @lang('button.save')</button>
	           <hr>
	           <div class="alert alert-danger">
	           	<h6>@lang('label.delete_account')</h6>
	           	<p>
	           		<small>계정을 삭제하시겠습니까? <br>
							계정삭제시 아이디를 제외한 개인정보는 모두 삭제됩니다.</small>
				</p>
	           	<br>
	           		<button type="button" id="deleteaccount" class="btn btn-danger btn-sm"> 계정삭제</button>
	           	
	           </div>
           </form>
           <form id="deleteaccount-form" action="{{route('dashboard.deleteaccount')}}" method="post" action="">
	           		{{csrf_field()}}
	        </form>
        </div>
    </div>
	</div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-datetimepicker.min.css')}}" />
@endsection
@section('scripts')
	<script src="{{asset('site/js/moment.min.js')}}"></script>
  	<script src="{{asset('site/js/bootstrap-datetimepicker.min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('site/js/jquery.mask.min.js')}}"></script>
    <script>

		$(document).ready(function(){
	        $('#datepicker').datetimepicker({
	            format: 'YYYY/MM/DD'
	        });
			
			$('.checkmobile').mask('(000) 0000000Z', {translation:  {'Z': {pattern: /[0-9]/, optional: true}}});   

	        $('#deleteaccount').click(function(){
	        	if(confirm('Are you sure to delete your Account?'))
	        	{
	        		$('#deleteaccount-form').submit();	
	        	}
			})
	    })

    </script>
@endsection
