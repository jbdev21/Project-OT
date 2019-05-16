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
                @lang('label.profile')
            </div>

            <div class="x_content">
              	<div class="row">
              		<div class="col-sm-6 col-sm-offset-3">
              			<form action="{{route('admin.profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
	              			{{csrf_field()}}
	              			{{method_field('PUT')}}
	              			<p>
		                    	<label>@lang('label.username')</label>
		                    	<input readonly type="text" class="form-control" name="username" value="{{$user->username}}">
	                    	</p>
	                    	<p>
		                    	<label>@lang('label.email')</label>
		                    	<input type="text" class="form-control" name="email" value="{{$user->email}}">
	                    	</p>
	                    	<p>
		                    	<label>@lang('label.name')</label>
		                    	<input type="text" class="form-control" name="name" value="{{$user->name}}">
	                    	</p>
	                    	<!-- <p>
		                    	<label>@lang('label.gender')</label>
		                    	<select type="text" class="form-control" name="gender">
		                    		<option value="Male"> @lang('label.male')</option>
		                    		<option value="Female" @if($user->gender =="Female") selected @endif > @lang('label.female')</option>
		                    	</select>
	                    	</p> -->
	                    	<p>
		                    	<label>@lang('label.contact_number')</label>
		                    	<input type="text" class="form-control" name="contact_number" value="{{$user->contact_number}}">
	                    	</p>
							<p>
								<br>
								<label for="">@lang('label.profile_image')</label>
                                    <br>
                                    <label class="btn btn-xs btn-default" for="profile_image"><i class="fa fa-file-picture-o"></i> @lang('label.select_image')</label>
                                    <input required style="display:none;"  accept="image/*" type="file" id="profile_image" name="profile_image"><br>
									@if($user->image)
                                    	<img src="{{ asset('profile/'. $user->image) }}" class="img-responsive" alt="" id="profile" height="200px" width="200px">
									@else
                                    	<img src="http://via.placeholder.com/100x100" class="img-responsive" alt="" id="profile" height="200px" width="200px">
									@endif
								
							</p>
	                    	<br>
	                    	<button class="btn btn-success" type="submit">@lang('button.save')</button>
                    	
                    	</form>
                  	</div>
              	</div> 
			</div>
        </div>
    </div>
   
@endsection
@section('scripts')
    
    <script>
        function readURL(input, holder) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + holder).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#background_image").change(function(){
            readURL(this, 'background');
        });

        $("#profile_image").change(function(){
            readURL(this, 'profile');
        });

     

</script>
@endsection

