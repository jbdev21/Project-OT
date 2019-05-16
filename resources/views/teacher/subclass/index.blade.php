<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.teacher')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                All Sub Classes
            </div>
                {!! $html->table() !!}
      
        </div>
    </div>
@endsection
@section('styles')
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    {!! $html->scripts() !!}
    </script>
@endsection
