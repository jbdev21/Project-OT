@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection

@section('content')
    @if(is_desktop())
        <div class="box padding-sm">
            <class-show modalshow="{{ Request::get('modal') }}" credits="{{ $class->getRemainingCredits() }}" today="{{ Request::get('session') }}" classid="{{ $class->id }}" @if($latest_session) sessionurl="{{video_url($latest_session->classer->id, 'student')}}" @endif></class-show>
        </div>
    @else
        <div class="container">
            <class-show-mobile modalshow="{{ Request::get('modal') }}" credits="{{ $class->getRemainingCredits() }}" today="{{ Request::get('session') }}" classid="{{ $class->id }}" @if($latest_session) sessionurl="{{video_url($latest_session->classer->id, 'student')}}" @endif></class-show-mobile>
        </div>
    @endif
@endsection

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <style type="text/css">
        .fa-star{
            color:#7dba19;
            font-size: 18px;
        }

      
    </style>
@endsection

@section('scripts')
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
    	$(document).ready(function(){
            
            $(document).on('click', '.tr_days', function(){

                $('.tr_days').removeClass('activetr')
                $(this).addClass('activetr')

            })
        });
    </script>
@endsection
