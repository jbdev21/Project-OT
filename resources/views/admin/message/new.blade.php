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
                <label>New Proofreading</label>
            </div>
            <div class="row">
              
            </div>
            <form action="{{route('admin.proofreading.destroy', 0)}}" id="delete_all" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
               <table class="table table-stripped table-hover">
                   <thead>
                    <tr>
                      	<td>Student</td>
                        <td>Message</td>
                       	<td>Teacher</td>
                        <td></td>
                    </tr>
                   </thead>
                   <tbody>
                   <?php count($proofreadings);?>
                       @foreach($proofreadings as $proofreading)
                       		<tr>
                               	<td>
                                    <a href="{{route('admin.proofreading.show', $proofreading->user->id)}}">
                                    	{{$proofreading->user->username}}
                                    </a>
                                    <br>
                                    {{$proofreading->user->korean_name}}
                                </td>
                                <td>{!! str_limit($proofreading->message) !!}</td>
                                <td>
                                	<select class="form-control input-sm" name="admin_id" id="teacher_id_{{$proofreading->id}}" required>
                                		<option value=""> - select teacher -</option>
                                		@foreach($teachers as $teacher)
                                			<option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                 		@endforeach
                                	</select>
                                </td>
                                <td>
                                    <button type="button" id="{{$proofreading->id}}" class="btn btn-success btn-sm assign_submit" > Assign</button>
                                    <a href="{{route('admin.proofreading.show', $proofreading->id)}}" class="btn btn-primary btn-sm"> View</a>
                                   
                            </tr>
                        
                       @endforeach
                   </tbody>
               </table>
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
