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
               <label>@lang('menu.create_class')</label>
            </div>
            <div class="x_content">
            	<br>
               <createcoupon 
                url="{{route('admin.coupon.store')}}" token="{{csrf_token()}}"
                label-course = "@lang('label.course')"
                label-minutes = "@lang('label.minutes')"
                label-months = "@lang('label.months')"
                label-selectdays = "@lang('label.select_days')"
                label-daysperweek = "@lang('label.days_per_week')"
               > 
               </createcoupon>
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
                //minDate: new Date(),
                defaultDate: new Date()
            });
        })


    </script>
@endsection
