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
                <h2>@lang('label.all_course_type')</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            	<div class="row">
            		<div class="col-sm-3">
            			    <form action="{{route('admin.coursetype.update', $coursetype->id)}}" method="post">
					                {{csrf_field()}}
					                {{method_field('PUT')}}
					              		<h4 > @lang('button.edit')</h4>
					              		<hr>
					                    	<label>@lang('label.name')</label>
					                        <input  type="text" value="{{$coursetype->name}}" name="name" class="form-control"  required>
					                        <br>

					                        <label>@lang('label.description')</label>
					                        <textarea class="form-control" style="resize: none;" name="description">{{$coursetype->description}}</textarea>
					                  
					                		<br>
					                        <button type="submit" class="btn btn-default">@lang('button.save_changes')</button>
					                        <a href="{{ route('admin.coursetype.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
					              
					            </form>
            		</div>	
            		<div class="col-sm-9">
            			 
            		</div>	
            		
            	</div>
               
            </div>
        </div>
    </div>

   
@endsection



