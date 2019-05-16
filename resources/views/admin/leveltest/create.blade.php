<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/13/2017
 * Time: 11:32 AM
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
           <div class="x_title">
                <h2>Adding New Course</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            	<div class="row">
            		<div class="col-sm-8 col-sm-offset-2">
				<form action="{{route('admin.course.store')}}" method="post">
                    {{csrf_field()}}
                    			<hr>
                                <label>Type</label>
                                <select class="form-control" required name="coursetype_id">
                                    @if(count($coursetypes)> 0)
                                    	@foreach($coursetypes as $coursetype)
                                        	<option value="{{$coursetype->id}}">{{$coursetype->name}}</option>
                                        @endforeach
                                    @else
                                        <option value=""> No Course Type</option>
                                    @endif

                                </select>

                            <br>

                                <label>Sessions/Week</label>
                                <input type="number" name="days_in_week" id="days_in_week" class="form-control" min="1" max="7" required>

                            <br>
                            <br>

                            <label>AllowedClass Days</label>
                                <br>
                                @foreach($days as $day)
                                <label>
                                <input  type="checkbox" name="days[]" value="{{$day->id}}"> {{$day->day_name}}</label> &nbsp;&nbsp;
                                @endforeach
                            <br>
                        <br>

                                <label>Minutes</label>
                                <input type="number" name="minutes" class="form-control" min="5" max="60" step="5" required>

                            <br>

                                <label>Months</label>
                                <input type="number" name="months" class="form-control" min="1" required>

                            <br>

                                <label>Postponed Credit</label>
                                <input type="number" name="postponed_credit" class="form-control" min="1">

                            <br>

                                <label>Price</label>
                                <input type="number" name="price" class="form-control" min="1" required>

                                <hr>

                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('admin.course.index')}}" class="btn btn-default" data-dismiss="modal">Cancel</a>
              
                </form>
            </div>
        </div>
    </div>
@endsection
