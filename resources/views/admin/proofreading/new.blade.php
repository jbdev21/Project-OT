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
                <label>@lang('label.new_proofreading')</label>
                 <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
            </div>
            <div class="row">

            </div>
            <form action="{{route('admin.proofreading.destroy', 0)}}" id="delete_all" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            <div class="table-responsive">
               <table class="table table-stripped table-hover">
                   <thead>
                    <tr>
                        <td><input type="checkbox" id="checkAll" ></td>
                      	<td>@lang('label.student')</td>
                        <td>@lang('label.message')</td>
                        <td>@lang('label.date')</td>
                       	<td>@lang('label.teacher')</td>
                        <td></td>
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($proofreadings);?>
                       @foreach($proofreadings as $proofreading)
                       		<tr>
                                <td><input type="checkbox" name="item_checked[]" value="{{ $proofreading->id }}"></td>
                               	<td>
                                    <a href="{{route('admin.proofreading.show', $proofreading->user->id)}}">
                                    	{{$proofreading->user->username}}
                                    </a>
                                    <br>
                                    {{$proofreading->user->korean_name}}
                                </td>
                                <td>{!! str_limit(strip_tags($proofreading->message)) !!}</td>
                                <td>{!! date_formater('date_time_format', $proofreading->created_at) !!}</td>
                                <td>
                                	<select class="form-control input-sm" style="min-width:100px" name="admin_id" id="teacher_id_{{$proofreading->id}}" required>
                                		<option value=""> - @lang('label.select_teacher') -</option>
                                		@foreach($teachers as $teacher)
                                			<option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                 		@endforeach
                                	</select>
                                </td>
                                <td>
                                    <button type="button" id="{{$proofreading->id}}" class="btn btn-success btn-sm assign_submit" > @lang('button.assign')</button>
                                    <a href="{{route('admin.proofreading.show', $proofreading->id)}}" class="btn btn-primary btn-sm"> @lang('button.view')</a>

                            </tr>
                        
                       @endforeach
                   </tbody>
               </table>
            </div>
            </form>
                {{$proofreadings->links()}}

        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="admin_id" id="teacher_id_input">
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.assign_submit', function(){
                var url = '{{url('admin/proofreading/')}}';
                var id = $(this).attr('id')
                var selected_teacher_id = $('#teacher_id_' + id + ' option:selected').val();
                //alert(selected_teacher_id)
                var id = $(this).attr('id')
                $('#teacher_id_input').val(selected_teacher_id)
                $('#assign_form').attr('action', url + '/' + id)
                $('#assign_form').submit();   
            });

            $("#checkAll").click(function(){
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });

            $('#delete_all_btn').click(function(){
                if(confirm("Are you sure to delete selected items?")){
                    $('#delete_all').submit();
                }
            })
        })
    </script>
@endsection
