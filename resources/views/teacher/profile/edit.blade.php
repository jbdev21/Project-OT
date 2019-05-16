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
                Profile
            </div>

            <div class="x_content">
              	<div class="row">
              		<div class="col-sm-6 col-sm-offset-3">
              			<form action="{{route('teacher.profile.update', $user->id)}}" method="post">
	              			{{csrf_field()}}
	              			{{method_field('PUT')}}
	              			<p>
		                    	<label>Username</label>
		                    	<input readonly type="text" class="form-control" name="username" value="{{$user->username}}">
	                    	</p>
	                    	<p>
		                    	<label>Email Address</label>
		                    	<input type="text" class="form-control" name="email" value="{{$user->email}}">
	                    	</p>
	                    	<p>
		                    	<label>Name</label>
		                    	<input type="text" class="form-control" name="name" value="{{$user->name}}">
	                    	</p>
	                    	<p>
		                    	<label>Gender</label>
		                    	<select type="text" class="form-control" name="gender">
		                    		<option value="Male"> Male</option>
		                    		<option value="Female" @if($user->gender =="Female") selected @endif > Female</option>
		                    	</select>
	                    	</p>
	                    	<p>
		                    	<label>Contact Number</label>
		                    	<input type="text" class="form-control" name="contact_number" value="{{$user->contact_number}}">
	                    	</p>
	                    	<br>
	                    	<button class="btn btn-success" type="submit">Save Changes</button>
                    	
                    	</form>
                  	</div>
              	</div> 
			</div>
        </div>
    </div>
   
@endsection

