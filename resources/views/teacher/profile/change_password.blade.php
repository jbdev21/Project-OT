<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                Change Password
            </div>

            <div class="x_content">
              	<div class="row">
              		<div class="col-sm-6 col-sm-offset-3">
              			<form action="{{route('teacher.profile.savepassword')}}" method="post">
			    			{{csrf_field()}}
				    		<label>Old Password</label>
				    		<input type="password" class="form-control border-input" required name="old_password" placeholder=" old password">
				    		<br>
				    		<label>New Password</label>
				    		 <input type="password" required name="password"  class="form-control border-input" placeholder=" new password">
				    		 <br>
				    		 <label>Repeat New Password</label>
				    		 <input type="password" required name="password_confirmation"  class="form-control border-input" placeholder=" repeat new password">
				    		 <br>
				    		 <button class="btn btn-success">Save Changes</button>
			    		</form>
                  	</div>
              	</div> 
			</div>
        </div>
    </div>
   
@endsection

