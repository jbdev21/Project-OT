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
                    <th width="100">@lang('label.type')</th>
                    <th>@lang('label.time')</th>
                    <th>@lang('label.minutes')</th>
                    <th width="130">@lang('label.day')</th>
                    <th width="100">시작일</th>
                    <th width="100">종료일</th>
                    <th>@lang('label.sessions')</th>
                    <th  width="100">@lang('label.payment_method')</th>
                    <th>@lang('label.teacher')</th>
                    <th width="80">상태</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($allclasses as $class)
                        <tr>
                            <td><input type="checkbox" name="item_checked[]" value="{{ $class->id }}" ></td>
                            <td>
                             @if($class->user)
                               @if($class->status == "ongoing")  {!! checkDuplication($class->user->id, $class->id) !!} @endif {{ $class->user->username }}
                             @endif
                            </td>
                            <td>
                             @if($class->user)
                                {{ $class->user->name }} <br> {{ $class->user->korean_name }}
                             @endif
                            </td>
                            <td>
                                @if($class->user)
                                    {!! $class->user()->first()->getNumber() !!}
                                @endif
                            </td>
                            <td>{{ $class->type }}</td>
                            <td><b style='color:green'> {{ date('A h:i', strtotime($class->time)) }} </b></td>
                            <td>{{ $class->minutes }}</td>
                            <td>
                                @foreach($class->day as $day)
                                    @lang('label.'. strtolower(str_limit($day->day_name, 3, '')))
                                @endforeach
                            </td>
                            <td>
                                @php 
                                $first_session = $class->getFirstSession();
                                if($first_session){
                                    echo date('Y-m-d', strtotime($first_session->date_time));
                                }
                                @endphp
                            </td>
                            <td>
                                @php
                                $last_session = $class->getLastSession();
                                    if($last_session){
                                        echo date('Y-m-d', strtotime($last_session->date_time));
                                    }
                                @endphp
                            </td>
                            <td>
                                @php    
                                $total = count($class->getRemainingSession()) ? count($class->getRemainingSession()) : "<span style='color:red'>". count($class->getRemainingSession()) ."</span>" ;
                                $total .= '/' . $class->total_sessions;
                                echo $total;
                                @endphp
                            </td>
                            <td>
                                @if($class->payment_method == "bank")
                                    <img class='img-responsive' src="/image/icons/bank.png">
                                @else
                                        <img class='img-responsive' src="/image/icons/credit-card.png">           
                                @endif
                                {{number_format($class->payment_price)}} @lang('label.won')
                            </td>
                            <td>
                                @if($class->admin)
                                    {{ $class->admin->name }}
                                @endif
                            </td>
                            <td>
                               @php echo today_attendance($class->id) @endphp
                            </td>
                            <td width="150px"> 
                                @if($class->user)
                                    @php
                                    $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                                    if($near_session){
                                        $button = "";
                                        if(!Auth::user()->academy){
                                            $button .= '<a href="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                                        }
                                        $button  .= '<button data-url="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'&modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                                        echo $button;
                                    }else{
                                        $button = "";
                                        if(!Auth::user()->academy){
                                            $button .= '<a href="' . route('admin.classer.show', $class->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                                        }
                                        $button  .= '<button  data-url="' . route('admin.classer.show', $class->id) . '?modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                                        echo $button;
                                    }
                                    @endphp
                                @else
                                    <small style="color:red">수업정보가 없습니다</small>
                                @endif
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
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Korean.json"></script> -->

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