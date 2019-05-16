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
            @lang('label.all_teacher')
            </div>
            <div class="row">
               <div class="col-sm-1">
                    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                </div>
                        
            </div> 
            <div class="x_content">
                <br>
                <form action="{{route('admin.teacher.destroy', 0)}}" id="delete_all" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
            	{!! $html->table() !!}
            </div>
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
    <script type="text/javascript">
        $(document).ready(function(){

           $(document).on('click','#checkAll', function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });;

            $('#delete_all_btn').click(function(){
                if(confirm("@lang('label.are_you_sure_to_delete')")){
                    $('#delete_all').submit();
                }
            })

        });
    </script>

@endsection