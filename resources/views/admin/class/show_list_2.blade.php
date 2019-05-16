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
                <a href="{{route('admin.classer.index')}}" class="btn btn-default"><i class="fa fa-ban"></i> @lang('button.back')</a>  @lang('label.class_code'): {{$class->class_code}}
            </div>
            <div class="row">
                <div class="col-sm-3">
                        <h2 class="">{{$class->user->username}}</h2>
                        <div class="row">
                            
                            <div class="col-xs-12">
                                <label>
                                    {{$class->user->korean_name}}
                                    <br>
                                    {{$class->user->name}}
                                    <br>
                                </label>
                                <br>
                                {{$class->user->email}}
                                <br>
                            <a href="{{route('admin.student.edit', $class->user->id)}}" style="margin-top: 5px;" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> @lang('button.edit')</a>

                            </div>


                        </div>

                    <hr>

                    <h5 class="">@lang('label.class_informations')</h5>
                    <table class="table">
                        <tr>
                            <td>@lang('label.teacher'):</td>
                            <td> 
                                @if($class->admin)
                                    {{$class->admin->name}}
                                @else
                                    <small style="color:Red"> @lang('label.no_teacher_assigned') </small> 
                                    <button class="btn btn-xs btn-primary"><i class="fa fa-thumb-tack"></i> @lang('button.assign')</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('label.class_type'):</td>
                            <td> {{$class->type}}</td>
                        </tr>
                        <tr>
                            <td>@lang('label.duration')</td>
                            <td>
                                @php
                                    $first_session = $class->getFirstSession();
                                    $last_session = $class->getLastSession();
                                    echo date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('label.days'):</td>
                            <td>@foreach($class->day as $days) @lang('label.'. strtolower(str_limit($days->day_name, 3, ""))), @endforeach</td>
                        </tr>
                        <tr>
                            <td>@lang('label.time'):</td>
                            <td>{{date_formater('time_format', $class->time)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('label.minutes'):</td>
                            <td>{{$class->minutes}}<small>mins.</small></td>
                        </tr>
                        <tr>
                            <td>@lang('label.months'):</td>
                            <td>{{$class->num_months}} <small>mos.</small></td>
                        </tr>
                        <tr>
                            <td>@lang('label.sessions'):</td>
                            <td>
                                {{count($class->classSession()->whereDate('date_time','>=', date('Y-m-d'))->where('status', 'ready')->get())}} / {{$class->classSession()->where('status', '!=', 'postponed')->count()}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('label.price'):</td>
                            <td>{{number_format($class->payment_price)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('label.payment_method'):</td>
                            <td><i class="fa fa-bank"></i> {{strtoupper($class->payment_method)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('label.postponed_credits'):</td>
                            <td>{{$class->postponed_credits}}</td>
                        </tr>
                         @if($class->note)
                        <tr>
                            <td>@lang('label.note'):</td>
                            <td>
                                {!! $class->note !!}
                            </td>
                        </tr>
                        @endif
                      
                    </table>
                    @if($class->class_log)
                            @foreach($class->class_log as $log)
                            <div class="well">
                                {{$log->content}}
                            </div>
                            @endforeach
                        @endif
                     <a href="{{route('admin.classer.edit', $class->id)}}" class="btn btn-default btn-block"><i class="fa fa-pencil"></i> @lang('button.edit')</a>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('admin.classer.show', $class->id)}}?view=calendar" class="btn  btn-default"> @lang('button.calendar_view')</a>
                            <a href="{{route('admin.classer.show', $class->id)}}?view=list" class="btn active  btn-default"> @lang('button.list_view')</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="dropdown">
                              <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-default">
                                @lang('button.session_manager')
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <a   data-toggle="modal" data-target="#postponed_modal"><i class="fa fa-mail-forward"></i> @lang('button.postponed_manager')</a>
                                    </li>
                                    <li>
                                        <a  data-toggle="modal" data-target="#submission_modal"><i class="fa fa-user"></i> @lang('button.sub_teacher_manager')</a>
                                    </li>
                                    <li>
                                        <a href="#" type="button" data-toggle="modal" data-target="#modal-add">
                                           <i class="fa fa-plus" ></i>  @lang('button.add_session')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"  type="button" data-toggle="modal" data-target="#modal-deduct">
                                           <i class="fa fa-remove" ></i>@lang('button.deduct_session')
                                        </a>
                                    </li>
                              </ul>
                            </div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('label.date_time')</th>
                                        <th>@lang('label.status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($session_list as $session)
                                        <tr 
                                        @if(Request::get('session') == $session->id)
                                            class="success" 
                                        @endif

                                        @if($session->status == 'postponed')
                                            class="danger" 
                                        @endif    
                                        >
                                            <td >
                                                <a href="{{route('admin.classer.show', $session->classer->id)}}?{{http_build_query(['page' => Request::get('page'), 'session' => $session->id])}}" >
                                                    {{date(setting('date_time_format'),strtotime($session->date_time))}} - {{date(' h:iA',strtotime($session->date_time . "+". $session->classer->minutes ." minutes"))}}
                                                </a>
                                            </td>
                                            <td>{{ucfirst($session->status)}}</td>
                                            
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                             {{$session_list->appends(['view' => Request::get('view')])->links()}}
                        </div>
                        <div class="col-sm-7">
                            @if(Request::get('session'))
                            <form action="{{route('admin.classsession.update', $session_info->id )}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>@lang('label.attendance')</label>
                                        <select class="form-control" name="status">
                                            @if($session_info->status == "postponed")
                                                <option value="postponed">@lang('button.postponed')</option>
                                            @else
                                                <option value="ready" @if($session_info->status =="ready") selected @endif >@lang('button.ready')</option>
                                                <option value="present" @if($session_info->status =="present") selected @endif>@lang('button.present')</option>
                                                <option value="absent" @if($session_info->status =="absent") selected @endif>@lang('button.absent')</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for=""> @lang('label.title')</label>
                                        <select name="book_id" id="" class="form-control">
                                            @foreach($books as $book)
                                                @if($session_info->classer->book_id == null)
                                                    <option value="{{$book->id}}" @if($session_info->classer->book_id == $book->id) selected @endif> {{$book->title}}</option>
                                                @else
                                                    <option value="{{$book->id}}"> {{$book->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for=""> @lang('label.page')</label>
                                            <input type="number" required name="page" value="{{$class->page}}" placeholder="page" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <label>@lang('label.comment')</label>
                                <textarea class="form-control my-editor" rows="6" name="comment">{!! $session_info->comment !!}</textarea>
                                <br>
                                <div class="columns">
                                    <div class="column padding-sm">
                                        <label>@lang('label.comprehension')</label>
                                        <select class="form-control" name="comprehension">
                                            <option value="0" @if($session_info->comprehension == 0) selected @endif>0</option>
                                            <option value="1" @if($session_info->comprehension == 1) selected @endif>1</option>
                                            <option value="2"  @if($session_info->comprehension == 2) selected @endif >2</option>
                                            <option value="3"  @if($session_info->comprehension == 3) selected @endif >3</option>
                                            <option value="4"  @if($session_info->comprehension == 4) selected @endif >4</option>
                                            <option value="5"  @if($session_info->comprehension == 5) selected @endif >5</option>
                                            <option value="6"  @if($session_info->comprehension == 6) selected @endif >6</option>
                                            <option value="7"  @if($session_info->comprehension == 7) selected @endif >7</option>
                                            <option value="8"  @if($session_info->comprehension == 8) selected @endif >8</option>
                                            <option value="9"  @if($session_info->comprehension == 9) selected @endif >9</option>
                                            <option value="10"  @if($session_info->comprehension == 10) selected @endif >10</option>
                                        </select>
                                    </div>
                                    <div class="column padding-sm">
                                        <label for="input-1" class="control-label">@lang('label.pronounciation')</label>
                                        <select class="form-control" name="pronounciation">
                                            <option value="0"  @if($session_info->pronounciation == 0) selected @endif >0</option>
                                            <option value="1"  @if($session_info->pronounciation == 1) selected @endif >1</option>
                                            <option value="2"  @if($session_info->pronounciation == 2) selected @endif >2</option>
                                            <option value="3"  @if($session_info->pronounciation == 3) selected @endif >3</option>
                                            <option value="4"  @if($session_info->pronounciation == 4) selected @endif >4</option>
                                            <option value="5"  @if($session_info->pronounciation == 5) selected @endif >5</option>
                                            <option value="6"  @if($session_info->pronounciation == 6) selected @endif >6</option>
                                            <option value="7"  @if($session_info->pronounciation == 7) selected @endif >7</option>
                                            <option value="8"  @if($session_info->pronounciation == 8) selected @endif >8</option>
                                            <option value="9"  @if($session_info->pronounciation == 9) selected @endif >9</option>
                                            <option value="10"  @if($session_info->pronounciation == 10) selected @endif >10</option>
                                        </select>
                                    </div>
                                    <div class="column padding-sm">
                                        <label for="input-1" class="control-label">@lang('label.fluency')</label>
                                        <select class="form-control" name="fluency">
                                            <option value="0"  @if($session_info->fluency == 0) selected @endif >0</option>
                                            <option value="1"  @if($session_info->fluency == 1) selected @endif >1</option>
                                            <option value="2"  @if($session_info->fluency == 2) selected @endif >2</option>
                                            <option value="3"  @if($session_info->fluency == 3) selected @endif >3</option>
                                            <option value="4"  @if($session_info->fluency == 4) selected @endif >4</option>
                                            <option value="5"  @if($session_info->fluency == 5) selected @endif >5</option>
                                            <option value="6"  @if($session_info->fluency == 6) selected @endif >6</option>
                                            <option value="7"  @if($session_info->fluency == 7) selected @endif >7</option>
                                            <option value="8"  @if($session_info->fluency == 8) selected @endif >8</option>
                                            <option value="9"  @if($session_info->fluency == 9) selected @endif >9</option>
                                            <option value="10"  @if($session_info->fluency == 10) selected @endif >10</option>
                                        </select>
                                    </div>

                                    <div class="column padding-sm">
                                        <label for="input-1" class="control-label">@lang('label.vocabulary')</label>
                                        <select class="form-control" name="vocabulary">
                                            <option value="0"  @if($session_info->vocabulary == 0) selected @endif >0</option>
                                            <option value="1"  @if($session_info->vocabulary == 1) selected @endif >1</option>
                                            <option value="2"  @if($session_info->vocabulary == 2) selected @endif >2</option>
                                            <option value="3"  @if($session_info->vocabulary == 3) selected @endif >3</option>
                                            <option value="4"  @if($session_info->vocabulary == 4) selected @endif >4</option>
                                            <option value="5"  @if($session_info->vocabulary == 5) selected @endif >5</option>
                                            <option value="6"  @if($session_info->vocabulary == 6) selected @endif >6</option>
                                            <option value="7"  @if($session_info->vocabulary == 7) selected @endif >7</option>
                                            <option value="8"  @if($session_info->vocabulary == 8) selected @endif >8</option>
                                            <option value="9"  @if($session_info->vocabulary == 9) selected @endif >9</option>
                                            <option value="10"  @if($session_info->vocabulary == 10) selected @endif >10</option>
                                        </select>
                                    </div>
                                    <div class="column padding-sm">
                                        <label for="input-1" class="control-label">@lang('label.grammar')</label>
                                        <select class="form-control" name="grammar">
                                            <option value="0"  @if($session_info->grammar == 0) selected @endif >0</option>
                                            <option value="1"  @if($session_info->grammar == 1) selected @endif >1</option>
                                            <option value="2"  @if($session_info->grammar == 2) selected @endif >2</option>
                                            <option value="3"  @if($session_info->grammar == 3) selected @endif >3</option>
                                            <option value="4"  @if($session_info->grammar == 4) selected @endif >4</option>
                                            <option value="5"  @if($session_info->grammar == 5) selected @endif >5</option>
                                            <option value="6"  @if($session_info->grammar == 6) selected @endif >6</option>
                                            <option value="7"  @if($session_info->grammar == 7) selected @endif >7</option>
                                            <option value="8"  @if($session_info->grammar == 8) selected @endif >8</option>
                                            <option value="9"  @if($session_info->grammar == 9) selected @endif >9</option>
                                            <option value="10"  @if($session_info->grammar == 10) selected @endif >10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p>
                                        <br>
                                        <button class="btn btn-primary" type="submit">@lang('button.save')</button>
                                    </p>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <hr>

                    <label>@lang('label.memo')</label>
                    <form action="{{route('admin.student.updateremarks', $class->user_id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <textarea class="form-control my-editor" name="remarks">{!! $class->user->remarks !!}</textarea>
                        <p>
                        <br>
                        <button class="btn btn-primary" type="submit"> @lang('button.update')</button>
                        </p>
                    </form>
                </div>


                </div>
            </div>
        </div>
      
    </div>

    <div class="modal fade" id="postponed_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('label.postponed_manager')</h4>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4"  style="border-right: 1px solid #bdbebf">
                        <div class="add-postpone-div">

                            <form action="{{route('admin.classer.postpone', $class->id)}}" method="post">


                                {{csrf_field()}}
                                {{method_field('put')}}
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#date" aria-controls="date" role="tab" data-toggle="tab" id="tab-date-btn">@lang('label.dates')</a></li>
                                    <li role="presentation"><a href="#range" aria-controls="range" role="tab" data-toggle="tab"  id="tab-range-btn" >@lang('label.date_range')</a></li>
                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="date">
                                        <br>
                                        <label>@lang('label.days')</label><br>
                                        <select class="form-contro select" name="dates[]" multiple="multiple" style="width: 100%">
                                            @foreach($sessions as $session)
                                                <option @if($session->status == "finished" || $session->status == "postponed") disabled @endif value="{{$session->id}}">{{date("M d, Y", strtotime($session->date_time))}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="range">
                                        <br>
                                        <label>@lang('label.date_range')</label><br>
                                              <input type="text" style="width: 200px" name="range" id="reservation" class="form-control" value="{{ date('m/d/Y') }} - {{ date('m/d/Y', strtotime($last_session->date_time)) }}" />
                                        
                                    </div>
                                  </div>
                                  <input type="hidden"  name="type" id="type" value="date">
                                <br>
                                <label>@lang('label.reason') <small><i>@lang('label.optional')</i></small></label>
                                <textarea class="form-control" name="reason" style="resize: none;" rows="5"></textarea>
                                <br>
                                <label>@lang('label.postponed_credits')</label>
                                <br>
                                <input type="radio" value="1" name="deduction" checked required> @lang('label.yes')<br>
                                <input type="radio" value="0" name="deduction" required> @lang('label.no')<br>
                                <br>



                                <button type="submit" class="btn btn-primary">@lang('button.postpone')</button>
                            </form>
                         </div>
                        <div class="edit-postpone-div" style="display:none;">
                            <h3>@lang('label.edit')</h3>
                            <form action="{{route('admin.classer.editpostpone')}}" method="post">


                                {{csrf_field()}}
                                {{method_field('put')}}
                                <label>@lang('label.dates')</label><br>
                                <input type="hidden" name="id" id="edit_id" >
                                <input type="hidden" name="deduction_number" id="edit_deduction">
                                <input type="text" disabled id="edit_date" class="form-control">
                                <br>
                                <br>
                                <label>@lang('label.reason') <small><i>@lang('label.optional')</i></small></label>
                                <textarea class="form-control" name="reason" id="edit_reason" style="resize: none;" rows="5"></textarea>
                                <br>
                                <label>@lang('label.postponed_credits')</label>
                                <br>
                                <input type="radio" value="1" id="edit_credit_1" name="deduction" checked required> @lang('label.yes')<br>
                                <input type="radio" value="0"  id="edit_credit_0" name="deduction" required> @lang('label.no')<br>
                                <br>

                                <button type="submit" class="btn btn-primary">@lang('button.save')</button> <button type="button" class="btn btn-warning close-edit">@lang('button.cancel')</button>
                            </form>
                        </div>

                    </div><!-- /.modal-content -->


                    <div class="col-sm-8">
                        <form action="{{route('admin.classer.cancelpostpone', $class->id)}}" method="post">
                            <h3>@lang('label.postponed_sessions')</h3>
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th width="25%">@lang('label.date')</th>
                                        <th  align="left">@lang('label.credits')</th>
                                        <th>@lang('label.reason')</th>
                                        <th>@lang('label.applied')</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    @if(count($postponed_sessions) >0)
                                    @foreach($postponed_sessions as $postponed)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="postponed[]" value="{{$postponed->id}}" > 
                                                
                                            </td>
                                            <td  valign="top">
                                                {{date('M d, Y',strtotime($postponed->date_time))}} </td>
                                            <td  valign="top">{{$postponed->postponed_deduction}}</td>
                                            <td  valign="top">{{$postponed->reason}}</td>
                                            <td  valign="top">
                                                {{$postponed->postponed_apply}}<br>
                                                <small><i>{{date('M d, Y | h:i A', strtotime($postponed->postponed_timestamp))}}</i></small>
                                            </td>
                                            <td valign="top">
                                                <a href="#" data-deduction="{{$postponed->postponed_deduction}}" class="edit-postponed" data-id="{{$postponed->id}}" data-reason="{{$postponed->reason}}" data-date="{{date('M d, Y',strtotime($postponed->date_time))}}"> <i class="fa fa-pencil"></i> EDIT </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="3"> @lang('label.no_postponed_session')</td>
                                        </tr>
                                    @endif

                                </table>
                            <button   @if(count($postponed_sessions) < 1 ) disabled @endif class="btn btn-primary pull-right" type="submit"><i class="fa fa-trash"></i> @lang('button.cancel')</button>

                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="submission_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('label.submission_manager')</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5"  style="border-right: 1px solid #bdbebf">
                            <div class="add-postpone-div">
                                <form action="{{route('admin.classer.submission')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="class_id" value="{{$class->id}}">
                                    <label>@lang('label.days')</label><br>
                                    <select class="form-control select" name="dates[]" multiple="multiple" style="width: 100%"  required>
                                        @foreach($sessions as $session)
                                            <option @if($session->status == "finished" || $session->status == "postponed") disabled @endif value="{{$session->id}}">{{date("M d, Y", strtotime($session->date_time))}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <br>
                                    <label>@lang('label.teachers')</label><br>
                                    <select class="form-control" name="teacher_id" style="width: 100%" required>
                                        <option  value="">-@lang('label.select_teacher')-</option>
                                        @foreach($users as $user)
                                            <option  value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                   
                                    <br>
                                    <button type="submit" class="btn btn-primary">@lang('button.save')</button>
                                </form>
                            </div>
                      

                        </div><!-- /.modal-content -->


                        <div class="col-sm-7">
                            <form action="{{route('admin.classer.cancelsubmission')}}" method="post">
                                <h3>@lang('label.submissions')</h3>
                                {{csrf_field()}}
                                <table class="table table-hover">
                                    <thead>
                                    <tr>

                                        <th width="25%">@lang('label.date')</th>
                                        <th>@lang('label.teacher')</th>
                                        
                                    </tr>
                                    </thead>
                                    @if(count($submissions) >0)
                                        @foreach($submissions as $submission)
                                            <tr>

                                                <td  valign="top">
                                                    <input type="checkbox" @if($submission == 'ready') disabled @endif name="dates[]" value="{{$submission->id}}" > {{date('Y-m-d',strtotime($submission->date_time))}} 
                                                </td>
                                              
                                                <td  valign="top">
                                                    {{$submission->subteacher->name}}
                                                </td>

                                                
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="4"> @lang('label.sub_class')</td>
                                        </tr>
                                    @endif

                                </table>
                                <button   @if(count($submissions) < 1 ) disabled @endif class="btn btn-primary pull-right" type="submit"><i class="fa fa-trash"></i> @lang('button.cancel')</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="{{route('admin.classer.addsession')}}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" value="{{$class->id}}" name="class_id">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('label.adding_session')</h4>
                  </div>
                  <div class="modal-body">
                        <label>@lang('label.number_of_days')</label>
                        <input class="form-control" min="1" type="number" name="number" >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('button.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('button.submit')</button>
                  </div>
                </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-deduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="{{route('admin.classer.deductsession')}}" method="post">
                    {{csrf_field()}}

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('label.deduction_session')</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="class_id" value="{{$class->id}}">
                        <label>@lang('label.number_of_days')</label>
                        <input name="number" class="form-control" min="1" max="{{count($class->classSession()->whereDate('date_time','>=', date('Y-m-d'))->where('status', 'ready')->get())}}" type="number" name="number" >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('button.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('button.submit')</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endsection

@section('scripts')
     <script src="https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js"></script>
    <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('.select').select2();
            
            $('.edit-postponed').click(function(){
                var id = $(this).data('id');
                var datess = $(this).data('date');
                var reason = $(this).data('reason');
                var edit_deduction = $(this).data('deduction')
                $('#edit_reason').val(reason);
                $("#edit_id").val(id);
                $('#edit_date').val(datess);

                if(edit_deduction == 1){
                    $('#edit_credit_1').prop('checked', true);
                    $('#edit_deduction').val(1);
                }else{
                    $('#edit_credit_0').prop('checked', true);
                    $('#edit_deduction').val(0);
                }

                $('.add-postpone-div').hide();
                $('.edit-postpone-div').fadeIn();
            });

            $('.close-edit').click(function(){
                $('.add-postpone-div').fadeIn();
                $('.edit-postpone-div').hide();
            })

             $("#reservation").daterangepicker({
              minDate: {{date('Y-m-d')}}
            }, function (startDate, endDate, period) {
              $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
            });

            $('#tab-range-btn').click(function(){
                $('#type').val('range')
            })

            $('#tab-date-btn').click(function(){
                $('#type').val('date')
            })

        });
    
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      }

      var editor_config = {
        path_absolute : "{{url('/public')}}/",
        height : "200",
        selector: "textarea.my-editor",
        branding: false,
        menubar:"",
        plugins: [
          ""
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'S2 File Manager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

    tinymce.init(editor_config);

           
</script>
@endsection