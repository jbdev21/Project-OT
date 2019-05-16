<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/24/2017
 * Time: 6:29 PM
 */
?>
@extends('layouts.admin')

@section('content')
    @if(is_desktop())
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <label>@lang('menu.all_class')</label>
                        <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                    </div> 
                <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="table-responsive">
                        {!! $html->table() !!}
                    </div>
                </form>
                
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="iframeModal">
            <div class="modal-dialog modal-super-large"  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">수강관리 <button class="btn btn-default" id="refreshIframe"><i class="fa fa-refresh"></i></button></h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="" id="modalIframe" frameborder="0" width="100%" height="100%"></iframe>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @else
    <label>@lang('menu.all_class')</label>
    <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
     <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <div class="table-responsive">
            {!! $html->table() !!}
        </div>
    </form>
    @endif
@endsection

@section('styles')
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .modal-super-large {
            width: 1280px !important;
            margin: 30px auto;
        }

        #modalIframe{
            height: 80vh;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script> -->
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

             $('#refreshIframe').click(function(){
                var url = document.getElementById('modalIframe').contentDocument.location
                $('#modalIframe').attr('src', url)
            })

            $(document).on('click', '.iframe-modal', function(){
                var url = $(this).data('url')
                $('#modalIframe').attr('src', url)
                $('#iframeModal').modal('show')
                return false
            })
        });
    </script>
@endsection