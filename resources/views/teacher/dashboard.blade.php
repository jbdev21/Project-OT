@extends('layouts.teacher')
@section('content')
  {{-- <div id="loader" class="text-center" style="margin-top: 50px;">
    <img src="{{ asset('public/loaders/admin-loader.gif') }}">
  </div>  --}}
	<div class="row" id="dashboard-body" >
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
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
                    <div class="table-responsive">
                    <hr>

                    <Label>Today's Level Tests</Label>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Mobile</th>
                                <th>Type</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($today_leveltest as $today)
                                <tr>
                                    <td>{{ $today->name }} <br> {{ $today->korean_name }}</td>
                                    <td>{{ $today->mobile }}</td>
                                    <td>{{ ucfirst($today->type) }}</td>
                                    <td>{{ date_formater('time_format', $today->time) }}</td>
                                    <td>@if($today->is_done) <i class='fa fa-check'></i> @endif</td>
                                    <td><a href="{{ route('teacher.leveltest.show', $today->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td align="center">No leveltest for today</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="table-responsive">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#loader').hide()
            $('#dashboard-body').show();      
        });
    </script>
@endsection