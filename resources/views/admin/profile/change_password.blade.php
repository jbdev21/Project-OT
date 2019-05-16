<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                @lang('label.change_password')
            </div>

            <div class="x_content">
              	<div class="row">
              		<div class="col-sm-6 col-sm-offset-3">
              			<form action="{{route('admin.profile.savepassword')}}" method="post">
			    			{{csrf_field()}}
				    		<label>@lang('label.old_password')</label>
				    		<input type="password" class="form-control border-input" required name="old_password" placeholder=" 이전 비밀번호">
				    		<br>
				    		<label>@lang('label.new_password')</label>
				    		 <input type="password" required name="password"  class="form-control border-input" placeholder=" 새로운 비밀번호">
				    		 <br>
				    		 <label>@lang('label.repeat_password')</label>
				    		 <input type="password" required name="password_confirmation"  class="form-control border-input" placeholder=" 비밀번호 확인">
				    		 <br>
				    		 <button class="btn btn-success">@lang('button.save')</button>
			    		</form>
                  	</div>
              	</div> 
			</div>
        </div>
    </div>
   
@endsection

