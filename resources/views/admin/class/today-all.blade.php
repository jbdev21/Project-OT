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
    @endif
    <form action="">
        <div class="row">
            <div class="col-sm-3">
                    <label>@lang('menu.all_class')</label>
                    @if(!Auth::user()->academy)
                        <button type="button" class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
                    @endif
                </div> 
                <div class="col-sm-9 ">
                    <div class="input-group pull-right" style="width:300px">
                        <input type="search"   name='q' placeholder=" search" value="{{ request("q") }}" class="form-control">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">
                        </span> Search!</button>
                        </span>
                    </div>
                    {{-- <input type="text" name='q' placeholder=" search" value="{{ request('q') }}" class="form-control"> --}}
                </div>
                {{-- <div class="col-sm-3">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i> Search</button>
                    @if(request('q'))
                        <a class="btn btn-primary btn-sm" href="{{ route("admin.classer.all") }}"><i class="fa fa-ban"></i> Cancel</a>
                    @endif
                </div> --}}
            </div>
        </div>
    </form>
    <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th><input type="checkbox" id="checkAll" ></th>
                    <th>@lang("label.username")</th>
                    <th>@lang('label.name')</th>
                    <th>@lang('label.contact_number')</th>
                    <th  width="100">@lang('label.type')</th>
                    <th>@lang('label.time')</th>
                    <th>@lang('label.minutes')</th>
                    <th  width="100">@lang('label.day')</th>
                    <th width="100">시작일</th>
                    <th width="100">종료일</th>
                    <th>@lang('label.sessions')</th>
                    <th  width="100">@lang('label.payment_method')</th>
                    <th>@lang('label.teacher')</th>
                    <th>시작일</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($allclasses as $session)
                        <tr>
                            <td><input type="checkbox" name="item_checked[]" value="{{  $session->classer->id }}" ></td>
                            <td>
                             @if($session->classer->user)
                                @if($session->classer->status == "ongoing")  {!! checkDuplication($session->classer->user->id, $session->classer->id) !!} @endif {{ $session->classer->user->username }}
                             @endif
                            </td>
                            <td>
                             @if($session->classer->user)
                                {{ $session->classer->user->name }} <br> {{ $session->classer->user->korean_name }}
                             @endif
                            </td>
                            <td>
                                @if($session->classer->user)
                                    {!! $session->classer->user()->first()->getNumber() !!}
                                @endif
                            </td>
                            <td>{{ $session->classer->type }}</td>
                            <td><b style='color:green'> {{ date('A h:i', strtotime($session->date_time)) }} </b></td>
                            <td>{{ $session->classer->minutes }}</td>
                            <td>
                                @foreach($session->classer->day as $day)
                                    @lang('label.'. strtolower(str_limit($day->day_name, 3, '')))
                                @endforeach
                            </td>
                            <td>
                                @php 
                                $first_session = $session->classer->getFirstSession();
                                if($first_session){
                                    echo date('Y-m-d', strtotime($first_session->date_time));
                                }
                                @endphp
                            </td>
                            <td>
                                @php
                                $last_session = $session->classer->getLastSession();
                                    if($last_session){
                                        echo date('Y-m-d', strtotime($last_session->date_time));
                                    }
                                @endphp
                            </td>
                            <td>
                                @php    
                                $total = count($session->classer->getRemainingSession()) ? count($session->classer->getRemainingSession()) : "<span style='color:red'>". count($session->classer->getRemainingSession()) ."</span>" ;
                                $total .= '/' . $session->classer->total_sessions;
                                echo $total;
                                @endphp
                            </td>
                            <td>
                                @if($session->classer->payment_method == "bank")
                                    <img class='img-responsive' src="/image/icons/bank.png">
                                @else
                                        <img class='img-responsive' src="/image/icons/credit-card.png">           
                                @endif
                                {{number_format($session->classer->payment_price)}} @lang('label.won')
                            </td>
                            <td>
                                @if($session->classer->admin)
                                    {{ $session->classer->admin->name }}
                                @endif
                            </td>
                            <td width="70px">
                                @if($session->classer->status == "pending"){
                                    <b style="color:orange">@lang('label.' . $session->classer->status) </b>
                                @elseif($session->classer->status == "ended")
                                    <b style="color:red">@lang('label.' . $session->classer->status)</b>
                                @else
                                    <b>@lang('label.' . $session->classer->status)</b>
                                @endif
                            </td>
                            <td width="150px">
                                <a href="{{ route('admin.classer.show', $session->classer->id) . '?session='. $session->id }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang('button.more') </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allclasses->appends(['q' => request('q'), 'page' => request('cat')])->links() }}
            {{-- {!! $html->table() !!} --}}
        </div>
    </form>
    @if(is_desktop())
            </div>
        </div>
    @endif

@endsection


@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
@endsection