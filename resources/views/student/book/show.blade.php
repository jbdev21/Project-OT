@extends('layouts.student')

@section('student_side_menu')
	@include('partials.student_side_menu')
@endsection
@section('content')
@if(is_desktop())
	<div class="box padding-sm">
    <a class="btn btn-default btn-xs" href="{{route('dashboard.book.index')}}">@lang('button.back')</a>
    <h6>{{$book->title}}</h6>
	  <div class="row center-block">
        <div class="col-sm-12">
          <div id="image-preview">
             <book-preview bookid="{{ $book->id }}" default_page="{{ Request::get('default') }}"></book-preview>
          </div>
        </div>
    </div>
	</div>
@else
  <div class="container">
    <a class="btn btn-default btn-xs" href="{{route('dashboard.book.index')}}">@lang('button.back')</a>
    <h6 class="mobile-title">{{$book->title}}</h6>
    <div id="image-preview">
        <book-preview-mobile  default_page="{{ Request::get('default') }}" bookid="{{ $book->id }}"></book-preview-mobile>
        <br>
    </div>
  </div>
@endif

@endsection

