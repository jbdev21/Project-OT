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
                @lang('label.edit_holiday')

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{route('admin.holiday.update', $holiday->id)}}" method="post" data-parsley-validate class="form-horizontal">
                {{csrf_field()}}
                {{method_field('PUT')}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">@lang('label.holiday_name') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" value="{{ $holiday->holiday_name }}" name="holiday_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.date') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="date" value="{{ $holiday->date }}" class="date-picker form-control col-md-7 col-xs-12" id="myDatepicker2" required="required" type="text">
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('label.description') <small>(@lang('label.optional'))</small>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea rows="6"  name="description" class="date-picker form-control col-md-7 col-xs-12" >
                                {!! $holiday->description !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                             <label><input type="checkbox" name="is_life_time" @if($holiday->is_life_time) checked @endif> @lang('label.life_time_holiday')</label><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> @lang('button.submit')</button>
                            <a href="{{ route('admin.holiday.index') }}" class="btn btn-default"><i class="fa fa-reply-all"></i> @lang('button.back')</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $('#myDatepicker2').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection
