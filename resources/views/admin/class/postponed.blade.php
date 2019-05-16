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
                <label>@lang('menu.postponed_class')</label>
            </div>
            <form action="">
                <div class="row">
                    <div class="col-sm-3">
                            <label>@lang('menu.all_class')</label>
                            <button type="button" class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                    </div> 
                    <div class="col-sm-9 ">
                        <div class="input-group pull-right" style="width:300px">
                            <input type="search"   name='q' placeholder=" search" value="{{ request("q") }}" class="form-control">
                            <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span> Search!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="table-responsive">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <tr>
                                <!-- <td><input type="checkbox" id="checkAll" ></td> -->
                                <td>@lang('label.username')</td>
                                <td>@lang('label.name')</td>
                                <td>@lang('label.contact_number')</td>
                                <td>@lang('label.type')</td>
                                <td>@lang('label.days')</td>
                                <td>@lang('label.time')</td>
                                <td>@lang('label.minutes')</td>
                                <td>@lang('label.total_session')</td>
                                <td>@lang('label.duration')</td>
                                <td>@lang('label.date')</td>
                                <td>@lang('label.teacher')</td>
                                <td></td>
                                <!-- <td></td> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php count($classes);?>
                            @foreach($classes as $class)
                                    
                                    <tr>
                                        <!-- <td>
                                            <input type="checkbox" name="item_checked[]" value="{{$class->id}}">
                                        </td> -->
                                        <td>
                                        @if($class->classer->user)
                                            <a href="{{route('admin.student.show', $class->classer->user->id)}}">
                                                {{$class->classer->user->username}}
                                            </a>
                                        @endif
                                        </td>
                                        <td>
                                            {{$class->classer->user->name}}
                                            <br>
                                            {{$class->classer->user->korean_name}}
                                        </td>
                                        <td>
                                            {{ $class->classer->user->contact_number }}
                                            @if($class->classer->user->contact_number1)
                                                <br>
                                                {{$class->classer->user->contact_number1}}
                                            @endif
                                        </td>
                                        <td>{{$class->classer->type}}</td>
                                        <td>
                                            @foreach($class->classer->day as $day)
                                                @lang('label.'. strtolower(str_limit($day->day_name, 3, ''))) &nbsp;
                                            @endforeach
                                        </td>
                                        <td>{{date(setting('time_format'),strtotime($class->classer->time))}}</td>
                                        <td>{{$class->classer->minutes}}</td>
                                        <td>{{$class->classer->total_sessions}}</td>
                                        <td>
                                            @php 
                                                $first_session = $class->classer->getFirstSession();
                                                $last_session = $class->classer->getLastSession();
                                                echo  date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
                                            @endphp
                                        </td>
                                        <td>
                                        
                                        {{ date_formater('date_format', $class->date_time)  }}
                                        </td>
                                        <td>
                                        @if($class->admin)
                                            {{ $class->classer->admin->name }}
                                        @endif
                                        
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('admin.classer.show', $class->classer->id) }}?session={{$class->id}}">@lang('button.show')</a>
                                        </td>
                                        <!-- <td>
                                        
                                            <a href="{{route('admin.classer.show', $class->classer->id)}}" class="btn btn-primary btn-sm"> 
                                            @lang('button.show') 
                                            @if($class->note)
                                            <i class="fa fa-circle" style="color:red; position: absolute; margin-top: -10px; margin-left: 5px;" ></i>
                                            @endif
                                            </a>
                                        
                                        </td> -->
                                    </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
            {{$classes->links()}}
        </div>
    </div>
    <form method="post" id="assign_form" style="display: none;">
        {{csrf_field()}}
        <input type="hidden" name="teacher_id" id="teacher_id_input">
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.assign_submit', function(){
                var url = '{{url('admin/classer/assign/')}}';
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
