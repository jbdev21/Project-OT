@extends('layouts.admin')

@section('content')
 <div id="loader" class="text-center" style="margin-top: 50px;">
    <img src="{{ asset('public/loaders/admin-loader.gif') }}">
  </div> 
	<div class="row" id="dashboard-body" style="display: none;">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row top_tiles">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                          <div class="count">{{count($ongoing_class)}}</div>
                          <h3><a href="{{route('admin.classer.today')}}">@lang('label.on_going_class')</a></h3>
                         
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-comments-o"></i></div>
                          <div class="count">@{{ newLeveltest }}</div>
                          <h3><a href="{{route('admin.leveltest.new')}}">@lang('label.level_tests')</a></h3>
                          
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                          <div class="count">{{count($postponed)}}</div>
                          <h3>
                          <a href="{{ route('admin.classer.postponed') }}">
                          @lang('label.postponed_class')
                          </a>
                          </h3>
                          
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i></div>
                          <div class="count">@{{ newClass }}</div>
                          <h3><a href="{{route('admin.classer.new')}}">@lang('label.new_enrolled')</a></h3>
                         
                        </div>
                      </div>
                  </div>
                  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                    <div class="x_title">
                        <h2>@lang('label.scheduled_classes') <small>@lang('label.lists_of_sessions')</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <form action="">
                        <div class="row">
                                <div class="col-sm-3">
                                    
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
                        </div>
                    </form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>@lang("label.username")</th>
                                    <th>@lang('label.name')</th>
                                    <th>@lang('label.contact_number')</th>
                                    <th>@lang('label.type')</th>
                                    <th>@lang('label.time')</th>
                                    <th>@lang('label.minutes')</th>
                                    <th>@lang('label.day')</th>
                                    <th width="100">시작일</th>
                                    <th>종료일</th>
                                    <th>@lang('label.sessions')</th>
                                    <th>@lang('label.payment_method')</th>
                                    <th>@lang('label.teacher')</th>
                                    <th>시작일</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($allclasses as $class)
                                        <tr>
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
                                            <td>
                                               @if($class->user)
                                                    @php
                                                    $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                                                    if($near_session){
                                                        $button = "";
                                                        if(!Auth::user()->academy){
                                                            $button .= '<a href="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                                                        }
                                                        if(is_desktop()){
                                                            $button  .= '<button data-url="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'&modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                                                        }

                                                        echo $button;
                                                    }else{
                                                        $button = "";
                                                        if(!Auth::user()->academy){
                                                            $button .= '<a href="' . route('admin.classer.show', $class->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                                                        }

                                                        if(is_desktop()){
                                                            $button  .= '<button  data-url="' . route('admin.classer.show', $class->id) . '?modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                                                        }
                                                        
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
                    </div>
                </div>
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
            width: 1280px !important;
            margin: 30px auto;
        }

        #modalIframe{
            height: 80vh;
        }
    </style>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#loader').hide()
            $('#dashboard-body').show();

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