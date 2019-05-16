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
                <h2>@lang('label.student')</h2>

                <div class="clearfix"></div>
            </div>
                <div class="x_content">

                    <div class="col-md-3 col-sm-3 col-xs-12">

                        <h3>{{$student->name}}</h3>
                        <h3>{{$student->korean_name}}</h3>
                        <ul class="list-unstyled user_data">

                            <li>
                                <i class="fa fa-envelope user-profile-icon"></i> {{$student->email}}
                            </li>
                            <li>
                                <i class="fa fa-user user-profile-icon"></i> {{strtoupper($student->gender)}}
                            </li>

                            <li>
                                <i class="fa fa-phone user-profile-icon"></i> {{$student->contact_number}}
                            </li>


                        </ul>
                        <a href="{{route('admin.student.edit', $student->id)}}" class="btn btn-default btn-xs"><i class="fa fa-edit m-right-xs"></i>  프로필 수정</a>
                        <hr>


                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>@lang('label.code')</th>
                                    <th>@lang('label.type')</th>
                                    <th>@lang('label.day')</th>
                                    <th>@lang('label.time')</th>
                                    <th>@lang('label.minute')</th>
                                    <th>@lang('label.sessions')</th>
                                    <th>@lang('label.duration')</th>
                                    <th>@lang('label.teacher')</th>
                                    <th>@lang('label.status')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($student->classer()->orderby('id','DESC')->get() as $class)
                                <tr>
                                    <td>{{$class->class_code}}</td>
                                    <td>{{$class->course->coursetype->name}}</td>
                                    <td>@foreach($class->day as $day) {{str_limit($day->day_name, 1, '.')}} @endforeach</td>
                                    <td>{{date('h:i A',strtotime($class->time))}}</td>
                                    <td>{{$class->course->minutes}}<small>mins.</small></td>
                                    <td>
                                        @php
                                            $total = count($class->getRemainingSession()) ? count($class->getRemainingSession()) : "<span style='color:red'>". count($class->getRemainingSession()) ."</span>" ;
                                            $total .= '/' . $class->total_sessions;
                                            echo $total;
                                        @endphp
                                    </td>
                                    <td>{{$class->start_date}} / {{ date('Y-m-d',strtotime($class->getLastSession()->date_time))}}</td>
                                    <td>
                                        @if($class->admin) 
                                            <a href="{{route('admin.teacher.show', $class->admin->id)}}">{{$class->admin->name}}</a> 
                                        @else 
                                            <small style="color:#90111A">(@lang('label.teacher_is_deleted'))</small> 
                                        @endif
                                    </td>
                                    <td>
                                       @lang('label.' . $class->status)
                                    </td>
                                    <td>
                                        <a href="{{route('admin.classer.show', $class->id)}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> @lang('button.show')</a>
                                        <a href="{{route('admin.classer.edit', $class->id)}}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> @lang('button.edit')</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{asset('js/bootstrap-progressbar.min.js')}}"></script>
@endsection
