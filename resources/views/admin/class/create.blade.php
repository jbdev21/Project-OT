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
               <createclass 
               url="{{route('admin.classer.store')}}" token="{{csrf_token()}}" 
               today="{{ date('Y-m-d') }}"
               label-username = "@lang('label.username')"
               label-teacher = "@lang('label.teacher')"
               label-course = "@lang('label.course')"
               label-minutes = "@lang('label.minutes')"
               label-months = "@lang('label.months')"
               label-selectdays = "@lang('label.select_days')"
               label-daysperweek = "@lang('label.days_per_week')"
               label-startdate = "@lang('label.start_date')"
               label-starttime = "@lang('label.start_time')"
               label-status = "@lang('label.status')"
               label-pending = "@lang('label.pending')"
               label-paid = "@lang('label.paid')"
               > 
               </createclass>
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

            $('#selectstudent').select2({
                 language: {
                    inputTooShort: function () { return "글자 입력시 자동검색" },
                    errorLoading:function(){ return"결과를 불러올 수 없습니다."},
                    loadingMore:function(){ return"불러오는 중…"},
                    noResults:function(){ return"결과가 없습니다."},
                    searching:function(){ return"검색 중…"},
                    removeAllItems:function(){ return"모든 항목 삭제"}
                },
				 ajax: {
					url: '/api/getstudentjson',
					dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                        };
                    },
                    processResults: function (data) {
				        return {
                            results: data
                        };
                    },
                    cache: true
				},
				escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
				minimumInputLength: 1,
			})

            $('#datepicker').datetimepicker({
                format: 'YYYY/MM/DD',
                //minDate: new Date(),
                defaultDate: new Date()
            });
        })


    </script>
@endsection
