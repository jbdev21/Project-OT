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
                @lang('label.adding_new_course')

            </div>
            <div class="x_content">
            	<div class="row">
            		<div class="col-sm-8 col-sm-offset-2">
    				<form action="{{route('admin.course.store')}}" method="post">
                        {{csrf_field()}}
                        <br>
                                    <label>@lang('label.type')</label>
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

                                    <label>@lang('label.session_week')</label>
                                    <input type="number" name="days_in_week" id="days_in_week" class="form-control" min="1" max="7" required>

                                <br>
                                <br>
                                <label>@lang('label.allowed_class_days')</label>
                                    <br>
                                    @foreach($days as $day)
                                    <label>
                                    <input  type="checkbox" name="days[]" value="{{$day->id}}"> {{$day->day_name}}</label> &nbsp;&nbsp;
                                    @endforeach
                                <br>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                     <label>@lang('label.minute')</label>
                                    <input type="number" name="minutes" class="form-control" min="0" max="60" step="5" required>
                                </div>
                                <div class="col-sm-6">
                                    <label>@lang('label.postponed_credits')</label>
                                    <input type="number" name="postponed_credit" value="999" class="form-control" min="1">
                                </div>
                               
                            </div>
                            <br>
                         
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>1 @lang('label.month')</label> 
                                    <input type="number"  name="price" id="price" class="form-control" min="1" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>3 @lang('label.month') (%)</label> 
                                    <input  type="number" name="three_percent" value="0" min="0" step="5" max="100" class="form-control inputs" min="1" required>
                                </div>
                                <div class="col-sm-2">
                                    <label>@lang('label.price')</label> 
                                    <input  type="number" name="three_price" class="form-control inputs" min="1" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>6 @lang('label.month') (%)</label> 
                                    <input  type="number" name="six_percent" value="0"  min="0" step="5" max="100" class="form-control inputs" min="1" required>
                                </div>
                                <div class="col-sm-2">
                                    <label>@lang('label.price')</label> 
                                    <input  type="number" name="six_price" class="form-control inputs" min="1" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>12 @lang('label.month') (%)</label> 
                                    <input  type="number" name="twelve_percent" value="0"  min="0" step="5" max="100" class="form-control inputs" min="1" required>
                                </div>
                                <div class="col-sm-2">
                                    <label>@lang('label.price')</label> 
                                    <input  type="number" name="twelve_price" class="form-control inputs" min="1" required>
                                </div>
                            </div>
                            <br>
                            <small>※ 할인표시를 없애려면 0 을 입력하세요.</small><br><br>
                            <label><input  type="checkbox" name="available" checked> @lang('label.available')</label>
                            <hr>

                      
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.submit')</button>
                        <a href="{{route('admin.course.index')}}" class="btn btn-default" ><i class="fa fa-reply-all"></i>  @lang('button.cancel')</a>
                  
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var price = "";
            $('.inputs').attr('disabled', 'disabled')

            $('#price').bind("keyup change", function(){
                var price_local = $(this).val()
                price = price_local
                if(price > 0){
                    $('.inputs').removeAttr('disabled')
                }else{
                    $('.inputs').attr('disabled', 'disabled')
                    $('.inputs').val("")
                }
            })

            $('input[name=three_percent]').bind("keyup change", function(){
                var three_percenter = $(this).val();
                var its_value;
                if(three_percenter > 0){
                    var multiplied_price = parseInt(price) * 3;
                    its_value = (multiplied_price / 100) * parseFloat(three_percenter);
                    its_value = multiplied_price - its_value;
                }else{
                    its_value = multiplied_price;
                }

                $('input[name=three_price]').val(its_value)
            });

            $('input[name=six_percent]').bind("keyup change", function(){
                var six_percenter = $(this).val();
                var its_value;

                if(six_percenter > 0){
                    var multiplied_price = parseInt(price) * 6;
                    its_value = (multiplied_price / 100) * parseFloat(six_percenter);
                    its_value = multiplied_price - its_value;
                }else{
                    its_value = multiplied_price;
                }
                
                $('input[name=six_price]').val(its_value)
            });

            $('input[name=twelve_percent]').bind("keyup change", function(){
                var twelve_percent = $(this).val();
                var its_value;
                if(twelve_percent > 0){
                    var multiplied_price = parseInt(price) * 12
                    its_value = (multiplied_price / 100) * parseFloat(twelve_percent);
                    its_value = multiplied_price - its_value;
                }else{
                    its_value = multiplied_price;
                }
                
                $('input[name=twelve_price]').val(its_value)
            });

        })
    </script>
@endsection
