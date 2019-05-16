<?php
/**
 * User: JOFIE BERNAS
 * Date: 1/4/2018
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
               <label>Create New Class</label>
            </div>
            <div class="x_content">
               	<div class="row">
               		<div class="col-sm-9">
               			<form action="{{route('admin.student.store')}}" method="post" data-parsley-validate class="form-horizontal">
	               			<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Lang::get('label.username')<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control select">
		                            	@foreach($students as $student)
		                            		<option value="{{$student->id}}">{{$student->username}}: {{$student->korean_name}}</option>
		                            	@endforeach
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Teacher <span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control select">
		                            	@foreach($teachers as $teacher)
		                            		<option value="{{$teacher->id}}">{{$teacher->name}}</option>
		                            	@endforeach
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Course Type<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control" id="username">
		                            	@foreach($course_types as $course_type)
		                            		<option value="{{$course_type->id}}">
		                            			{{$course_type->name}}</option>
		                            	@endforeach
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Minutes<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control">
		                            	<option>-select-</option>
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Days Per Week<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                            <select class="form-control">
		                            	<option>-select-</option>
		                            </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Months<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                        	<br>
		                        	  <label><input type="radio" name="month"> &nbsp;1mos : 1304</label> <br>
			                          <label><input type="radio" name="month"> &nbsp;3mos : 1304</label> <br>
			                          <label><input type="radio" name="month"> &nbsp;6mos : 1304</label> <br>
			                          <label><input type="radio" name="month"> 12mos : 1304</label> <br>
		                        </div>
	                    	</div>

	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Select Days<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          	<br>
		                          	<label><input type="checkbox" class="single-checkbox" name="days[]"> Mon </label>&nbsp;&nbsp;
		                          	<label><input type="checkbox" class="single-checkbox" name="days[]"> Tue </label> &nbsp;&nbsp;
		                          	<label><input type="checkbox" class="single-checkbox" name="days[]"> Wed </label> &nbsp;&nbsp;
		                          	<label><input type="checkbox" class="single-checkbox" name="days[]"> Thu </label> &nbsp;&nbsp;
		                          	<label><input type="checkbox" class="single-checkbox" name="days[]"> Fri </label> &nbsp;
		                        </div>
	                    	</div>

	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Start Date<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                         	<div class='input-group date' id='datepicker'>
			                          <input type='text' name="start_date" class="form-control" />
			                          <span class="input-group-addon">
			                             <span class="fa fa-calendar"></span>
			                          </span>
			                        </div>
		                        </div>
	                    	</div>

	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Start Date<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                         	<select type='text' name="time" class="form-control input-lg" id="select2">
				                          <optgroup label="Morning Class"></optgroup>
				                          <option value="7:30AM">7:30 AM</option>
				                          <option value="8:00AM">8:00 AM</option>
				                          <option value="8:10AM">8:10 AM</option>
				                          <option value="8:20AM">8:20 AM</option>
				                          <option value="8:30AM">8:30 AM</option>
				                          <option value="8:40AM">8:40 AM</option>
				                          <option value="8:50AM">8:50 AM</option>
				                          <option value="9:00AM">9:00 AM</option>
				                          <option value="9:10AM">9:10 AM</option>
				                          <option value="9:20AM">9:20 AM</option>
				                          <option value="9:30AM">9:30 AM</option>
				                          <option value="9:40AM">9:40 AM</option>
				                          <option value="9:50AM">9:50 AM</option>
				                          <option value="10:00AM">10:00 AM</option>
				                          <option value="10:10AM">10:10 AM</option>
				                          <option value="10:20AM">10:20 AM</option>
				                          <option value="10:30AM">10:30 AM</option>
				                          <option value="10:40AM">10:40 AM</option>
				                          <option value="10:50AM">10:50 AM</option>
				                          <option value="11:00AM">11:00 AM</option>
				                          <option value="11:10AM">11:10 AM</option>
				                          <option value="11:20AM">11:20 AM</option>
				                          <option value="11:30AM">11:30 AM</option>
				                          <option value="11:40AM">11:40 AM</option>
				                          <option value="11:50AM">11:50 AM</option>
				                          <option value="12:00AM">12:00 AM</option>
				                          <optgroup label="Afternoon Class"></optgroup>
				                          <option value="12:10PM">12:10 PM</option>
				                          <option value="12:20PM">12:20 PM</option>
				                          <option value="12:30PM">12:30 PM</option>
				                          <option value="12:40PM">12:40 PM</option>
				                          <option value="12:50PM">12:50 PM</option>
				                          <option value="01:00PM">01:00 PM</option>
				                          <option value="01:10PM">01:10 PM</option>
				                          <option value="01:20PM">01:20 PM</option>
				                          <option value="01:30PM">01:30 PM</option>
				                          <option value="01:40PM">01:40 PM</option>
				                          <option value="01:50PM">01:50 PM</option>
				                          <option value="02:00PM">02:00 PM</option>
				                          <option value="02:10PM">02:10 PM</option>
				                          <option value="02:20PM">02:20 PM</option>
				                          <option value="02:30PM">02:30 PM</option>
				                          <option value="02:40PM">02:40 PM</option>
				                          <option value="02:50PM">02:50 PM</option>
				                          <option value="03:00PM">03:00 PM</option>
				                          <option value="03:10PM">03:10 PM</option>
				                          <option value="03:20PM">03:20 PM</option>
				                          <option value="03:30PM">03:30 PM</option>
				                          <option value="03:40PM">03:40 PM</option>
				                          <option value="03:50PM">03:50 PM</option>
				                          <option value="04:00PM">04:00 PM</option>
				                          <option value="04:10PM">04:10 PM</option>
				                          <option value="04:20PM">04:20 PM</option>
				                          <option value="04:30PM">04:30 PM</option>
				                          <option value="04:40PM">04:40 PM</option>
				                          <option value="04:50PM">04:50 PM</option>
				                          <option value="05:00PM">05:00 PM</option>
				                          <optgroup label="Night Class"></optgroup>
				                          <option value="06:00PM">06:00 PM</option>
				                          <option value="06:10PM">06:10 PM</option>
				                          <option value="06:20PM">06:20 PM</option>
				                          <option value="06:30PM">06:30 PM</option>
				                          <option value="06:40PM">06:40 PM</option>
				                          <option value="06:50PM">06:50 PM</option>
				                          <option value="07:00PM">07:00 PM</option>
				                          <option value="07:10PM">07:10 PM</option>
				                          <option value="07:20PM">07:20 PM</option>
				                          <option value="07:30PM">07:30 PM</option>
				                          <option value="07:40PM">07:40 PM</option>
				                          <option value="07:50PM">07:50 PM</option>
				                          <option value="08:00PM">08:00 PM</option>
				                          <option value="08:10PM">08:10 PM</option>
				                          <option value="08:20PM">08:20 PM</option>
				                          <option value="08:30PM">08:30 PM</option>
				                          <option value="08:40PM">08:40 PM</option>
				                          <option value="08:50PM">08:50 PM</option>
				                          <option value="09:00PM">09:00 PM</option>
				                          <option value="09:10PM">09:10 PM</option>
				                          <option value="09:20PM">09:20 PM</option>
				                          <option value="09:30PM">09:30 PM</option>
				                          <option value="09:40PM">09:40 PM</option>
				                          <option value="09:50PM">09:50 PM</option>
				                          <option value="10:00PM">10:00 PM</option>
				                          <option value="10:10PM">10:10 PM</option>
				                          <option value="10:20PM">10:20 PM</option>
				                          <option value="10:30PM">10:30 PM</option>
				                          <option value="10:40PM">10:40 PM</option>
				                          <option value="10:50PM">10:50 PM</option>
				                          <option value="11:00PM">11:00 PM</option>
				                      </select>
		                        </div>
	                    	</div>
	                    	<div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Status<span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                         		<br>
		                          	<label><input type="radio" name="status"> Pending </label>&nbsp;
		                          	<label><input type="radio" name="status"> Paid </label> &nbsp;
		                        </div>
	                    	</div>
                    	</form>
               		</div>
               		<div class="col-sm-3"></div>
               	</div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-datetimepicker.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
@endsection
@section('scripts')
	<script src="{{asset('site/js/moment.min.js')}}"></script>
    <script src="{{asset('site/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
        $('#select2').select2();
        $('.select').select2();

        $('#datepicker').datetimepicker({
            format: 'YYYY/MM/DD',
            minDate: new Date(),
            defaultDate: new Date()
        });



            $(".single-checkbox").click(function() {
                var limit = 2
                var bol = $(".single-checkbox:checked").length >= limit;
                $(".single-checkbox").not(":checked").attr("disabled",bol);

            });
        })


    </script>
@endsection
