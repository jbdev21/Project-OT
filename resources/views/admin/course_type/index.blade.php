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
            			    <form action="{{route('admin.coursetype.store')}}" method="post">
					                {{csrf_field()}}
					              		<h4 > @lang('label.new')</h4>
					              		<hr>
					                    	<label>@lang('label.name')</label>
					                        <input type="text" value="{{old('name')}}" name="name" class="form-control"  required>
					                        <br>

					                        <label>@lang('label.description')</label>
					                        <textarea  style="resize: none;" class="form-control" name="description">{{old('description')}}</textarea>
					                  
					                		<br>
					                        <button type="submit" class="btn btn-primary">@lang('button.save')</button>
					              
					            </form>
            		</div>	
            		<div class="col-sm-9 table-responsive">
            			 <table class="table table-stripped">
			                    <thead>
			                    <tr>
			                        <th>@lang('label.name')</th>
			                        <th>@lang('label.description')</th>
			                        <th></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    @if(count($coursetypes) > 0)
		                        @foreach($coursetypes as $coursetype)
		                            <tr>
		                                <td>{{$coursetype->name}}</td>
		                                <td width="50%">{{$coursetype->description}}</td>
		                                <td align="right">
		                                    <a href="{{route('admin.coursetype.edit', $coursetype->id)}}" class="btn btn-default btn-xs"> <i class="fa fa-pencil"></i> @lang('button.edit')</a>

		                                    <form id="delete_{{$coursetype->id}}" method="post" style="display: none;" action="{{route('admin.coursetype.destroy', $coursetype->id)}}">
			            						{{method_field('DELETE')}}
			            						{{csrf_field()}}
			            					</form>
			            					<a class="btn btn-xs btn-danger"
			            					onclick="event.preventDefault(); if(confirm('@lang('label.are_you_sure_to_delete')')){
			            							$('#delete_{{$coursetype->id}}').submit();
			            						}
			            					"
			            					><i class="fa fa-trash"></i> @lang('button.delete')</a>
		                                </td>
		                            </tr>
		                        @endforeach
		                    @else
		                        <tr>
		                            <td colspan="3" align="center"> @lang('label.no_course_type')</td>
		                        </tr>
		                    @endif
		                    </tbody>
		                </table>
            		</div>	
            		
            	</div>
               
            </div>
        </div>
    </div>

   
@endsection



