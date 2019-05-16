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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <label>@lang('label.today_class_session')</label>
            </div>
            {!! $html->table() !!}
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="iframeModal">
            <div class="modal-dialog modal-super-large"  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">수강관리  <button class="btn btn-default" id="refreshIframe"><i class="fa fa-refresh"></i></button></h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="" id="modalIframe" frameborder="0" width="100%" height="1000"></iframe>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@endsection
@section('styles')
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
     <style>
        .modal-super-large {
            width: 1320px !important;
            margin: 15px auto;
        }

        #modalIframe{
            height: 80vh;
        }
    </style>
@endsection
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script>
    {!! $html->scripts() !!}
    <script type="text/javascript">
        $(document).ready(function(){

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#delete_all_btn').click(function(){
                if(confirm("Are you sure to delete selected items?")){
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