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
               @lang('label.curriculum')
            </div>
            <div class="row">
               <div class="col-sm-12">
                    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                       <a href="{{route('admin.curriculum.create')}}" class="btn btn-default btn-sm pull-right" ><i class="fa fa-plus"></i>@lang('button.new')</a>
                </div>
            </div>
            <br> 
            <div class="x_content">
                <form action="{{route('admin.curriculum.destroy', 0)}}" id="delete_all" method="post">
                     {{csrf_field()}}
                    {{method_field('DELETE')}}
                    {!! $html->table() !!}
                </form>
          
            </div>
        </div>
    </div>

    <!-- Modal -->

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
            });

            $('#delete_all_btn').click(function(){
                if(confirm("@lang('label.are_you_sure_to_delete')")){
                    $('#delete_all').submit();
                }
            })
        });
    </script>
@endsection



