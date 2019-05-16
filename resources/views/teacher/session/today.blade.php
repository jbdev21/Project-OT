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
                Class
            </div>

            <div class="x_content">
                 <label>Today's Class Sessions</label>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Student</th>
                                    <th>Contact Numbers</th>
                                    <th>Type</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Minutes</th>
                                    <th>Session</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($today_sessions as $today_session)
                                    <tr>
                                        <td>
                                            {{$today_session->classer->user->username}}
                                        </td>
                                        <td>
                                            {{$today_session->classer->user->name}} <br> 
                                            <small>{{$today_session->classer->user->korean_name}}</small>
                                        </td>
                                        <td>
                                            {{$today_session->classer->user->contact_number}} <br>
                                            {{$today_session->classer->user->contact_number1}}
                                        </td>
                                        <td>
                                            {{ ucfirst($today_session->classer->type)}}
                                        </td>
                                        <td>
                                            @php
                                                $days = "";
                                                foreach($today_session->classer->day as $day):
                                                    $days .= str_limit($day->day_name, 2, '.');
                                                endforeach;

                                                echo $days;
                                            @endphp
                                        </td>
                                        <td>
                                                {{date('h:iA',strtotime($today_session->date_time))}}
                                        </td>
                                        <td>
                                            {{$today_session->classer->minutes}} <small>min.</small>
                                        </td>
                                        <td>
                                            {{$today_session->classer->total_sessions}}
                                        </td>
                                        <td>
                                            @php 
                                                $first_session = $today_session->classer->getFirstSession();
                                                $last_session = $today_session->classer->getLastSession();
                                                if($first_session)
                                                {
                                                    echo date_formater('date_format', $first_session->date_time). ' / ' . date_formater('date_format', $last_session->date_time);
                                                }	

                                            @endphp
                                        </td>
                                        <td>
                                            @if($today_session->status ==  'absent')
                                                <span style="color:red">
                                            @elseif($today_session->status == 'postponed')
                                                <span style="color:brown">
                                            @elseif($today_session->status ==  'present')
                                                <span style="color:green">
                                            @endif
                                                {{ strtoupper($today_session->status) }}
                                            </span>
                                        </td>
                                        <td>
                                                {{ strlen($today_session->comment)}}
                                        </td>
                                        <td align="right">
                                            <a href="{{route('teacher.session.show', $today_session->id)}}" class="btn btn-xs btn-primary">Details</a>
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

