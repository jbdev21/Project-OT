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
                <label>@lang('label.new_class')</label>
                <button class="btn btn-default btn-sm" id="delete_all_btn"><i class="fa fa-trash"></i> @lang('button.delete')</button>
            </div>
            <form action="{{route('admin.classer.destroy', 0)}}" id="delete_all" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="table-responsive">
                    <table class="table table-stripped table-hover">
                       <thead>
                        <tr>
                            <td><input type="checkbox" id="checkAll" ></td>
                            <td>@lang('label.username')</td>
                            <td>@lang('label.name')</td>
                            <td>@lang('label.contact_number')</td>
                            <td>@lang('label.type')</td>
                            <td>@lang('label.days')</td>
                            <td>@lang('label.time')</td>
                            <td>@lang('label.minutes')</td>
                            <td>@lang('label.total_session')</td>
                            <td>@lang('label.start_date')</td>
                            <td>@lang('label.payment_method')</td>
                            <td>@lang('label.price')</td>
                            <td>등록일</td>
                            <td>@lang('label.teacher')</td>
                            <td></td>
                            <td>@lang('label.note')</td>
                        </tr>
                       </thead>
                       <tbody>
                       <?php count($classes);?>
                           @foreach($classes as $class)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="item_checked[]" value="{{$class->id}}">
                                    </td>
                                     <td>
                                        <a href="{{route('admin.student.show', $class->user->id)}}">
                                            {{$class->user->username}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$class->user->name}}
                                        <br>
                                        {{$class->user->korean_name}}
                                    </td>
                                    <td>
                                        {{$class->user->contact_number}}
                                        @if($class->user->contact_number1)
                                        <br>
                                        {{$class->user->contact_number1}}
                                        @endif
                                    </td>
                                    <td>{{$class->type}}</td>
                                    <td>
                               
                                    	@foreach($class->day as $day)
                                    		@lang('label.'. strtolower(str_limit($day->day_name, 3, ''))) &nbsp;
                                    	@endforeach
                                    </td>
                                    <td>{{date(setting('time_format'),strtotime($class->time))}}</td>
                                    <td>{{$class->minutes}}</td>
                                    <td>{{$class->total_sessions}}</td>
                                    <td>{{$class->start_date}}</td>
                                    
                                    <td align="center">@if($class->payment_method == "bank") <img class="img-responsive" src="{{ asset('image/icons/bank.png') }}"> @else <img class="img-responsive" src="{{ asset('image/icons/credit-card.png') }}"> @endif</td>
                                    <td>
                                        {{number_format($class->payment_price)}} @lang('label.won')
                                    </td>
                                    <td>
                                        {{ date_formater('date_time_format', $class->created_at) }}
                                    </td>
                                    <td>
                                    @if($class->admin)
                                        <div class="form-control">
                                              {{ $class->admin->name }}      
                                        </div>            
                                    @else
                                    	<select class="form-control input-sm" name="teacher_id" id="teacher_id_{{$class->id}}" required>
                                    		<option value=""> -  강사배정 -</option>
                                    		@foreach($teachers as $teacher)
                                    			<option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                     		@endforeach
                                    	</select>
                                    @endif
                                    </td>
                                    <td>
                                     @if($class->admin)
                                        <a href="{{ route('admin.classer.edit', $class->id) }}" class="btn btn-success btn-sm assign_submit" > @lang('button.edit')</a>
                                     @else
                                        <button type="button" id="{{$class->id}}" class="btn btn-success btn-sm assign_submit" > @lang('button.assign')</button>
                                     @endif
                                        <a href="{{route('admin.classer.show', $class->id)}}" class="btn btn-primary btn-sm"> 
                                        @lang('button.show') 
                                        @if($class->note)
                                        <i class="fa fa-circle" style="color:red; position: absolute; margin-top: -10px; margin-left: 5px;" ></i>
                                        @endif
                                        </a>
                                    </td>
                                    <td>
                                        @if($class->note)
                       
                                            <a tabindex="0" data-placement="left" class="btn btn-xs btn-default"  role="button" data-toggle="popover" data-trigger="focus" title="@lang('label.note')" data-content="{!! $class->note !!}" data-html="true">?</a>
                                    
                                        @endif
                                    </td>
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
            $('[data-toggle="popover"]').popover()
            
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
                if(confirm("@lang('label.are_you_sure_to_delete')")){
                    $('#delete_all').submit();
                }
            })
        })
    </script>
@endsection
